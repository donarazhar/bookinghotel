<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreHotelRequest;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hotels = Hotel::with(['rooms'])->orderByDesc('id')->paginate(10);
        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries = Country::orderByDesc('id')->get();
        $cities = City::orderByDesc('id')->get();
        return view('admin.hotels.create', compact('countries', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        //

        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath =
                    $request->file('thumbnail')->store('thumbnails/' . date('Y/m/d'), 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $hotel = Hotel::create($validated);

            // Menyimpan beberapa foto dari hotel tersebut
            // contoh menyimpan 3 Photo
            // Akan disimpan 1-1

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $photoPath = $photo->store('photos/' . date('Y/m/d'), 'public');
                    $hotel->photos()->create([
                        'photo' => $photoPath
                    ]);
                }
            }
        });
        return redirect()->route('admin.hotels.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
