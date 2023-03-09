@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- <div class="col-3">
            @include('front.common.cats')
        </div> --}}
        <div class="col-9">
            <div class="card border-primary">

                <div class="card-body">

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="list-table one">
                                    <div class="top">
                                        <h3>
                                            {{$menu->title}}
                                        </h3>
                                        <div class="smallimg">
                                            @if($menu->photo)
                                            <img src="{{asset($menu->photo)}}">
                                            @else
                                            <img src="{{asset('no.jpg')}}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="bottom border-top border-danger mt-4">

                                        <div class="info">
                                            <div class="type" style="font-size: 50px; font-weight:bold"> {{$menu->menusRestaurant->title}}</div>
                                            {{-- <div class=" size" style="font-size: 16px; font-weight:bold"> {{$hotel->length}} days
                                        </div>
                                        <span>From: {{$hotel->hotel_start}} to: {{$hotel->hotel_end}}</span> --}}

                                    </div>

                                    @forelse($menu->mealsMenu as $meal)
                                    <li class="list-group-item">
                                        <div class="list-table">
                                            <div class="list-table__content">
                                                <h3>{{$meal->name}}</h3>
                                                <h3 style="color:red">{{$meal->price}}</h3>
                                                <div class="smallimg">
                                                    @if($meal->photo)
                                                    <img src="{{asset($meal->photo)}}">
                                                    @else
                                                    <img src="{{asset('no.jpg')}}">
                                                    @endif
                                                </div>

                                                {{-- <h3>{{$restaurant->address}}</h3> --}}
                                            </div>
                                        </div>
                                    </li>
                                    @empty
                                    <li class="list-group-item">No meals yet</li>
                                    @endforelse


                                    {{-- <div class="buy">
                                            <div class="price"> {{$hotel->price}} Eur
                                </div>
                                <form action="{{route('add-to-cart')}}" method="post">
                                    <button type="submit" class="btn btn-outline-primary">Add to cart</button>
                                    <input type="number" min="1" name="count" value="1">
                                    <input type="hidden" name="product" value="{{$hotel->id}}">
                                    @csrf
                                </form>

                                {{-- <button type="submit" class="btn btn-outline-primary">Add</button> --}}
                            </div>

                            {{-- @if(Auth::user()?->name) --}}
                            {{-- @if(Auth::user()?->role == 'admin') --}}


                            {{-- <form action="{{route('add-to-cart')}}" method="post">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                            <input type="number" min="1" name="count" value="1">
                            <input type="hidden" name="product" value="{{$hotel->id}}">
                            @csrf
                            </form>
                            @endif --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
