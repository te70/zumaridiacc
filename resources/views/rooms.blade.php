@extends('layouts.app')
@include('alert')
@section('content')  
<main>
    <div class="m-3">
        <div class="container" style="margin-left: 250px; margin-bottom: 20px;">
            <div class="row" style="margin-top: 30px;">  
              {{-- <form method="POST" action="">         --}}
              <div class="">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h5 class="card-title pb-2">Room information</h5>
                    <div class="row">
                      <div class="col">
                        <label for="roomType" class="form-label" style="font-weight: bold;">Room type</label>
                        <select class="form-select" aria-label="Default select example" name="room_type" id="room_type">
                          <option selected>Select room type</option>
                          @foreach($products as $product)
                            <option value="{{$product->room_type}}">{{$product->room_type}}</option>
                          @endforeach
                          <option value="test">Test</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="roomNumber" class="form-label" style="font-weight: bold;">Room number</label>
                        <select class="form-select" aria-label="Default select example" name="room_number" id="room_number">
                          <option selected>Select room number</option>
                          @foreach($products as $product)
                            <option value="{{$product->room_number}}">{{$product->room_number}}</option>
                          @endforeach
                          
                        </select>
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="checkIn" class="form-label" style="font-weight: bold;">Check in date</label>
                        <input type="date" class="form-control" placeholder="Check in date" id="check_in_date">
                      </div>
                      <div class="col">
                        <label for="checkOut" class="form-label" style="font-weight: bold;">Check out date</label>
                        <input type="date" class="form-control" placeholder="Check out date" id="check_out_date">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <h6>Total days:<span id="days"></span></h6>
                      </div>
                      <div class="col">
                        <h6>Price:<span id="price"></span></h6>
                      </div>
                      <div class="col">
                        <h6>Amount:<span id="total_price"></span></h6>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pt-4">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h5 class="card-title pb-2">Customer information</h5>
                    <div class="row">
                      <div class="col">
                        <label for="firstName" class="form-label" style="font-weight: bold;">First name</label>
                        <input type="text" class="form-control" placeholder="first name" id="first_name">
                      </div>
                      <div class="col">
                        <label for="lastName" class="form-label" style="font-weight: bold;">Last name</label>
                        <input type="text" class="form-control" placeholder="last name" id="last_name">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="contactNumber" class="form-label" style="font-weight: bold;">Contact number</label>
                        <input type="text" class="form-control" placeholder="Contact number" id="contact_number">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="customerEmail" class="form-label" style="font-weight: bold;">ID card type</label>
                        <select class="form-select" aria-label="Default select example" id="contact_type">
                          <option selected>Select contact type</option>
                          <option value="ID">ID</option>
                          <option value="Passport">Passport</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="selected ID" class="form-label" style="font-weight: bold;">Selected ID type</label>
                        <input type="text" class="form-control" placeholder="Selected ID" id="ID_number">
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="submitData()">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- </form> --}}
            </div>
          </div>
    </div>
    <div class="modal fade" id="reservationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
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
</main>
    <script>
      var checkOutDate = document.getElementById("check_out_date");

      checkOutDate.addEventListener("change", ()=>{
        var roomType = document.getElementById("room_type").value;
        var roomNumber = document.getElementById("room_number").value;
        var checkInDate = new Date(document.getElementById("check_in_date").value);
        var checkOutDate = new Date(document.getElementById("check_out_date").value);
        var days = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24);
        // var pricePerDay = 100; // Replace with the actual price per day
        var pricePerDay;
          if (roomType === 'economy') {
            pricePerDay = 500;
          } else if (roomType === 'double_bed') {
            pricePerDay = 800;
          } else if (roomType === 'executive') {
            pricePerDay = 1000;
          } else {
            // handle unknown room type
            pricePerDay = 0;
          }
        var totalPrice = days * pricePerDay;
        document.getElementById("days").innerHTML = days;
        document.getElementById("price").innerHTML = pricePerDay;
        document.getElementById("total_price").innerHTML = totalPrice.toFixed(2);
      })

      function submitData(){
        var firstName = document.getElementById('first_name').value;
        var lastName = document.getElementById('last_name').value;
        var contact_number = document.getElementById('contact_number').value;
        var contact_type = document.getElementById('contact_type').value;
        var id_number = document.getElementById('ID_number').value;
        var roomType = document.getElementById('room_type').value;
        var roomNumber = document.getElementById('room_number').value;
        var checkInDate = new Date(document.getElementById("check_in_date").value);
        var checkOutDate = new Date(document.getElementById("check_out_date").value);
        var days = (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24);
        var pricePerDay;
          if (roomType === 'economy') {
            pricePerDay = 500;
          } else if (roomType === 'double_bed') {
            pricePerDay = 800;
          } else if (roomType === 'executive') {
            pricePerDay = 1000;
          } else {
            // handle unknown room type
            pricePerDay = 0;
          }
        var totalPrice = days * pricePerDay;

        var formData = {
          'room_type':roomType,
          'room_number': roomNumber,
          'check_in_date' : checkInDate,
          'check_out_date' : checkOutDate,
          'number_of_days': days,
          'price_per_day': pricePerDay,
          'total_price': totalPrice,
          'first_name' : firstName,
          'last_name' : lastName,
          'contact_number': contact_number,
          'contact_type': contact_type,
          'id_number': id_number,
        };

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
          }
        });

        $.ajax({
          type: 'POST',
          url: '/api/add/reservation',
          data: formData,
          dataType: 'json',
          success: function(data){
            alert('success');
          },
          error: function(data){
            alert('errror');
          }
        });
      }
    </script>
@endsection
  