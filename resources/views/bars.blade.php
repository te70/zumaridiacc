<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="" style="margin-left: 100px; margin-bottom:30px;">
            <div class="row" style="margin-top: 30px;">          
              <div class="col-sm-3">
                <div class="card" style="border: none; border-radius: 8px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                  <div class="card-body">
                    <h4 class="card-text" style="text-align: center;">2</h4>
                    <p class="card-title" style="font-size: 20px; text-align: center;">Items</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <div class="card" style="margin-left: 100px; margin-right: 100px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card-body">
          <div class="table-responsive" style="padding-top: 20px; margin-left: 10px;">
            <div class="btn-group mr-2" style="float: right;">
                <a type="submit" class="btn btn-sm btn-outline-primary" href="">Add new product</a>
                <a type="submit" class="btn btn-sm btn-outline-primary" href="">Export</a>
              </div>
              <h6 style="padding-bottom: 20px; color: #656b71;">Bar sales</h6>
            <table class="table" id="bars-table">
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
                  {{-- @foreach ($stocks as $stock) --}}
                    <tr>
                      <td>Chrome vodka 250ml</td>  
                      <td>2</td>
                      <td><input type="number" name="add_stock" value="2" data-id="2"></td>
                      <td>2</td>
                      <td><input type="number" name="closing_stock" value="2" data-id="2"></td>
                      <td>2</td>
                      <td>200</td>
                      <td class="total-amount">2000</td>
                    </tr>
                  {{-- @endforeach --}}
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#bars-table').DataTable();
    });

    $(document).on('change', 'input[name="add_stock"], input[name="closing_stock"]', function() {
  var id = $(this).data('id');
  var addStock = $('input[name="add_stock"][data-id="' + id + '"]').val();
  var closingStock = $('input[name="closing_stock"][data-id="' + id + '"]').val();
  var price = $('td[data-id="' + id + '"].price').text();
  var totalAmount = closingStock * price;
  $('td[data-id="' + id + '"].total-amount').text(totalAmount);

  $.ajax({
    url: '/update-stock',
    type: 'POST',
    data: {
      id: id,
      add_stock: addStock,
      closing_stock: closingStock,
      _token: '{{ csrf_token() }}'
    },
    success: function(response) {
      // handle success response
    },
    error: function(xhr, textStatus, errorThrown) {
      // handle error response
    }
  });
});

    </script>
</x-app-layout>
