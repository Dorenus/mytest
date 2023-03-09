@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Edit Restaurant</h1>
                </div>
                <div class="card-body">

                    <form action="{{route('restaurants-update', $restaurant)}}" method="post">

                        <div class="form-group">

                            <div class="mb-3">
                                <label class="form-label">Restaurant name</label>
                                <input type="text" class="form-control" name="title" value="{{old('title', $restaurant->title)}}">

                            </div>

                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" value={{old('city', $restaurant->city)}}>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" value={{old('address', $restaurant->address)}}>

                            </div>
                            <div class="mb-4">
                                <label class="form-label">Opening Time</label>
                                <input type="time" id="time1" name="open" value={{old('open', $restaurant->open)}}>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Closing Time</label>
                                <input type="time" id="time2" name="close" value={{old('close', $restaurant->close)}}>

                            </div>

                            <button type="submit" class="btn btn-outline-primary mt-3">Edit Restaurant</button>
                            @csrf
                            @method('put')
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
