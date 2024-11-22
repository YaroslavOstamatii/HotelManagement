<?php

namespace App\Http\Controllers;

use App\Models\Room;
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
                return view('home.index');
            } elseif ($userType === 'admin') {
                return view('admin.index');
            }
        }
        return redirect()->back();
    }

    public function home()
    {
        return view('home.index');
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

        Room::create($data);
        Storage::disk('public')->put('/images', $data['image']);

         return redirect()->route('home');

    }

}
