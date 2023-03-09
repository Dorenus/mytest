<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Menu;
use App\Models\Restaurant;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function home(Restaurant $restaurant, Request $request) {

        //  $meals = Meal::all();




        //   if ($request->s) {
        //      $s = explode(' ', $request->s);
        //      if ( count($s) == 1) {
        //         $meals = Meal::where('name', 'like', '%'.$request->s.'%')->get();
        //     }
        //     else {
        //         $meals = Meal::where('name', 'like', '%'.$s[0].'%'.$s[1].'%')
        //         ->orWhere('title', 'like', '%'.$s[1].'%'.$s[0].'%')
        //         ->get();
        //     }
        // }

        if (!$request->s) {

        if ($request->restaurant_id && $request->restaurant_id != 'all') {
                $menus = Menu::where('restaurant_id', $request->restaurant_id);
            }
            else {
                $menus = Menu::where('id', '>', 0);
            } 

        $menus = match($request->sort ?? '') {
                
                'asc_price' => $menus->orderBy('title'),
                'desc_price' => $menus->orderBy('title', 'desc'),
                default => $menus
            };
            $menus = $menus->get();
        }
        
            // $meals = $meals->get();

         else {
             $s = explode(' ', $request->s);
             if ( count($s) == 1) {
                $menus = Menu::where('title', 'like', '%'.$request->s.'%')->get();
            }
            else {
                $menus = Menu::where('title', 'like', '%'.$s[0].'%'.$s[1].'%')
                ->orWhere('title', 'like', '%'.$s[1].'%'.$s[0].'%')
                ->get();
            }
        
        }

        $restaurants = Restaurant::all()->sortBy('title');

        $ratings = Rating::all();

        // $menus = Menu::all();

        $avg = Rating::avg('points');

        // $avg = 56;



        
          return view('front.home', [
            'menus' => $menus,
            // 'meals' => $meals,
            's' => $request->s ?? '',
            'restaurants' => $restaurants,
            'restaurantShow' => $request->restaurant_id ? $request->restaurant_id : '',
            'sortSelect' => Meal::SORT,
            'sortShow' => isset(Meal::SORT[$request->sort]) ? $request->sort : '',
            'ratings' => $ratings,
            'avg' => $avg,
            // 'sum' => $sum,
            
        ]);


    }
}
