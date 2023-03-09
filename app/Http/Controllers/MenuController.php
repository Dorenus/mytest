<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all()->sortBy('title');
        $restaurants = Restaurant::all()->sortBy('title');


        return view('back.menu.index', [
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $restaurants = Restaurant::all();

       return view('back.menu.create', [
           'restaurants' => $restaurants
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMenuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'title' => 'required|alpha|min:3|max:100|',
            // 'name' => 'required|numeric|min:1|max:9999',
            // 'price' => 'required|decimal:0,2|min:0|max:99999',
            // 'country_id' => 'required|alpha|min:3|max:100|',
            // 'country_id' => 'required|numeric|min:1',
            // 'drink_vol' => 'sometimes|decimal:0,1|min:1|max:99',
            ]);

            if ($validator->fails()) {
                $request->flash();
                return redirect()->back()->withErrors($validator);
            }
        
        $menu = new Menu;


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


            $photo->move(public_path().'/menus', $file);

            $menu->photo = '/menus/' . $file;

            // $hotel->photo = asset('/hotels/') . '/' . $file;

            // $meal->photo = "any text";

        }

        $menu->title = $request->title;
        $menu->restaurant_id = $request->restaurant_id;
        // $menu->price = $request->price;

        $menu->save();


        return redirect()->route('menus-index')->with('ok', 'New menu was added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('front.menu', ['menu' => $menu]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $restaurants = Restaurant::all()->sortBy('title');

        return view('back.menu.edit', [
            'menu' => $menu,
            'restaurants' => $restaurants
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMenuRequest  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make(
            $request->all(),
            [
            'title' => 'required|alpha|min:3|max:100|',
            // 'name' => 'required|numeric|min:1|max:9999',
            // 'price' => 'required|decimal:0,2|min:0|max:99999',
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


            $photo->move(public_path().'/menus', $file);

            $menu->photo = '/menus/' . $file;

            $menu->save();

            // $hotel->photo = asset('/hotels/') . '/' . $file;

            // $meal->photo = "any text";

        }

        $menu->title = $request->title;
        $menu->restaurant_id = $request->restaurant_id;
        // $menu->price = $request->price;

        $menu->save();


        return redirect()->route('menus-index')->with('ok', 'New menu was edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
    //     $menu->delete();
    //     return redirect()->back()->with('not', 'Menu was deleted');
    // }

    if (!$menu->mealsMenu()->count()) {
            $menu->delete();
            return redirect()->route('menu-index')->with('ok', 'Menu was deleted');
        }
        return redirect()->back()->with('not', 'Menu has meals.');
    }
}


