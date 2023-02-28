<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Wines') }}
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
                <a type="submit" class="btn btn-sm btn-outline-primary" href="">Export</a>
              </div>
              <h6 style="padding-bottom: 20px; color: #656b71;">Wines sale</h6>
            <table class="table" id="wines-table">
                <thead>
                  <tr>
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
                  @foreach($products as $product)
                    <tr>
                      <td>{{$product->product_name}}</td>  
                      <td><input type="text" class="form-control" name="open_stock" value={{$product->open}}></td>
                      <td><input type="number" name="add_stock" class="add-stock" id="add_stock" value="{{ $product->add_stock }}" data-price="{{ $product->add_stock}}" data-row="{{ $loop->index }}"></td>
                      <td id="total_stock"></td>
                      <td><input type="number" name="closing_stock" value={{$product->close}} data-id={{$product->id}}></td>
                      <td><input type="number" name="difference" value={{$product->difference}} data-id={{$product->id}}></td>
                      <td>{{$product->price}}</td>
                      <td class="rr"></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#wines-table').DataTable();
    });

    var addStockInputs = document.querySelectorAll('.add-stock');
    addStockInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            var productId = this.dataset.id;
            var addStock = this.value;
            var openStock = parseInt(parseInt(document.getElementsByName("open_stock")[0].value));
            var totalStock = openStock + parseInt(addStock);
            var price = parseFloat(this.parentNode.nextSibling.textContent);
            var totalAmount = totalStock * price;
            this.parentNode.nextSibling.nextSibling.textContent = totalStock;
            this.parentNode.nextSibling.nextSibling.nextSibling.textContent = totalAmount.toFixed(2);
        });
    });

//   document.getElementById("add_stock").addEventListener("input", function() {
//     var open_stock = parseInt(document.getElementsByName("open_stock")[0].value);
//     var add_stock = parseInt(this.value);
//     var total_stock = open_stock + add_stock;
//     document.getElementById("total_stock").textContent = total_stock;
// });

    </script>
</x-app-layout>
