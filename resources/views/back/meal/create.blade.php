@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Add Meal and Photo</h1>
                </div>
                <div class="card-body">

                    <form action="{{route('meals-store')}}" method="post" enctype="multipart/form-data">

                        <div class="form-group">

                            <div class="mb-3">
                                <label class="form-label">Meal name</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Meal price</label>
                                <input type="text" class="form-control" name="price">
                            </div>

                            <div class="col-3">
                                <div class="mb-3">
                                    <label class="form-label">Post photo</label>
                                    <input type="file" class="form-control" name="photo">
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="mb-3">
                                    <label class="form-label">Menu where meal is added</label>
                                    <select id="meal--create--edit" class="form-select" name="menu_id">
                                        @foreach($menus as $menu)
                                        <option value="{{$menu->id}}" @if($menu->id == old('menu_id')) selected @endif>{{$menu->title}}</option>
                                        @endforeach
                                    </select>
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
</div>


@endsection
