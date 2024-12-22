<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    public function room_details($id)
    {

        $room = Room::find($id);

        return view('home.room_details',compact('room'));

    }

    public function add_booking(Request $request, $id)
{
    $request->validate([
        'startDate' => 'required|date',
        'endDate' => 'date|after:startDate',
    ]);

    $data = new Booking;

    $data->room_id = $id;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->pet_name = $request->pet_name;
    $data->pet_gender = $request->petGender;
    $data->note = $request->note;

    $startDate = $request->startDate;
    $endDate = $request->endDate;

    $isBooked = Booking::where('room_id', $id)
        ->where('start_date', '<=', $endDate)
        ->where('end_date', '>=', $startDate)
        ->exists();

    if ($isBooked) {
        return redirect()->back()->with('message', 'Room is already booked. Please try a different date or choose another room.');
    } else {
        $data->start_date = $startDate;
        $data->end_date = $endDate;

        $data->save();

        session(['booking_id' => $data->id]);

        return redirect()->back()->with('message', 'Room Booked Successfully');
    }
}

    public function showTicket($id)
    {
        $booking = Booking::with('room')->findOrFail($id);
        

        $startDate = new \DateTime($booking->start_date);
        $endDate = new \DateTime($booking->end_date);
        $interval = $startDate->diff($endDate);
        $days = $interval->days + 1;

        $totalPrice = $booking->room->price * $days;
    
        return view('home.ticket', compact('booking', 'totalPrice', 'days'));    
    }




    public function contact(Request $request)
    {

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message','Message Sent Successfully');

    }
    
    public function ticket()
    {
        return view('home.ticket');
    }

    public function downloadTicket($id)
    {
        $booking = Booking::with('room')->findOrFail($id); // Ambil booking dengan relasi room
        $totalPrice = $booking->room->price; // Hitung total harga sesuai kebutuhan Anda

        // Load view untuk PDF (gunakan ticket.blade.php)
        $pdf = Pdf::loadView('tickets.ticket', compact('booking', 'totalPrice'));

        // Unduh PDF dengan nama file yang diinginkan
        return $pdf->download('ticket-' . $booking->id . '.pdf');
    }

}
