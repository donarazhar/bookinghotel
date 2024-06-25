<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HotelBookingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/hotels', [FrontController::class, 'hotels'])->name('front.hotels');
Route::post('/hotels/search/', [FrontController::class, 'search_hotels'])->name('front.search.hotels');
Route::get('/hotels/list/{keyword}', [FrontController::class, 'list_hotels'])->name('front.list.hotels');
Route::get('/hotels/details/{hotel:slug}', [FrontController::class, 'hotel_details'])->name('front.hotels.details');
Route::get('/hotels/details/{hotel:slug}/rooms', [FrontController::class, 'hotel_rooms'])->name('front.hotels.rooms');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('can:checkout hotels')->group(function () {
        Route::post('/hotels/{hotel:slug}/{hotel_room}/book', [FrontController::class, 'hotel_room_book'])
            ->name('front.hotel.room.book');

        Route::get('/book/payment/{hotel_booking}/', [FrontController::class, 'hotel_payment'])
            ->name('front.hotel.book.payment');

        Route::put('/book/payment/{hotel_booking}/store', [FrontController::class, 'hotel_payment_store'])
            ->name('front.hotel.book.payment.store');

        Route::get('/book/finish/', [FrontController::class, 'hotel_book_finish'])
            ->name('front.book_finish');
    });

    Route::prefix('admin')->name('admin.')->group(function () {

        Route::middleware('can:manage cities')->group(function () {
            Route::resource('cities', CityController::class);
        });

        Route::middleware('can:manage countries')->group(function () {
            Route::resource('countries', CountryController::class);
        });

        Route::middleware('can:manage hotels')->group(function () {
            Route::resource('hotels', HotelController::class);
        });

        Route::middleware('can:manage hotels')->group(function () {
            Route::get('/add/room/{hotel:slug}', [HotelRoomController::class, 'create'])->name('hotel_rooms.create');
            Route::post('/add/room/{hotel:slug}/store', [HotelRoomController::class, 'store'])->name('hotel_rooms.store');
            Route::get('/hotel/{hotel:slug}/room/{hotel_room}/', [HotelRoomController::class, 'edit'])->name('hotel_rooms.edit');
            Route::put('/hotel/{hotel_room}/update', [HotelRoomController::class, 'update'])->name('hotel_rooms.update');
            Route::delete('/hotel/{hotel:slug}/delete/{hotel_room}', [HotelRoomController::class, 'destroy'])->name('hotel_rooms.destroy');
        });

        Route::middleware('can:manage hotel bookings')->group(function () {
            Route::resource('hotel_bookings', HotelBookingController::class);
        });
    });
});


require __DIR__ . '/auth.php';
