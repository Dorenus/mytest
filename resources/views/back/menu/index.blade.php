@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <form action="{{route('menus-index')}}" method="get">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <h1>List of all menus</h1>
                                </div>


                                {{-- <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label">Sort by</label>
                                        <select class="form-select" name="sort">
                                            {{-- <option>default</option> --}}
                                {{-- @foreach($sortSelect as $value => $name)
                                            <option value="{{$value}}" @if($sortShow==$value) selected @endif>{{$name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div> --}}

                        {{-- <div class="col-2">
                                    <div class="mb-3">
                                        <label class="form-label">Countries</label>
                                        <select class="form-select" name="country_id">
                                            <option value="all">All</option>
                                            @foreach($countries as $country)
                                            <option value="{{$country->id}}" @if($country->id == $countryShow) selected @endif>{{$country->title}}</option>
                        @endforeach
                        </select>
                </div>
            </div> --}}

            {{-- <div class="col-4">
                                    <div class="head-buttons">
                                        <button type="submit" class="btn btn-outline-primary mt-4">Show</button>
                                        <a href="{{route('hotels-index')}}" class="btn btn-outline-info mt-4">Reset</a>
        </div>
    </div> --}}
    {{-- <form action="{{route('hotels-index')}}" method="get">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="mb-3">
                    <label class="form-label">Find hotel</label>
                    <input type="text" class="form-control" name="s" value="{{$s}}">

                    <button type="submit" class="btn btn-outline-primary mt-3">Search</button>

                </div>
            </div>
        </div>
        </form> --}}
    </div>

</div>
</div>



</div>
</div>
</form>
</div>
</div>



<div class="card-body">
    <ul class="list-group">
        @forelse($menus as $menu)
        <li class="list-group-item">
            <div class="list-table">
                <div class="list-table__content">
                    <h3>{{$menu->title}}</h3>

                    {{-- <div class="size"> {{$meal->length}} days
                </div> --}}
                {{-- <div class="price"> {{$meal->price}} Eur
            </div> --}}
            <div class="type"> {{$menu->menusRestaurant->title}}</div>

            <div class="smallimg">
                @if($menu->photo)
                <img src="{{asset($menu->photo)}}">
                @endif
            </div>

</div>
<div class="list-table__buttons">
    {{-- <a href="{{route('meals-show', $meal)}}" class="btn btn-outline-primary">Show</a> --}}
    <a href="{{route('meals-create', $menu)}}" class="btn btn-outline-success">Add Meal</a>
    <a href="{{route('menus-edit', $menu)}}" class="btn btn-outline-success">Edit</a>

    {{-- @if(Auth::user()?->role == 'admin') --}}
    <form action="{{route('menus-delete', $menu)}}" method="post">
        <button type="submit" class="btn btn-outline-danger">Delete</button>
        @csrf
        @method('delete')
    </form>
    {{-- @endif --}}
</div>
</div>
</li>
@empty
<li class="list-group-item">No menus yet</li>
@endforelse
</ul>
</div>
</div>
</div>
</div>

@endsection
