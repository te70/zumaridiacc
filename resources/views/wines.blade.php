@extends('layouts.app')
@section('content')
    <div class="m-3">
        <div class="container pb-4" style="margin-left: 200px;">
            <div class="row" style="margin-top: 30px;">          
              <div class="col-xs-8 col-sm-3 col-md-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">{{$products->count()}}</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Products</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
    <div class="container" style="margin-left: 200px; margin-right: 200px;">
      <div class="row">
          <div class="card" style="border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
              <div class="card-body">
                <div class="table-responsive" style="padding-top: 20px; margin-left: 10px;">
                  <div class="btn-group mr-2" style="float: right;">
                      <a type="submit" class="btn btn-sm btn-outline-primary" href="{{route('productform')}}">Add new product</a>
                      <a type="submit" class="btn btn-sm btn-outline-primary" href="{{route('winesexpenses')}}">Expenses</a>
                      <a type="submit" class="btn btn-sm btn-outline-primary" href="">Export</a>
                    </div>
                    <h6 style="padding-bottom: 20px; color: #656b71;">Wines sale</h6>
                    {{-- <form action="{{route('sales.wines')}}" method="POST"> --}}
                  <table class="table" id="wines-table">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Product name</th>
                          <th>Opening Stock</th>
                          <th>Add Stock</th>
                          <th>Total Stock</th>
                          <th>Closing Stock</th>
                          <th>Difference</th>
                          <th>Price</th>
                          <th>Total Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $key=>$product)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td style="text-transform: uppercase;">{{$product->product_name}}</td>  
                            <td><input type="text" class="form-control" name="open_stock" value={{$product->open}} data-id={{$product->id}} disabled></td>
                            <td><input type="number" name="add-stock" class="add-stock w-50" id="add-stock" data-price={{$product->price}} data-id={{$product->id}} value={{ $product->add_stock }}></td>
                            <td id="total_stock"></td>
                            <td><input type="number" class="close-stock" name="close-stock" id="close-stock" data-price={{$product->price}} data-id={{$product->id}} value={{$product->close}}></td>
                            <td id="difference"></td>
                            <td><input type="number" class="price w-50" name="price" id="price" data-price={{$product->price}} value={{$product->price}} data-id={{$product->id}} disabled></td>
                            <td class="row-total-amount"></td>
                          </tr>
                        @endforeach
                      </tbody>
                        <tr>
                          <td>Total amount: <span id="total-amount" ></span></td>
                        </tr>
                        <tr>
                          <td>Expenses: <span>{{$expenses}}</span></td>
                        </tr>
                        <tr>
                          <td>Net cash: <span id="net-cash"></span></td>
                        </tr>
                    </table>
              </div>
            </div>
          </div>
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
    var totalAmount = 0;
    var expenses = {{$expenses}};

    closeStockInputs.forEach(function(input, index) {
        input.addEventListener('input', function() {
            var productId = this.dataset.id;
            console.log(productId);
            var openStock = parseInt(parseInt(document.getElementsByName("open_stock")[0].value));
            var addStock = parseInt(addStockInputs[index].value);
            var closeStock = parseInt(input.value);
            var totalStock = openStock + addStock;
            var difference = totalStock - closeStock;
            this.parentNode.nextSibling.nextSibling.textContent = difference; 
            var price = parseFloat(this.getAttribute('data-price'));
            var rowTotalAmount = difference * price;
            this.parentNode.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling.textContent = rowTotalAmount;

            totalAmount = 0;
            var totalAmountElements = document.querySelectorAll('.row-total-amount');
            totalAmountElements.forEach(function(element){
              totalAmount += parseFloat(element.textContent);
            });
            document.querySelector('#total-amount').textContent = totalAmount;

            var netCash = totalAmount - expenses;
            document.querySelector('#net-cash').textContent = netCash;

              var formData = {
                  'id': productId,
                  'open': openStock,
                  'add': addStock,
                  'total': totalStock,
                  'close': closeStock,
                  'difference': difference,
                  'total_amount': rowTotalAmount,
                  'gross_cash':totalAmount,
                  'expenses': expenses,
                  'net_cash': netCash
              };

              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

              $.ajax({
                type: 'POST',
                url: '/api/sales/wines',
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
              });
        });
    });
       
    </script>
@endsection

