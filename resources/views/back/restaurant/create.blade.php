@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add Restaurant</h1>
                </div>
                <div class="card-body">

                    <form action="{{route('restaurants-store')}}" method="post">

                        <div class="form-group">

                            <div class="mb-3">
                                <label class="form-label">Restaurant name</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address">
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Opening Time</label>
                                <input type="time" id="time1" name="open">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Closing Time</label>
                                <input type="time" id="time2" name="close">
                            </div>


                            {{-- <label class="form-label">Season name</label>
                            <select class="form-control" name="season">
                                <option>Spring</option>
                                <option>Summer</option>
                                <option>Autumn</option>
                                <option>Winter</option>
                            </select> --}}

                            <button type="submit" class="btn btn-outline-primary mt-3">Add New</button>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add Post and Photo</h1>
                </div>
                <div class="card-body">

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">

                            <div class="mb-3">
                                <label class="form-label">Post title</label>
                                <input type="text" class="form-control" name="title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Post price</label>
                                <input type="text" class="form-control" name="price">
                            </div>

                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Post photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>

                            <div class="col-9">
                                <div class="mb-3">
                                    <label class="form-label">Post description</label>
                                    <textarea class="form-control" rows="5" name="hotel_desc"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-outline-primary mt-3">Add New</button>
                            @csrf
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


@endsection
