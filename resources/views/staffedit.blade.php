@extends('layouts.app')
@section('content')
<div class="container m-3">
    <div class="row" style="margin-left:250px">
        <div class="card">
            <form method="POST" action="{{route('edit.staff', ['id'=>$staff->id])}}">
                <div class="row pt-4">
                <div class="col">
                    <label for="name" class="form-label" style="font-weight: bold;">First name</label>
                    <input type="text" class="form-control" placeholder="John" value="{{$staff->first_name}}" name="first_name">
                </div>
                <div class="col">
                    <label for="name" class="form-label" style="font-weight: bold;">Last name</label>
                    <input type="text" class="form-control" placeholder="John" value="{{$staff->last_name}}" name="last_name">
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Contact</label>
                    <input type="text" class="form-control" placeholder="0712300000" value="{{$staff->contact_number}}" name="contact_number">
                </div>
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Shift</label>
                    <select class="form-select" aria-label="Default select example" name="shift" value={{$staff->shift}}>
                        <option selected>Select shift</option>
                        <option value="day">Day</option>
                        <option value="night">Night</option>
                      </select>
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Residential address</label>
                    <input type="text" class="form-control" placeholder="Thika" value="{{$staff->residential_address}}" name="residential_address">
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