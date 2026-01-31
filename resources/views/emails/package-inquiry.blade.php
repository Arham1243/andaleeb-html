<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>New Package Inquiry</title>
</head>
<body style="font-family: Arial, sans-serif; background:#f7f7f7; padding:20px;">
    <div style="max-width:600px; margin:auto; background:#ffffff; padding:20px; border-radius:6px;">
        <h3 style="margin-top:0;">New Package Inquiry Submitted</h3>

        <table width="100%" cellpadding="6" cellspacing="0" style="border-collapse:collapse;">
            <tr>
                <td><strong>Package</strong></td>
                <td>{{ optional($inquiry->package)->name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td>{{ $inquiry->name }}</td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>{{ $inquiry->email }}</td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td>{{ $inquiry->phone }}</td>
            </tr>
            <tr>
                <td><strong>Tour Date</strong></td>
                <td>{{ $inquiry->tour_date ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Pax</strong></td>
                <td>{{ $inquiry->pax ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Pickup Location</strong></td>
                <td>{{ $inquiry->pickup_location ?? 'N/A' }}</td>
            </tr>
        </table>

        <div style="margin-top:20px; text-align:center;">
            <a href="{{ $adminUrl }}"
               style="background:#111827; color:#ffffff; padding:10px 16px; text-decoration:none; border-radius:4px;">
                View Inquiry
            </a>
        </div>
    </div>
</body>
</html>
