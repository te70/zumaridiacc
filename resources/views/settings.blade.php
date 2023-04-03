@extends('layouts.app')
@section('content')
<div class="container m-3">
    <div class="row" style="margin-left:250px">
        <div class="card">
            <form method="POST" action="{{route('settingsupdate')}}">
                <div class="row pt-4">
                <div class="col">
                    <label for="name" class="form-label" style="font-weight: bold;">Name</label>
                    <input type="text" class="form-control" placeholder="John Doe" value="{{$user->name}}" name="name">
                    <input type="text" class="form-control" value="{{$user->id}}" name="id" hidden>
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                    <input type="text" class="form-control" placeholder="Description" value="{{$user->email}}" name="email">
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Password</label>
                    <input type="password" class="form-control" placeholder="Resolve date" value="{{$user->password}}" name="password">
                </div>
                </div>
                <div class="row pt-4 pb-4">
                <div class="col">
                    <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection