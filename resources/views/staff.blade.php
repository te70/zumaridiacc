@extends('layouts.app')
@section('content')
<div class="container pt-4" style="margin-left: 220px;">
    <div class="row">
        <div class="card" style="border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card-body">
            <div class="btn-group mr-2" style="float: right;">
                <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add staff</a>
            </div>
            <h5 class="card-title">Manage staff</h5>
        <div class="table-responsive pt-4">
        <table class="table table-sm" id="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Employee name</th>
                <th>Staff</th>
                <th>Shift</th>
                <th>Joining date</th>
                <th>Change shift</th>
                <th>Created</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody> 
            {{-- @foreach($fingerprintsLive as $key=>$fingerprint) --}}
            {{-- @if($fingerprint->mac) --}}
                <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td><span class="badge rounded-pill text-bg-warning">6</span></td>
                <td>7</td>
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
            {{-- @endforeach --}}
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
              <h5 class="modal-title" id="addModalLabel">Add room</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col">
                  <label for="customerEmail" class="form-label" style="font-weight: bold;">Staff type</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select room type</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="col">
                  <label for="customerEmail" class="form-label" style="font-weight: bold;">Shift</label>
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Select room type</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div>
                  <div class="row">
                    <div class="col">
                      <label for="firstName" class="form-label" style="font-weight: bold;">First name</label>
                      <input type="text" class="form-control" placeholder="first name">
                    </div>
                    <div class="col">
                      <label for="lastName" class="form-label" style="font-weight: bold;">Last name</label>
                      <input type="text" class="form-control" placeholder="last name">
                    </div>
                  </div>
                  <div class="row pt-4">
                    <div class="col">
                      <label for="contactNumber" class="form-label" style="font-weight: bold;">Contact number</label>
                      <input type="text" class="form-control" placeholder="Contact number">
                    </div>
                  </div>
                  <div class="row pt-4">
                    <div class="col">
                      <label for="customerEmail" class="form-label" style="font-weight: bold;">ID card type</label>
                      <select class="form-select" aria-label="Default select example">
                        <option selected>Select room type</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                    </div>
                    <div class="col">
                      <label for="selected ID" class="form-label" style="font-weight: bold;">Selected ID type</label>
                      <input type="text" class="form-control" placeholder="Selected ID">
                    </div>
                  </div>
                  <div class="row pt-4">
                    <div class="col">
                      <label for="customerEmail" class="form-label" style="font-weight: bold;">Residential address</label>
                      <input type="text" class="form-control" placeholder="Selected ID">
                    </div>
                    <div class="col">
                      <label for="selected ID" class="form-label" style="font-weight: bold;">Salary</label>
                      <input type="text" class="form-control" placeholder="Selected ID">
                    </div>
                  </div>
                  <div class="row pt-4">
                    <div class="col">
                      <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
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
    </div>
</div>
<script>
     $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection