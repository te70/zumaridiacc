@extends('layouts.app')
@section('content')
<div class="container pt-4" style="margin-left: 220px;">
    <div class="row">
        <div class="card" style="border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card-body">
            <div class="btn-group mr-2" style="float: right;">
                <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add rooms</a>
                {{-- <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add rooms</a> --}}
            </div>
            <h5 class="card-title">Manage rooms</h5>
        <div class="table-responsive pt-4">
        <table class="table table-sm" id="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Room No</th>
                <th>RoomType</th>
                <th>Status</th>
                <th>Check in</th>
                <th>Check out</th>
                <th>Days</th>
                <th>Total price</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
            @foreach($rooms as $key=>$room)
            {{-- @if($fingerprint->mac) --}}
                <tr>
                <td>{{$key+1}}</td>
                <td>{{$room->room_number}}</td>
                <td>{{$room->room_type}}</td>
                {{-- @dd($room->reservations) --}}
                {{-- @if($room->reservations->check_out_date >  now()->format('Y-m-d')) --}}
                <td>Booked</td>
                {{-- @else --}}
                {{-- <td>Not booked</td> --}}
                {{-- @endif --}}
                <td>{{date('d-m-Y', strtotime($room->check_in_date))}}</td>
                <td>{{date('d-m-Y', strtotime($room->check_out_date))}}</td>
                <td>{{$room->number_of_days}}</td>
                <td>{{$room->total_price}}</td>
                <td><div class="dropup">
                    <a href="#" role="button" data-bs-toggle="dropdown" >
                      <i style="color: black;" class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <form action="" method="POST">
                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#viewModal">View</a>
                        <a class="dropdown-item" href="">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item" href="">Delete</button>
                    </form> 
                    </ul>
                  </div></td>
            </tr>
            {{-- @endif --}}
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </div>
    </div>
    {{-- View Modal --}}
    <div class="modal fade" id="viewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Customer details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                      <p class="" style="font-weight: bold;">First name: <span>Test Account</span></p>
                      <p class="" style="font-weight: bold;">Contact: <span>0722000000</span></p>
                      <p class="" style="font-weight: bold;">ID card type: <span>National ID</span></p>
                      <p class="" style="font-weight: bold;">ID card number: <span>11227654</span></p>
                      <p class="" style="font-weight: bold;">Amount paid: <span>500</span></p>
                    </div>
                  </div>
            </div>
          </div>
        </div>
    </div>
    {{-- Add modal --}}
    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">Add room</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops</strong> There were some problems with your input. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success text-center">
                {{Session::get('success')}}
            </div>
        @endif
        
        <form class="form-signin" action="{{route('addrooms')}}" method="POST" enctype="multipart/form-data" novalidate>
          @csrf
          {{-- room number --}}
          <label for="room_type" class="sr-only mb-2">Room Type</label>
          <select class="form-select" aria-label="Default select example" name="room_type">
            <option selected>Select room type</option>
            <option value="economy">Economy</option>
            <option value="double_bed">Double bed</option>
            <option value="executive">Executive</option>
          </select>
          @error('room_type')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
          @enderror
          {{-- room number --}}
          <label for="room_number" class="sr-only mb-2">Room Number</label>
          <input type="text" id="room_number" class="form-control @error('room_number') is-invalid @enderror" name="room_number" placeholder="Room number">
          @error('room_number')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}}</strong>
          </span>
          @enderror
          <button class="btn btn-sm btn-primary btn-block mb-2 mt-3" style="margin-top: 8px;" type="submit">Submit</button>
        </form> 
      </div>
    </div>
  </div>
            </div>
          </div>
        </div>
    </div>
</div>
<script>
     $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection