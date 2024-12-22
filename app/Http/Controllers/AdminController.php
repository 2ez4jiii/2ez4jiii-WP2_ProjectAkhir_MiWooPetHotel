<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::check()) {

            $usertype = Auth::user()->usertype;

            if ($usertype === 'user') {

                $room = Room::all();
                return view('home.index',compact('room'));
                
            }
             elseif ($usertype === 'admin') {
                return view('admin.index');
            }
            else
            {
                return redirect()->back();
            }
        }    
    }

    public function home()
    {
        $room = Room::all();
        return view('home.index',compact('room')); 
    }

    public function create_room()
    {
        return view('admin.create_room'); 
    }

    public function add_room(Request $request)
    {
        $data = new Room();

        $data->room_tittle= $request->tittle;

        $data->description= $request->description;

        $data->price= $request->price;

        $data->wifi= $request->wifi;

        $data->room_type= $request->type;

        $image=$request->image;

        if($image)
        {

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);

            $data->image=$imagename;

        }

        $data->save();

        return redirect()->back();
    }

    public function view_room()
    {
        $data = Room::all();

        return view('admin.view_room',compact('data'));
    }

    public function room_delete($id)
    {
        $data = Room::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function room_update($id)
    {
        $data = Room::find($id);

        return view('admin.update_room',compact('data'));
    }

    public function edit_room(Request $request , $id)
    {
        $data = Room::find($id);

        $data->room_tittle = $request->tittle;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->type;

        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('room',$imagename);

            $data->image=$imagename;
        }

        $data->save();

        return redirect()->back();
    }

    public function bookings()
    {
        $data = Booking::with('room')->get();

        foreach ($data as $booking) {
            $startDate = new \DateTime($booking->start_date);
            $endDate = new \DateTime($booking->end_date);

            $interval = $startDate->diff($endDate)->days + 1; // Tambahkan 1 untuk menyertakan hari mulai
            $booking->total_price = $interval * $booking->room->price;
        }
        return view('admin.booking',compact('data'));
    }

    

    public function delete_booking($id)
    {

        $data = Booking::find($id);
        $data->delete();
        
        return redirect()->back();

    }

    public function approve_book($id)
    {

        $booking = Booking::find($id);
        $booking->status='approve';
        $booking->save();

        return redirect()->back();

    }

    public function reject_book($id)
    {

        $booking = Booking::find($id);
        $booking->status='rejected';
        $booking->save();

        return redirect()->back();

    }

    public function all_messages()
    {
        
        $data = Contact::all();
        return view('admin.all_message',compact('data'));

    }

}