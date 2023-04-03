@extends('layouts.app')
@section('content')
    <div class="m-3">
        <div class="container">
            <div class="row pt-2" style="margin-left: 250px;">          
              <div class="col-xs-8 col-sm-3 col-md-3 pb-2">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="">{{count($rooms)}}</h4>
                    <p class="card-title" style="font-size: 20px;">Total rooms</p>
                    <span class="bi bi-houses" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>
              
              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text">{{count($reservations)}}</h4>
                    <p class="card-title" style="font-size: 20px;">Reservations</p>
                    <span class="bi bi-bookmark" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>
              
              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">{{count($staff)}}</h4>
                    <p class="card-title" style="font-size: 20px;">Staffs</p>
                    <span class="bi bi-people" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">{{count($complaints)}}</h4>
                    <p class="card-title" style="font-size: 20px;">Complaints</p>
                    <span class="bi bi-chat" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3 pb-2">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">{{count($bookedRooms)}}</h4>
                    <p class="card-title" style="font-size: 20px;">Booked rooms</p>
                    <span class="bi bi-bookmark-check" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">{{$ibRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px;">Available rooms</p>
                    <span class="bi bi-house-add" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">{{count($wines)}}</h4>
                    <p class="card-title" style="font-size: 20px;">Items in stock</p>
                    <span class="bi bi-archive" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">Ksh.{{$roomRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px;">Rooms</p>
                    <span class="bi bi-cash" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">Ksh.{{$winesRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px;">Wines</p>
                    <span class="bi bi-cash" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">Ksh.{{$barRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px;">Bar</p>
                    <span class="bi bi-cash" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">Ksh.{{$ibRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px;">Inbet</p>
                    <span class="bi bi-cash" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>

              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);"> 
                  <div class="card-body">
                    <h4 class="card-text">Ksh.{{$psRevenue}}</h4>
                    <p class="card-title" style="font-size: 20px;">Playstation</p>
                    <span class="bi bi-cash" style="position: absolute; top: 50%; right: 15px; transform: translateY(-50%); font-size: 32px;"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="container" >
            <div class="row pt-2" style="margin-left: 250px;">
              <div class="card" style="border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
              <div class="table-responsive">
                <h6 style="padding-bottom: 20px; font-size: 18px;">System logs</h6>
                <table class="table table-sm" id="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Last login</th>
                    </tr>
                  </thead>
                  <tbody> 
                    @foreach($users as $key=>$user)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->last_login_at}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
          </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       $(document).ready(function() {
        $('#table').DataTable();
    });
    </script>
@endsection
