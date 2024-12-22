<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
     @include('home.css') 
      @vite('resources/css/app.css')
      <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
   </head>
        @include('home.header')

        <div class="bg-white border rounded-lg shadow-lg px-6 py-8 max-w-md mx-auto mt-8">
            <h1 class="font-bold text-2xl my-4 text-center text-blue-600">MiWoo PetHotel</h1>
            <hr class="mb-2">
            <div class="flex justify-between mb-6">
                <h1 class="text-lg font-bold">Invoice</h1>
                <div class="text-gray-700">
                    <div>Date: {{ \Carbon\Carbon::now()->format('d/m/Y') }}</div>
                    <div>Invoice #: INV{{ str_pad($booking->id, 5, '0', STR_PAD_LEFT) }}</div>
                    <div>Status: {{ $booking->status }}</div>
                </div>
            </div>
            <div class="mb-8">
                <h2 class="text-lg font-bold mb-4">PetHotel Booking</h2>
                
                <div class="text-gray-700 mb-2">{{ $booking->name }}</div>
                <div class="text-gray-700 mb-2">{{ $booking->phone }}</div>
                <div class="text-gray-700 mb-2">{{ $booking->email }}</div>
            </div>
            <table class="w-full mb-8">
                <thead>
                    <tr>
                        <th class="text-left font-bold text-gray-700">Description</th>
                        <th class="text-right font-bold text-gray-700"></th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <td class="text-left text-gray-700">Pet Name</td>
                        <td class="text-right text-gray-700">{{ $booking->pet_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-gray-700">Room Tittle</td>
                        <td class="text-right text-gray-700">{{ $booking->room->room_tittle }}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-gray-700">Room Type</td>
                        <td class="text-right text-gray-700">{{ $booking->room->room_type }}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-gray-700">Pet Gender</td>
                        <td class="text-right text-gray-700">{{ ucfirst($booking->pet_gender) }}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-gray-700">Check-In</td>
                        <td class="text-right text-gray-700">{{ \Carbon\Carbon::parse($booking->start_date)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-gray-700">Check-Out</td>
                        <td class="text-right text-gray-700">{{ \Carbon\Carbon::parse($booking->end_date)->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <td class="text-left text-gray-700">Note</td>
                        <td class="text-right text-gray-700">{{ $booking->note }}</td>
                    </tr>
                <tfoot>
                    <tr>
                        <td class="text-left font-bold text-gray-700">Total</td>
                        <td class="text-right font-bold text-gray-700">RP. {{ number_format($totalPrice, 0, ',', '.') }}</td>
                    </tr>
                </tfoot>
            </table>
            <div class="text-gray-700 mb-2">Thank you!</div>
        </div>

        <center>
            <div>
                <a class="btn btn-primary text-center" href="{{ route('ticket.download', ['id' => $booking->id]) }}">download ticket</a>
            </div>
        </center>
        
        @include('home.footer')
</html>