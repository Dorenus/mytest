<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class MealController extends Controller
{
    
    public function index(Request $request)
    {
        // if (!$request->s) {

        // if ($request->country_id && $request->country_id != 'all') {
        //         $hotels = Hotel::where('country_id', $request->country_id);
        //     }
        //     else {
        //         $hotels = Hotel::where('id', '>', 0);
        //     } 

        // $hotels = match($request->sort ?? '') {
        //         'asc_title' => $hotels->orderBy('title'),
        //         'desc_title' => $hotels->orderBy('title', 'desc'),
        //         'asc_price' => $hotels->orderBy('price'),
        //         'desc_price' => $hotels->orderBy('price', 'desc'),
        //         'asc_length' => $hotels->orderBy('length'),
        //         'desc_length' => $hotels->orderBy('length', 'desc'),
        //         default => $hotels
        //     };
        //     $hotels = $hotels->get();
        // }
        
            // $hotels = $hotels->get();

        //  else {
        //      $s = explode(' ', $request->s);
        //      if ( count($s) == 1) {
        //         $hotels = Hotel::where('title', 'like', '%'.$request->s.'%')->get();
        //     }
        //     else {
        //         $hotels = Hotel::where('title', 'like', '%'.$s[0].'%'.$s[1].'%')
        //         ->orWhere('title', 'like', '%'.$s[1].'%'.$s[0].'%')
        //         ->get();
        //     }
        
        // }


        //  $hotels= Hotel::all();

        //  $hotels = match($request->sort ?? '') {
        //         'asc_title' => $hotels->orderBy('title'),
        //         'desc_title' => $hotels->orderBy('title', 'desc'),
        //         'asc_price' => $hotels->orderBy('price'),
        //         'desc_price' => $hotels->orderBy('size', 'desc'),
        //         default => $hotels
        //     };
        
        // $hotels = $hotels->get();


        $meals = Meal::all()->sortBy('title');
        // $hotels = Hotel::all();

        $restaurants = Restaurant::all()->sortBy('title');
        $menus = Menu::all()->sortBy('title');


        return view('back.meal.index', [
            'meals' => $meals,
            'menus' => $menus,
            // 'sortSelect' => Hotel::SORT,
            // 'sortShow' => isset(Hotel::SORT[$request->sort]) ? $request->sort : '',
            // 'perPageSelect' => Drink::PER_PAGE,
            // 'perPageShow' => $perPageShow,
            'restaurants' => $restaurants,
            // 'countryShow' => $request->country_id ? $request->country_id : '',
            // 's' => $request->s ?? ''
        ]);
    }

    
    public function create()
    {

       $restaurants = Restaurant::all();
       $menus = Menu::all()->sortBy('title');

       return view('back.meal.create', [
           'restaurants' => $restaurants,
           'menus' => $menus,
           
       ]);

    }

   
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|alpha|min:3|max:100|',
            // 'name' => 'required|numeric|min:1|max:9999',
            'price' => 'required|decimal:0,2|min:0|max:99999',
            // 'country_id' => 'required|alpha|min:3|max:100|',
            // 'country_id' => 'required|numeric|min:1',
            // 'drink_vol' => 'sometimes|decimal:0,1|min:1|max:99',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        
        $meal = new Meal;


        if ($request->file('photo')) {
            $photo = $request->file('photo');

            // dd($photo);

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            

            // $manager = new ImageManager(['driver' => 'GD']);

            // $image = $manager->make($photo);
            // $image->crop(400, 600);
            // $image->save(public_path().'/hotels/'.$file);


            $photo->move(public_path().'/meals', $file);

            $meal->photo = '/meals/' . $file;

            // $hotel->photo = asset('/hotels/') . '/' . $file;

            // $meal->photo = "any text";

        }

        $meal->name = $request->name;
        $meal->menu_id = $request->menu_id;
        $meal->price = $request->price;

        $meal->save();


        return redirect()->route('meals-index')->with('ok', 'New meal was added');
    }

    
    public function show(Meal $meal)
    {
        //
    }

   
    public function edit(Meal $meal)
    {

        $restaurants = Restaurant::all()->sortBy('title');

        return view('back.meal.edit', [
            'meal' => $meal,
            'restaurants' => $restaurants
        ]);
    }

    
    public function update(Request $request, Meal $meal)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'name' => 'required|alpha|min:3|max:100|',
            // 'name' => 'required|numeric|min:1|max:9999',
            'price' => 'required|decimal:0,2|min:0|max:99999',
            // 'country_id' => 'required|alpha|min:3|max:100|',
            // 'country_id' => 'required|numeric|min:1',
            // 'drink_vol' => 'sometimes|decimal:0,1|min:1|max:99',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        
        

        if ($request->file('photo')) {
            $photo = $request->file('photo');

            // dd($photo);

            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name. '-' . rand(100000, 999999). '.' . $ext;
            

            // $manager = new ImageManager(['driver' => 'GD']);

            // $image = $manager->make($photo);
            // $image->crop(400, 600);
            // $image->save(public_path().'/hotels/'.$file);


            $photo->move(public_path().'/meals', $file);

            $meal->photo = '/meals/' . $file;

            // $hotel->photo = asset('/hotels/') . '/' . $file;

            // $meal->photo = "any text";

        }

        $meal->name = $request->name;
        $meal->restaurant_id = $request->restaurant_id;
        $meal->price = $request->price;

        $meal->save();


        return redirect()->route('meals-index')->with('ok', 'Meal was editted');
    }

    
    public function destroy(Meal $meal)
    {
        $meal->delete();
        return redirect()->back()->with('not', 'Meal was deleted');
    }
}
