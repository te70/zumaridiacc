@extends('layouts.app')
@section('content')
<div class="m-3">
  <div class="container" style="margin-left: 220px; margin-bottom:30px; margin-right: 150px;">
    <div class="row" style="margin-top: 30px;">          
      <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{count($tenants)}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Tenants</p>
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
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Export</a>
              </div>
              <h5 class="card-title">Tenant details</h5>
          <div class="table-responsive pt-4">
          <table class="table table-sm" id="table">
              <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>House number</th>
                  <th>ID front</th>
                  <th>ID back</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody> 
              {{-- @foreach($tenants as $key=>$tenant)
              @if($fingerprint->mac) --}}
                  <tr>
                  <td>{{$key+1}}</td>
                  <td style="text-transform: uppercase;">{{$tenant->first_name.' '.$tenant->last_name}}</td>
                  <td style="text-transform: uppercase;">{{$tenant->contact}}</td>
                  <td style="text-transform: uppercase;">{{$tenant->contact}}</td>
                  <td><img src="{{ asset('/images/'. $tenant->imageName ) }}" width="100px" height="80px"></td>
                  <td><img src="{{ asset('/images/'. $tenant->imageName ) }}" width="100px" height="80px"></td>
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
                <form method="POST" action="{{route('addstaff')}}">
                <div class="row">
                  <div class="col">
                    <label for="customerEmail" class="form-label" style="font-weight: bold;">Staff type</label>
                    <select class="form-select" aria-label="Default select example"  name="staff_type">
                      <option selected>Select Staff type</option>
                        <option value="rooms">Rooms</option>
                        <option value="bar">Bar</option>
                        <option value="wines">Wines</option>
                        <option value="playstation">Ps</option>
                        <option value="inbet">Inbet</option>
                    </select>
                  </div>
                  <div class="col">
                    <label for="customerEmail" class="form-label" style="font-weight: bold;">Shift</label>
                    <select class="form-select" aria-label="Default select example" name="shift">
                      <option selected>Select shift</option>
                      <option value="day">Day</option>
                      <option value="night">Night</option>
                    </select>
                  </div>
                </div>
                    <div class="row">
                      <div class="col">
                        <label for="firstName" class="form-label" style="font-weight: bold;">First name</label>
                        <input type="text" class="form-control" placeholder="first name" name="first_name">
                      </div>
                      <div class="col">
                        <label for="lastName" class="form-label" style="font-weight: bold;">Last name</label>
                        <input type="text" class="form-control" placeholder="last name" name="last_name">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="contactNumber" class="form-label" style="font-weight: bold;">Contact number</label>
                        <input type="text" class="form-control" placeholder="Contact number" name="contact_number">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="customerEmail" class="form-label" style="font-weight: bold;">ID card type</label>
                        <select class="form-select" aria-label="Default select example" name="id_type">
                          <option selected>Select ID type</option>
                          <option value="id">ID number</option>
                          <option value="passport">Passport number</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="selected ID" class="form-label" style="font-weight: bold;">Selected ID type</label>
                        <input type="text" class="form-control" placeholder="Selected ID" name="id_number">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="customerEmail" class="form-label" style="font-weight: bold;">Residential address</label>
                        <input type="text" class="form-control" placeholder="Residential address" name="residential_address">
                      </div>
                      <div class="col">
                        <label for="selected ID" class="form-label" style="font-weight: bold;">Salary</label>
                        <input type="text" class="form-control" placeholder="Salary" name="salary">
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