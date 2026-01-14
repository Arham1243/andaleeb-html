<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\HotelBooking;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HotelController extends Controller
{
    protected $adminEmail;
    public function __construct()
    {
        $config = Config::pluck('config_value', 'config_key')->toArray();
        $this->adminEmail = $config['ADMINEMAIL'] ?? 'info@andaleebtours.com';
    }

    public function index()
    {
        $user = auth()->user();

        // Get hotels for this user (both authenticated and guest hotels by email)
        $hotels = HotelBooking::where(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->orWhere('lead_email', $user->email);
        })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.hotels.list', compact('hotels'))->with('title', 'My Hotel Bookings');
    }

    public function show($id)
    {
        $user = auth()->user();

        // Get order only if it belongs to this user (by user_id or email)
        $booking = HotelBooking::where(function ($query) use ($user) {
            $query->where('user_id', $user->id)
                ->orWhere('lead_email', $user->email);
        })
            ->findOrFail($id);

        // Get config for tax percentages
        $config = \Illuminate\Support\Facades\View::shared('config', []);

        return view('user.hotels.show', compact('booking', 'config'))->with('title', 'Booking ' . $booking->booking_number);
    }

    public function destroy($id)
    {
        $booking = HotelBooking::where('id', $id)->firstOrFail();
        $booking->delete();
        return redirect()->route('user.hotels.index')->with('notify_success', 'Order deleted successfully!');
    }

    public function payAgain($id)
    {
        $booking = HotelBooking::where('id', $id)->firstOrFail();
        return view('user.hotels.pay-again', compact('booking'))->with('title', 'Pay Again');
    }
    
    public function proceedPayAgain(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|in:payby,tabby',
        ]);

        $booking = HotelBooking::where('id', $id)
            ->where(function ($query) {
                $query->where('payment_status', 'pending')
                    ->orWhere('payment_status', 'failed');
            })
            ->firstOrFail();

        // Update payment method and set status to pending
        $booking->update([
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
        ]);

        try {
            // Use your HotelService to get redirect URL
            $hotelService = app(\App\Services\HotelService::class);
            $redirectUrl = $hotelService->getRedirectUrl($booking, $request->payment_method);
            dd($redirectUrl);

            return redirect($redirectUrl);
        } catch (\Exception $e) {
            return back()->with('notify_error', 'Failed to process payment: ' . $e->getMessage());
        }
    }

    public function cancel($id)
    {
        try {
            $user = auth()->user();

            $booking = HotelBooking::where(function ($query) use ($user) {
                $query->where('user_id', $user->id)
                    ->orWhere('lead_email', $user->email);
            })
                ->findOrFail($id);

            if ($booking->status === 'cancelled') {
                return redirect()->back()->with('notify_error', 'This order is already cancelled.');
            }

            if ($booking->payment_status !== 'paid') {
                return redirect()->back()->with('notify_error', 'Only paid itemscan be cancelled.');
            }

            // TODO: Cancel order 

            if (false) {
                return redirect()->back()->with('notify_error', 'Failed to cancel');
            }

            $booking->update([
                'booking_status' => 'cancelled',
                'cancelled_at' => now(),
                'cancelled_by' => 'user'
            ]);

            $this->sendCancellationEmails($booking);

            Log::info('Order cancelled by user', [
                'booking_id' => $booking->id,
                'booking_number' => $booking->booking_number,
                'user_id' => $user->id
            ]);

            return redirect()->route('user.hotels.show', $id)->with('notify_success', 'Booking cancelled successfully.');
        } catch (\Exception $e) {
            Log::error('Booking cancellation failed', [
                'booking_id' => $id,
                'error' => $e->getMessage()
            ]);

            return redirect()->back()->with('notify_error', 'Failed to cancel order: ' . $e->getMessage());
        }
    }

    protected function sendCancellationEmails(HotelBooking $booking)
    {
        try {
            $booking->load('orderItems');

            // Send email to user
            Mail::send('emails.hotel-booking-cancelled-user', ['order' => $booking], function ($message) use ($booking) {
                $message->to($booking->lead_email)
                    ->subject('Booking Cancelled - ' . $booking->booking_number);
            });

            // Send email to admin
            Mail::send('emails.hotel-booking-cancelled-admin', ['order' => $booking], function ($message) use ($booking) {
                $message->to($this->adminEmail)
                    ->subject('Booking Cancelled by User - ' . $booking->booking_number);
            });

            Log::info('Cancellation emails sent', [
                'booking_id' => $booking->id,
                'customer_email' => $booking->lead_email,
                'admin_email' => $this->adminEmail
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to send cancellation emails', [
                'booking_id' => $booking->id,
                'error' => $e->getMessage()
            ]);
        }
    }
}
