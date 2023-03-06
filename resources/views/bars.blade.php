<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Bar') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="" style="margin-left: 100px; margin-bottom:30px; margin-right: 150px;">
          <div class="row" style="margin-top: 30px;">          
            <div class="col-sm-3">
              <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
                  <h4 class="card-text" style="text-align: center;">{{$products->count()}}</h4>
                  <p class="card-title" style="font-size: 20px; text-align: center;">Products</p>
                </div>
              </div>
            </div>
          </div>
        </div>

  <div class="card" style="margin-left: 100px; margin-right: 100px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
      <div class="card-body">
        <div class="table-responsive" style="padding-top: 20px; margin-left: 10px;">
          <div class="btn-group mr-2" style="float: right;">
              <a type="submit" class="btn btn-sm btn-outline-primary" href="{{route('productform')}}">Add new product</a>
              <a type="submit" class="btn btn-sm btn-outline-primary" href="{{route('winesexpenses')}}">Expenses</a>
              <a type="submit" class="btn btn-sm btn-outline-primary" href="">Export</a>
            </div>
            <h6 style="padding-bottom: 20px; color: #656b71;">Wines sale</h6>
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
                    <td>{{$product->product_name}}</td>  
                    <td><input type="text" class="form-control w-50" name="open_stock" value={{$product->open}} data-id={{$product->id}} disabled></td>
                    <td><input type="number" name="add-stock" class="add-stock w-50" id="add-stock" data-price={{$product->price}} data-id={{$product->id}} value={{ $product->add_stock }}></td>
                    <td id="total_stock"></td>
                    <td><input type="number" class="close-stock w-50" name="close-stock" id="close-stock" data-price={{$product->price}} value={{$product->close}} data-id={{$product->id}}></td>
                    <td id="difference"></td>
                    <td><input type="number" class="price w-50" name="price" id="price" data-price={{$product->price}} value={{$product->price}} data-id={{$product->id}} disabled></td>
                    <td class="total_amount"></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
      </div>
    </div>
  </div>

  <div class="" style="margin-left: 100px; margin-bottom:30px; margin-right: 150px;">
    <div class="row" style="margin-top: 30px;">          
      <div class="col-sm-3">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{$products->count()}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Total amount</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{$products->count()}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Expenses</p>
          </div>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
          <div class="card-body">
            <h4 class="card-text" style="text-align: center;">{{$products->count()}}</h4>
            <p class="card-title" style="font-size: 20px; text-align: center;">Net cash</p>
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
</x-app-layout>
