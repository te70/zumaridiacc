@extends('layouts.app')
@section('content')
<div class="container m-3">
    <div class="row" style="margin-left:250px">
        <div class="card">
            <form method="POST" action="{{route('complaint.update', ['id'=>$complaint->id])}}">
                <div class="row pt-4">
                <div class="col">
                    <label for="name" class="form-label" style="font-weight: bold;">Name</label>
                    <input type="text" class="form-control" placeholder="John Doe" value="{{$complaint->name}}" name="name">
                </div>
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Type</label>
                    <select class="form-select" aria-label="Default select example"  name="type">
                        <option selected>Select complaint type</option>
                        <option value="room">Room</option>
                        <option value="rental">Rental</option>
                      </select>
                </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <label for="name" class="form-label" style="font-weight: bold;">Description</label>
                        <input type="text" class="form-control" placeholder="Broken shower" value="{{$complaint->description}}" name="description">
                    </div>
                    <div class="col">
                        <label for="name" class="form-label" style="font-weight: bold;">Resolve</label>
                        <input type="date" class="form-control" placeholder="02-05-2023" value="{{$complaint->resolve}}" name="resolve">
                    </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Budget</label>
                    <input type="text" class="form-control" placeholder="1000" value="{{$complaint->budget}}" name="budget">
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