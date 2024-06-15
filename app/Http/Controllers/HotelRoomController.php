<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\HotelRoom;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRoomRequest;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Hotel $hotel)
    {
        //
        return view('admin.hotel_rooms.create', compact('hotel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request, Hotel $hotel)
    {
        //Closured-based transaction
        DB::transaction(function () use ($request, $hotel) {
            $validated = $request->validated();

            if ($request->hasFile('photo')) {
                $photoPath =
                    $request->file('photo')->store('photos/' . date('Y/m/d'), 'public');
                $validated['photo'] = $photoPath;
            }

            $validated['hotel_id'] = $hotel->id;

            $room = HotelRoom::create($validated);
        });
        return redirect()->route('admin.hotels.show', $hotel->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(HotelRoom $hotelRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HotelRoom $hotelRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HotelRoom $hotelRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HotelRoom $hotelRoom)
    {
        //
    }
}
