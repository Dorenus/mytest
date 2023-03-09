@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Menu and Photo</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('menus-update', $menu)}}" method="post">



                        <div class="mb-3">
                            <label class="form-label">Menu name</label>
                            <input type="text" class="form-control" name="title" value="{{old('name', $menu->title)}}">
                        </div>

                        {{-- <div class="mb-3">
                            <label class="form-label">Meal price</label>
                            <input type="text" class="form-control" name="price" value="{{old('price', $meal->price)}}">
                </div> --}}

                <div class="col-3">
                    <div class="mb-3">
                        <label class="form-label">Post photo</label>
                        <input type="file" class="form-control" name="photo" value={{old('photo', $menu->photo)}}>

                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label class="form-label">Restaurant where menu is served</label>
                        <select id="meal--create--edit" class="form-select" name="restaurant_id">
                            @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}" @if($restaurant->id == old('restaurant_id')) selected @endif>{{$restaurant->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <button type="submit" class="btn btn-outline-primary mt-3">Edit menu</button>
                @csrf
                @method('put')
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
