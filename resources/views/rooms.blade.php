@extends('layouts.app')
@section('content')  
    <div class="m-3">
        <div class="container" style="margin-left: 250px; margin-bottom: 20px;">
            <div class="row" style="margin-top: 30px;">  
              <form method="POST" action="">        
              <div class="">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h5 class="card-title pb-2">Room information</h5>
                    <div class="row">
                      <div class="col">
                        <label for="roomType" class="form-label" style="font-weight: bold;">Room type</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Select room type</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                      <div class="col">
                        <label for="roomNumber" class="form-label" style="font-weight: bold;">Room number</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Select room type</option>
                          <option value="1">One</option>
                          <option value="2">Two</option>
                          <option value="3">Three</option>
                        </select>
                      </div>
                    </div>
                    <div class="row pt-4">
                      <div class="col">
                        <label for="checkIn" class="form-label" style="font-weight: bold;">Check in date</label>
                        <input type="date" class="form-control" placeholder="Check in date">
                      </div>
                      <div class="col">
                        <label for="checkOut" class="form-label" style="font-weight: bold;">Check out date</label>
                        <input type="date" class="form-control" placeholder="Check out date">
                      </div>
                    </div>
                    <div class="row pt-2">
                      <div class="col">
                        <h6>Total days:<span>2</span></h6>
                        <h6>Price:<span>500</span></h6>
                        <h6>Amount:<span>1000</span></h6>
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
                        <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
      
    <script>
    $(document).ready(function() {
        $('#wines-table').DataTable();
    });
  
    var addStockInputs = document.querySelectorAll('.add-stock');
    addStockInputs.forEach(function(input, index) {
        input.addEventListener('input', function() {
            var productId = this.dataset.id;
            var addStock = parseInt(input.value);
            var openStock = parseInt(parseInt(document.getElementsByName("open_stock")[0].value));
            var totalStock = openStock + addStock;
            this.parentNode.nextSibling.nextSibling.textContent = totalStock;         
        });
    });
    
    var closeStockInputs = document.querySelectorAll('.close-stock');
    closeStockInputs.forEach(function(input, index) {
        input.addEventListener('input', function() {
            var productId = this.dataset.id;
            var openStock = parseInt(parseInt(document.getElementsByName("open_stock")[0].value));
            var addStock = parseInt(addStockInputs[index].value);
            var closeStock = parseInt(input.value);
            var totalStock = openStock + addStock;
            var difference = totalStock - closeStock;
            this.parentNode.nextSibling.nextSibling.textContent = difference; 
            var price = parseFloat(this.getAttribute('data-price'));
            var totalAmount = difference * price;
            this.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.textContent = totalAmount;
             $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });
              $.ajax({
                url: '/api/sales/wines',
                type: 'POST',
                data: {
                  product_id: productId,
                  open: openStock,
                  total: totalStock,
                  close: closeStock,
                  difference: difference,
                  price: price,
                  total_amount: totalAmount,
                  expenses: expenses,
                  gross_cash: grossCash,
                  mpesa: mpesa,
                  net_cash: netCash
                },
                success: function(data) {
                  if(data.length == 0){
                  console.log("No data returned");
                  } else {
                  console.log("data is returned");
                  }
                }
              });
        });
    });
    
    </script>
@endsection
  