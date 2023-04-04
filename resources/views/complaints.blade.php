@extends('layouts.app')
@section('content')
<div class="m-3">
  <div class="container" style="margin-left: 220px; margin-bottom:30px; margin-right: 150px;">
    <div class="row" style="margin-top: 30px;">          
      <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{count($complaints)}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Complaints</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container pt-4" style="margin-left: 220px;">
      <div class="row">
          <div class="card" style="border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
              <div class="btn-group mr-2" style="float: right;">
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add complaints</a>
              </div>
              <h5 class="card-title">Manage complaints</h5>
          <div class="table-responsive pt-4">
          <table class="table table-sm" id="table">
              <thead>
              <tr>
                  <th>#</th>
                  <th>Complainant name</th>
                  <th>Complaint type</th>
                  <th>Complaint</th>
                  <th>Created at</th>
                  <th>Resolve</th>
                  <th>Budget</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody> 
              @foreach($complaints as $key=>$complaint)
              {{-- @if($fingerprint->mac) --}}
                  <tr>
                  <td>{{$key+1}}</td>
                  <td style="text-transform: uppercase;">{{$complaint->name}}</td>
                  <td style="text-transform: uppercase;">{{$complaint->type}}</td>
                  <td style="text-transform: uppercase;">{{$complaint->description}}</td>
                  <td>{{date('d-m-Y', strtotime($complaint->created_at))}}</td>
                  <td>{{date('d-m-Y', strtotime($complaint->resolved))}}</td>
                  <td>{{$complaint->budget}}</td>
                  <td><div class="dropup">
                      <a href="#" role="button" data-bs-toggle="dropdown" >
                        <i style="color: black;" class="bi bi-three-dots-vertical"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <form action="{{route('complaint.delete', ['id'=>$complaint->id])}}" method="POST">
                          <a class="dropdown-item" href="{{route('complaintsedit', ['id'=>$complaint->id])}}">Edit</a>
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
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add complaint</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{route('complaintcreate')}}">
                    <div class="row">
                      <div class="col">
                        <label for="name" class="form-label" style="font-weight: bold;">Complainant name</label>
                        <input type="text" class="form-control" placeholder="John Doe" name="name">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="email" class="form-label" style="font-weight: bold;">Complaint description</label>
                        <input type="text" class="form-control" placeholder="Description" name="description">
                      </div>
                      <div class="col">
                        <label for="email" class="form-label" style="font-weight: bold;">Complaint type</label>
                        <select class="form-select" aria-label="Default select example"  name="type">
                          <option selected>Select complaint type</option>
                          <option value="room">Room</option>
                          <option value="rental">Rental</option>
                        </select>
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="email" class="form-label" style="font-weight: bold;">Resolve</label>
                        <input type="date" class="form-control" placeholder="Resolve date" name="resolve">
                      </div>
                      <div class="col">
                        <label for="email" class="form-label" style="font-weight: bold;">Budget</label>
                        <input type="text" class="form-control" placeholder="Budget" name="budget">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div> 
        </div>
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