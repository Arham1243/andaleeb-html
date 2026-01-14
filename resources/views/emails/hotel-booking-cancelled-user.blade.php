<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotel Booking Cancelled - {{ $booking->booking_number }}</title>
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
            border: 2px solid #dc3545;
            background-color: #fff5f5;
            color: #dc3545;
            padding: 4px 12px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            border-radius: 2px;
        }

        .footer {
            padding-top: 40px;
            text-align: center;
            border-top: 1px solid #f4f4f4;
        }

        .footer-text {
            font-size: 12px;
            color: #111111;
        }

        @media only screen and (max-width: 600px) {
            .wrapper {
                padding: 20px 0 !important;
            }

            .container {
                padding: 15px !important;
                border: none !important;
            }

            h1 {
                font-size: 18px !important;
            }

            .data-text {
                font-size: 13px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            h1 {
                font-size: 16px !important;
            }

            .status-badge {
                font-size: 9px !important;
                padding: 3px 8px !important;
            }

            .label {
                font-size: 10px !important;
            }
        }
    </style>
</head>

<body>
    <center class="wrapper">
        <div class="container">

            <!-- Logo -->
            <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <img src="{{ asset('frontend/assets/images/email-template-logo.png') }}"
                            alt="Andaleeb Travel Agency" width="200"
                            style="display: block; border: 0; max-width: 200px;" />
                    </td>
                </tr>
            </table>

            <!-- Greeting & Main Status -->
            <table width="100%" cellpadding="0" cellspacing="0" class="border-bottom section-padding">
                <tr>
                    <td align="left">
                        <p style="font-size: 15px; color: #666666; margin-bottom: 10px;">
                            Hello {{ $booking->lead_full_name }},
                        </p>
                        <h1>Your Hotel Booking has been Cancelled</h1>
                        <p style="font-size: 15px; color: #666666; line-height: 1.6; margin-top: 10px;">
                            Your hotel booking <strong>{{ $booking->booking_number }}</strong> has been cancelled on
                            <strong>{{ $booking->cancelled_at ? \Carbon\Carbon::parse($booking->cancelled_at)->format('d M Y, h:i A') : 'N/A' }}</strong>.
                        </p>
                    </td>
                </tr>
            </table>

            <!-- Booking Summary -->
            <table width="100%" cellpadding="0" cellspacing="0" class="section-padding border-bottom">
                <tr>
                    <td>
                        <table width="100%" cellpadding="8" cellspacing="0">
                            <tr>
                                <td width="50%">
                                    <div class="label">Hotel Name</div>
                                    <div class="data-text">{{ $booking->hotel_name }}</div>
                                </td>
                                <td width="50%">
                                    <div class="label">Booking Number</div>
                                    <div class="data-text">{{ $booking->booking_number }}</div>
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

            <!-- Refund Info -->
            <table width="100%" cellpadding="0" cellspacing="0"
                style="margin-top: 30px; background-color: #fff8e1; border: 1px solid #ffd54f; border-radius: 4px; padding: 15px;">
                <tr>
                    <td>
                        <p style="font-size: 13px; color: #111111; margin: 0 0 10px 0; line-height: 1.6;">
                            <strong>Refund Information:</strong>
                        </p>
                        <p style="font-size: 13px; color: #666666; margin: 0; line-height: 1.6;">
                            If eligible, your refund will be processed to your original payment method within 10-15
                            working days. Non-refundable bookings or cancellations within the policy deadline will not
                            be refunded.
                        </p>
                    </td>
                </tr>
            </table>

            <!-- Footer -->
            <div class="footer">
                <p class="footer-text">
                    &copy; {{ date('Y') }} Andaleeb Travel Agency <a
                        href="https://andaleebtours.com">www.andaleebtours.com</a>
                </p>
            </div>

        </div>
    </center>
</body>

</html>
