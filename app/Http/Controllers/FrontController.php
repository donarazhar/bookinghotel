<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSearchHotelRequest;
use App\Models\Hotel;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        return view('front.index');
    }

    public function hotels()
    {
        return view('front.hotels');
    }

    public function search_hotels(StoreSearchHotelRequest $request)
    {

        $request->session()->put('checkin_at', $request->input('checkin_at'));
        $request->session()->put('checkout_at', $request->input('checkout_at'));
        $request->session()->put('keyword', $request->input('keyword'));

        $keyword = $request->session()->get('keyword');

        return redirect()->route('front.list.hotels', ['keyword' => $keyword]);
    }

    public function list_hotels($keyword)
    {
        $hotels = Hotel::with(['rooms', 'city', 'country'])

            ->whereHas('country', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })

            ->orWhereHas('city', function ($query) use ($keyword) {
                $query->where('name', 'like', '%' . $keyword . '%');
            })

            ->orWhere('name', 'like', '%' . $keyword . '%')
            ->get();

        return view('front.list_hotels', compact('hotels', 'keyword'));
    }

    public function hotel_details(Hotel $hotel)
    {
        $latestPhotos = $hotel->photos()->orderByDesc('id')->take(3)->get();
        return view('front.details', compact('hotel', 'latestPhotos'));
    }

    public function hotel_rooms(Hotel $hotel)
    {
        return view('front.list_hotel_rooms', compact('hotel'));
    }
}
