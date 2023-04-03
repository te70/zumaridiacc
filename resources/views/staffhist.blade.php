@extends('layouts.app')
@section('content')
<div class="m-3">
  <div class="container pt-4" style="margin-left: 220px;">
      <div class="row">
          <div class="card" style="border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
              <div class="btn-group mr-2" style="float: right;">
                  {{-- <p>Employee name: <span>{{$staff->first_name}}</span></p> --}}
              </div>
              <h5 class="card-title">Staff details</h5>
          <div class="table-responsive pt-4">
          <table class="table table-sm" id="table">
              <thead>
              <tr>
                  <th>Staff type</th>
                  <th>Contact</th>
                  <th>ID type</th>
                  <th>ID number</th>
                  <th>Residential address</th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                  <td style="text-transform: uppercase;">{{$staff->staff_type}}</td>
                  <td style="text-transform: uppercase;">{{$staff->contact_number}}</td>
                  <td style="text-transform: uppercase;">{{$staff->id_type}}</td>
                  <td style="text-transform: uppercase;">{{$staff->id_number}}</td>
                  <td style="text-transform: uppercase;">{{$staff->residential_address}}</td>
              </tr>
              </tbody>
          </table>
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