@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-3">
            @include('front.common.cats')
        </div> --}}
        <div class="col-8">


            <form action="{{route('start')}}" method="get">

                <div class="col-2">
                    <div class="mb-3">
                        <label class="form-label">Sort by</label>
                        <select class="form-select" name="sort">
                            {{-- <option>default</option> --}}
                            @foreach($sortSelect as $value => $name)
                            <option value="{{$value}}" @if($sortShow==$value) selected @endif>{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-2">
                    <div class="">
                        <label class="form-label">Restaurants filter</label>
                        <select class="form-select" name="restaurant_id">
                            <option value="all">All</option>
                            @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}" @if($restaurant->id == $restaurantShow) selected @endif>{{$restaurant->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-4">
                    <div class="head-buttons">
                        <button type="submit" class="btn btn-outline-primary mt-4">Show</button>
                        <a href="{{route('start')}}" class="btn btn-outline-info mt-4">Reset</a>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-4">

            <form action="{{route('start')}}" method="get">
                <div class="container">
                    <div class="row ">
                        <div class="col-12">
                            <div class="mb-3" style="display:flex">
                                <label class="form-label"></label>
                                <input type="text" class="form-control" name="s" value="">

                                <button type="submit" class="btn btn-outline-primary m-1">Search</button>
                                <a href="{{route('start')}}" class="btn btn-outline-info m-1">Reset</a>


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <div class="container mt-4">
        <div class="row justify-content-center">

            @forelse($menus as $menu)
            <div class="col-4">
                <div class="list-table text-center">
                    <h3>
                        {{$menu->title}}
                    </h3>
                    {{-- <a href="{{route('show-hotel', $meal)}}"> --}}
                    <a href="{{route('menus-show', $menu)}}">

                        <div class="smallimg">
                            @if($menu->photo)
                            <img src="{{asset($menu->photo)}}">
                            @else
                            <img src="{{asset('no.jpg')}}">
                            @endif
                        </div>
                    </a>

                    {{-- <div class="size mt-2" style="font-style:italic; font-size:16px; font-weight:bold"> {{$meal->length}} days
                </div> --}}

                {{-- <div class="price"> {{$meal->price}} Eur
            </div> --}}
            <div class="type" style="font-weight:bold; font-size:16px"> {{$menu->menusRestaurant->title}}</div>
            {{-- <div class="type">From: {{$meal->hotel_start}}
        </div>
        <div class="type">To: {{$meal->hotel_end}}</div>
        {{-- {{dd($meal->hotelsCountry)}} --}}

        <div class="type">
            <span style="font-weight:bold; font-size:14px; color:blue">From: {{$menu->menusRestaurant->open}} To: {{$menu->menusRestaurant->close}}</span>

        </div>
        <div class="type mb-1">
            <span style="font-weight:bold; font-size:16px; color:crimson">{{$menu->menusRestaurant->city}}</span>
        </div>

        {{-- <div>
                @php
                $sum = 0;
                $count = $meal->mealRatings()->count();
                @endphp

                @forelse($ratings as $rating)

                @if($rating->meal_id == $meal->id)
                @php($sum += $rating->points)
                @endif

                @empty
                No rating yet

                @endforelse

                <h4>
                    @if($count != 0)
                    {{$sum/$count}}
        @endif
        </h4>
        <h5>
            {{$avg}}
        </h5>
    </div> --}}

    {{-- <form action="{{route('rate')}}" method="post">
    <label class="form-label">Meal rating</label>
    <select class="form-control" name="points">
        <option>5</option>
        <option>4</option>
        <option>3</option>
        <option>2</option>
        <option>1</option>
    </select>

    <button type="submit" class="btn btn-outline-danger mt-3">Rate</button>
    <input type="hidden" name="meal_id" value="{{$meal->id}}">

    @csrf
    </form> --}}




    {{-- @if(Auth::user()?->name)
                                {{-- @if(Auth::user()?->role == 'admin') --}}


    {{-- <form action="{{route('add-to-cart')}}" method="post">
    <button type="submit" class="btn btn-outline-primary">Add</button>
    <input type="number" min="1" name="count" value="1">
    <input type="hidden" name="product" value="{{$meal->id}}">
    @csrf
    </form>
    @endif --}}




</div>

</div>
@empty
No menus yet
@endforelse

</div>
</div>
</div>
</div>
</div>
<footer class="bg-light py-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p class="text-muted">
                    &copy; 2023 Columbia Foods chain - All rights reserved
                </p>
            </div>
            <div class="col-md-4 text-center">
                <ul class="list-unstyled text-secondary">
                    <li>
                        <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                        123 Main Street, Anytown, USA
                    </li>
                    <li>
                        <i class="fas fa-phone mr-2 text-primary"></i>
                        (123) 456-7890
                    </li>
                    <li>
                        <i class="fas fa-envelope mr-2 text-primary"></i>
                        info@columbiafoods.com
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <div class="d-flex justify-content-end">
                    <a href="#">
                        <i class="fab fa-facebook-square fa-2x mx-3 text-primary"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter-square fa-2x mx-3 text-primary"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram fa-2x mx-3 text-primary"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-viber fa-2x mx-3 text-primary"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-telegram fa-2x mx-3 text-primary"></i>

                </div>
            </div>
        </div>
    </div>
</footer>




</div>
@endsection
