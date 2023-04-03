@extends('layouts.app')
@section('content')
<div class="m-3">
  <div class="container" style="margin-left: 220px; margin-bottom:30px; margin-right: 150px;">
    <div class="row" style="margin-top: 30px;">          
      <div class="col-xs-12 col-sm-8 col-md-6">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{count($users)}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Users</p>
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
                  <a type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add users</a>
              </div>
              <h5 class="card-title">Manage users</h5>
          <div class="table-responsive pt-4">
          <table class="table table-sm" id="table">
              <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Last login</th>
                  <th>Created</th>
                  <th>Action</th>
              </tr>
              </thead>
              <tbody> 
              @foreach($users as $key=>$user)
              {{-- @if($fingerprint->mac) --}}
                  <tr>
                  <td>{{$key+1}}</td>
                  <td style="text-transform: uppercase;">{{$user->name}}</td>
                  <td style="text-transform: uppercase;">{{$user->email}}</td>
                  <td style="text-transform: uppercase;">{{date('d-m-Y', strtotime($user->last_login_at))}}</td>
                  <td>{{date('d-m-Y', strtotime($user->created_at))}}</td>
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
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{route('usercreate')}}">
                    <div class="row">
                      <div class="col">
                        <label for="name" class="form-label" style="font-weight: bold;">First name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="email" class="form-label" style="font-weight: bold;">Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="password" class="form-label" style="font-weight: bold;">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password">
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