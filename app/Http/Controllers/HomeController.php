<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function details(Request $request)
    {
        $room = Room::findOrFail($request->input('room_id'));

        return view('home.room_details',['room' => $room]);
    }
}
