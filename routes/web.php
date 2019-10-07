<?php

use App\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $listing = Listing::find(3);

    // $listing
    //    ->addMedia(storage_path('app/public/bathroom2.jpg'))
    //    // ->addMediaFromUrl('https://hatrabbits.com/wp-content/uploads/2017/01/random.jpg')
    //    ->preservingOriginal()
    //    ->withResponsiveImages()
    //    ->toMediaCollection();

    // $mediaItems = $listing->getMedia();

    // dd($mediaItems);

    return view('welcome', [
        'listing' => $listing,
    ]);
});

Route::post('/upload', function () {

    $listing = Listing::create([
        'title' => 'My new listing',
        'description' => 'This is my description',
    ]);

    $listing->addMediaFromRequest('uploaded_file')->toMediaCollection();
});
