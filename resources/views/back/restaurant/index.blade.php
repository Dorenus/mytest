@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>All Restaurants</h1>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @forelse($restaurants as $restaurant)
                        <li class="list-group-item">
                            <div class="list-table">
                                <div class="list-table__content">
                                    <h3>{{$restaurant->title}}</h3>
                                    <h3>{{$restaurant->city}}</h3>
                                    <h3>{{$restaurant->address}}</h3>
                                </div>
                                <div class="list-table__buttons">
                                    {{-- @if(Auth::user()?->role == 'admin') --}}
                                    <a href="{{route('restaurants-edit', $restaurant)}}" class="btn btn-outline-success">Edit</a>
                                    <form action="{{route('restaurants-delete', $restaurant)}}" method="post">
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                        @csrf
                                        @method('delete')
                                    </form>
                                    {{-- @endif --}}
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="list-group-item">No posts yet</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
