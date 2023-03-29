@extends('layouts.app')
@section('content')
<div class="m-3">
  <div class="container" style="margin-left: 220px; margin-bottom:30px; margin-right: 150px;">
    <div class="row" style="margin-top: 30px;">          
      <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{count($rentals)}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Houses</p>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{count($staffs)}}</h4>
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
                  <a type="submit" class="btn btn-sm btn-outline-primary" href="{{route('tenantsview')}}">Tenants</a>
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add tenants</a>
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#billsModal">Add bills</a>
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#houseModal">Add house</a>
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#rentModal">Rent house</a>
              </div>
              <h5 class="card-title">Manage rentals</h5>
          <div class="table-responsive pt-4">
          <table class="table table-sm" id="table">
              <thead>
              <tr>
                  <th>#</th>
                  <th>House number</th>
                  <th>Status</th>
                  <th>Elec total</th>
                  <th>Water total</th>
                  <th>Total bills</th>
                  <th>Total rent</th>
                  <th>Arrears</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody> 
              @foreach($rentals as $key=>$rental)
              {{-- @if($fingerprint->mac) --}}
                  <tr>
                  <td>{{$key+1}}</td>
                  <td style="text-transform: uppercase;">{{$rental->house_number}}</td>
                  <td style="text-transform: uppercase;">{{$rental->house_number}}</td>
                  <td style="text-transform: uppercase;">{{$rental->elec_total}}</td>
                  <td style="text-transform: uppercase;">{{$rental->water_total}}</td>
                  <td>{{$rental->total_bills}}</td>
                  <td style="text-transform: uppercase;">{{$rental->total_due}}</td>
                  <td>{{$rental->tenant_id}}</td>
                  
                  <td><div class="dropup">
                      <a href="#" role="button" data-bs-toggle="dropdown" >
                        <i style="color: black;" class="bi bi-three-dots-vertical"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <form action="" method="POST">

                          <a class="dropdown-item" data-bs-toggle="modal" href="{{ route('tenantshow') }}">View</a>
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
            {{-- Add tenants modal --}}
            <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addModalLabel">Add tenant</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{route('tenant')}}">
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
                              <label for="contactNumber" class="form-label" style="font-weight: bold;">ID number</label>
                              <input type="text" class="form-control" placeholder="ID number" name="id_number">
                            </div>
                          </div>
                          <div class="row pt-4">
                            <div class="col">
                              <label for="customerEmail" class="form-label" style="font-weight: bold;">ID front</label>
                              <input type="file" class="form-control" placeholder="ID front" name="id_front">
                            </div>
                            <div class="col">
                              <label for="selected ID" class="form-label" style="font-weight: bold;">ID back</label>
                              <input type="file" class="form-control" placeholder="ID back" name="id_back">
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
            {{-- bills modal --}}
            <div class="modal fade" id="billsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add Bills</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('bills')}}">
                        <div class="row">
                          <div class="col">
                            <label for="firstName" class="form-label" style="font-weight: bold;">House number</label>
                            <select class="form-select" aria-label="Default select example"  name="house_id">
                              <option selected>Select house number</option>
                              @foreach($rentals as $rental)
                              <option value="{{ $rental->id }}">{{$rental->house_number}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row pt-4">
                          <div class="col">
                            <label for="contactNumber" class="form-label" style="font-weight: bold;">Elec</label>
                            <input type="text" class="form-control" placeholder="Electricity" name="elec">
                          </div>
                          <div class="col">
                            <label for="contactNumber" class="form-label" style="font-weight: bold;">Water</label>
                            <input type="text" class="form-control" placeholder="Water" name="water">
                          </div>
                        </div>
                        <div class="row pt-4">
                          <div class="col">
                            <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div> 
            </div>
          </div>
            {{-- Add house modal --}}
            <div class="modal fade" id="houseModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Add houses</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('houses')}}">
                        <div class="row">
                          <div class="col">
                            <label for="houseNumber" class="form-label" style="font-weight: bold;">House number</label>
                            <input type="text" class="form-control" placeholder="House Number" name="house_number">
                          </div>
                        </div>
                        <div class="row pt-4">
                          <div class="col">
                            <label for="rent" class="form-label" style="font-weight: bold;">House rent</label>
                            <input type="text" class="form-control" placeholder="House Rent" name="rent">
                          </div>
                        </div>
                        <div class="row pt-4">
                          <div class="col">
                            <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
                          </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div> 
            </div>
            {{-- Rent house --}}
            <div class="modal fade" id="rentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Rent house</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('rent')}}">
                        <div class="row">
                          <div class="col">
                            <label for="houseNumber" class="form-label" style="font-weight: bold;">House number</label>
                            <select class="form-select" aria-label="Default select example"  name="house_id">
                              <option selected>Select house number</option>
                              @foreach($rentals as $rental)
                              <option value="{{ $rental->id }}">{{$rental->house_number}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row pt-4">
                          <div class="col">
                            <label for="rent" class="form-label" style="font-weight: bold;">Tenant</label>
                            <select class="form-select" aria-label="Default select example"  name="tenant_id">
                              <option selected>Select tenant</option>
                              @foreach($tenants as $tenant)
                              <option value="{{ $tenant->id }}">{{$tenant->first_name.' ', $tenant->last_name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="row pt-4">
                          <div class="col">
                            <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
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
<script>
     $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
@endsection