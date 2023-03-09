<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all()->sortBy('title');

        return view('back.restaurant.index', [
            'restaurants' => $restaurants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('back.restaurant.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRestaurantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->title = $request->title;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->open = $request->open;
        $restaurant->close = $request->close;

        $restaurant->save();


        return redirect()->route('restaurants-index')->with('ok', 'Restaurant was added');
        
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

   
    public function edit(Restaurant $restaurant)
    {
        
        return view('back.restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }


    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->title = $request->title;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->open = $request->open;
        $restaurant->close = $request->close;
        $restaurant->save();

        return redirect()->route('restaurants-index')->with('ok', 'Restaurant was edited');
    }

    
    public function destroy(Restaurant $restaurant)
    {
        
    //     $restaurant->delete();

    //     return redirect()->route('restaurants-index')->with('not', 'Restaurant was deleted');

    // }

     if (!$restaurant->restaurantMenus()->count()) {
            $restaurant->delete();
            return redirect()->route('restaurant-index')->with('ok', 'Restaurant was deleted');
        }
        return redirect()->back()->with('not', 'Restaurant has menus.');
    }
}
