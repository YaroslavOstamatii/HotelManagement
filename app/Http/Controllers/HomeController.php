<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function details(Room $id)
    {
        return view('home.room_details',['room' => $id]);
    }
    public function add_booking(Request $request, Room $id)
    {
        $data = $request->all();

        $request->validate([
            'startDate' => 'required|date',
            'endDate'=>'date|after:startDate'
        ]);
        $data['room_id'] = $id->id;

        $isBooked = Booking::where('room_id',$id->id)
            ->where('startDate','<=',$request->get('endDate'))
            ->where('endDate','>=',$request->get('startDate'))
            ->exists();
        if($isBooked){
            return redirect()->back()->with('message','Booking already booked');
        }
        Booking::create($data);

        return redirect()->back()->with('message','Add booking success');
    }
    public function contact(Request $request)
    {
        $contact = new Contact();
        $data = $request->all('name','email','phone','message');
        $contact->create($data);

        return redirect()->back()->with('message','Message send successfully');
    }
}
