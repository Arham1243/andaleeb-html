<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Hotel Booking - {{ $booking->booking_number }}</title>
    <style>
        @font-face {
            font-family: "UAEDirham";
            src: url("{{ asset('frontend/assets/fonts/UAE-dirham/aed-Regular.otf') }}");
        }

        body :is(.dirham.dirham) {
            font-family: "UAEDirham" !important;
            font-weight: 400 !important;
            padding: 0 !important;
            margin: 0 !important;
            font-size: inherit !important;
            color: inherit !important;
            opacity: 1 !important;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            font-family: sans-serif;
        }

        .wrapper {
            width: 100%;
            background-color: #f8f9fa;
            padding: 40px 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #eeeeee;
            padding: 25px;
        }

        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #111111;
            margin: 0;
        }

        .label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: #999999;
        }

        .data-text {
            font-size: 14px;
            color: #111111;
            font-weight: 500;
        }

        .section-padding {
            padding: 30px 0;
        }

        .border-bottom {
            border-bottom: 1px solid #eeeeee;
        }

        .status-badge {
            display: inline-block;
            border: 2px solid #28a745;
            background-color: #f0fff4;
            color: #28a745;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 2px;
        }
    </style>
</head>

<body>
    <center class="wrapper">
        <div class="container">
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <img src="{{ asset('frontend/assets/images/email-template-logo.png') }}"
                            alt="Andaleeb Travel Agency" width="200"
                            style="display: block; border: 0; max-width: 200px;" />
                    </td>
                </tr>
            </table>
            <table width="100%" cellpadding="0" cellspacing="0" class="section-padding border-bottom">
                <tr>
                    <td align="center">
                        <h1>New Hotel Booking Received</h1>
                        <p style="font-size: 14px; color: #666666; margin: 10px 0 0 0;">A new hotel booking has been
                            confirmed</p>
                    </td>
                </tr>
            </table>
            <table width="100%" cellpadding="0" cellspacing="0" style="padding: 20px 0;">
                <tr>
                    <td align="center">
                        <span class="status-badge">CONFIRMED</span>
                    </td>
                </tr>
            </table>
            <table width="100%" cellpadding="0" cellspacing="0" class="section-padding border-bottom">
                <tr>
                    <td>
                        <table width="100%" cellpadding="8" cellspacing="0">
                            <tr>
                                <td width="50%">
                                    <div class="label">Booking Number</div>
                                    <div class="data-text">{{ $booking->booking_number }}</div>
                                </td>
                                @if ($booking->yalago_booking_reference)
                                    <td width="50%">
                                        <div class="label">Yalago Reference</div>
                                        <div class="data-text">{{ $booking->yalago_booking_reference }}</div>
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="label">Hotel Name</div>
                                    <div class="data-text">{{ $booking->hotel_name }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="label">Check-in</div>
                                    <div class="data-text">{{ $booking->check_in_date->format('d M, Y') }}</div>
                                </td>
                                <td width="50%">
                                    <div class="label">Check-out</div>
                                    <div class="data-text">{{ $booking->check_out_date->format('d M, Y') }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="label">Nights</div>
                                    <div class="data-text">{{ $booking->nights }}</div>
                                </td>
                                <td width="50%">
                                    <div class="label">Total Amount</div>
                                    <div class="data-text">{{ formatPrice($booking->total_amount) }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="label">Payment Method</div>
                                    <div class="data-text">{{ strtoupper($booking->payment_method) }}</div>
                                </td>
                                <td width="50%">
                                    <div class="label">Payment Status</div>
                                    <div class="data-text">{{ strtoupper($booking->payment_status) }}</div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" cellpadding="0" cellspacing="0" class="section-padding border-bottom">
                <tr>
                    <td>
                        <h2 style="font-size: 16px; font-weight: 600; color: #111111; margin: 0 0 15px 0;">Customer
                            Information</h2>
                        <table width="100%" cellpadding="8" cellspacing="0">
                            <tr>
                                <td>
                                    <div class="label">Name</div>
                                    <div class="data-text">{{ $booking->lead_full_name }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="label">Email</div>
                                    <div class="data-text">{{ $booking->lead_email }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="label">Phone</div>
                                    <div class="data-text">{{ $booking->lead_phone }}</div>
                                </td>
                            </tr>
                            @if ($booking->lead_address)
                                <tr>
                                    <td>
                                        <div class="label">Address</div>
                                        <div class="data-text">{{ $booking->lead_address }}</div>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" cellpadding="0" cellspacing="0"
                style="padding-top: 40px; text-align: center; border-top: 1px solid #f4f4f4;">
                <tr>
                    <td align="center">
                        <p style="font-size: 12px; color: #111111;">© {{ date('Y') }} Andaleeb Travel Agency. All
                            rights reserved.</p>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</body>

</html>
