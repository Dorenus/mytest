<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class RatingController extends Controller
{
    
    public function index()
    {
        $ratings = Rating::all();

        return view('front.home', [
            'ratings' => $ratings
        ]);

    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $rating = new Rating;

        $rating->points = $request->points;
        $rating->meal_id = $request->meal_id;

        $rating->save();

        return redirect()->back()->with('ok', 'Thank you, your rating was added');
    }

   
     
    public function show(Rating $rating)
    {
        //
    }

    
    public function edit(Rating $rating)
    {
        //
    }

    
    public function update(Request $request, Rating $rating)
    {
        //
    }

    
    public function destroy(Rating $rating, Meal $meal)
    {
        $rating->delete();
        return redirect()->back()->with('not', 'Rating was deleted');
    }
}
