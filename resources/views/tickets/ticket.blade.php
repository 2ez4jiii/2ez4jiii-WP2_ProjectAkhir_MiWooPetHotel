<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <base href="/public">
         @include('home.css') 
          @vite('resources/css/app.css')
          <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
          <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .text-center {
            text-align: center;
        }
        .font-bold {
            font-weight: bold;
        }
        .mb-2 {
            margin-bottom: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="text-center">
        <h1 class="font-bold text-blue-600">MiWoo PetHotel</h1>
        <hr class="mb-2">
        <h2>Booking Ticket</h2>
    </div>

    <div class="mb-2">
        <p><strong>Date:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        <p><strong>Invoice #:</strong> INV{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</p>
        <p><strong>Status:</strong> {{ $booking->status }}</p>
    </div>

    <div class="mb-2">
        <h3 class="font-bold">Guest Details:</h3>
        <p><strong>Name:</strong> {{ $booking->name }}</p>
        <p><strong>Phone:</strong> {{ $booking->phone }}</p>
        <p><strong>Email:</strong> {{ $booking->email }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>Description</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pet Name</td>
                <td>{{ $booking->pet_name }}</td>
            </tr>
            <tr>
                <td>Room Title</td>
                <td>{{ $booking->room->room_tittle }}</td>
            </tr>
            <tr>
                <td>Room Type</td>
                <td>{{ $booking->room->room_type }}</td>
            </tr>
            <tr>
                <td>Pet Gender</td>
                <td>{{ ucfirst($booking->pet_gender) }}</td>
            </tr>
            <tr>
                <td>Check-In</td>
                <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Check-Out</td>
                <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td>Note</td>
                <td>{{ $booking->note }}</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Total Price</th>
                <th class="text-right">RP. {{ number_format($totalPrice, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

    <div class="text-center mt-4">
        <p>Thank you for booking with MiWoo PetHotel!</p>
    </div>
</body>
</html>