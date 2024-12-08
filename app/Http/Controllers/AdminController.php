<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Room;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $userType = Auth::user()->user_type;
            if ($userType === 'user') {
                return view('home.index', ['rooms' => Room::all(),'gallary' => Gallary::all()]);
            } elseif ($userType === 'admin') {
                return view('admin.index');
            }
        }
        return redirect()->back();
    }

    public function home()
    {
        return view('home.index', ['rooms' => Room::all(), 'gallary' => Gallary::all()]);
    }

    public function create()
    {
        return view('admin.create_room');

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'room_title' => 'required|string|max:255',
            'image' => 'nullable|image|max:1024',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'wifi' => 'required|in:yes,no',
            'room_type' => 'required|in:regular,premium,deluxe',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }
        Room::create($data);

        return redirect()->route('home');

    }

    public function show()
    {
        return view('admin.view_rooms', ['rooms' => Room::all()]);
    }

    public function delete(Room $id)
    {
        $id->delete();
        return redirect()->back();
    }

    public function edit(Room $id)
    {
        return view('admin.update_room', compact('id'));
    }

    public function update(Room $id, Request $request)
    {
        $data = $request->all();
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('images', 'public');
            $data['image'] = $imagePath;
        }
        $id->update($data);

        return view('admin.view_rooms', ['rooms' => Room::all()]);
    }

    public function bookings()
    {
        return view('admin.view_bookings', ['bookings' => Booking::all()]);
    }
    public function delete_booking(Booking $booking)
    {
        $booking->delete();
        return redirect()->back();
    }
    public function approve_booking(Booking $booking)
    {
        $booking->update(['status' => 'approve']);
        return redirect()->back();
    }
    public function reject_booking(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        return redirect()->back();
    }
    public function view_gallary()
    {

        return view('admin.gallary',['gallary' => Gallary::all()]);
    }
    public function upload_gallary(Request $request)
    {
//        if ($request->hasFile('image')) {
//            $imagePath = $request->file('image')->store('images', 'public');
//            $data['image'] = $imagePath;
//        }
        $gallary = new Gallary();
        $image = $request->image;
        if($image){
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary',$imageName);
            $gallary->image = $imageName;
            $gallary->save();
        }
        return redirect()->back();

    }

    public function delete_gallary(Gallary $id)
    {
        $id->delete();

        return redirect()->back();
    }
    public function all_messages()
    {
        return view('admin.messages',['messages' => Contact::all()]);
    }
}
