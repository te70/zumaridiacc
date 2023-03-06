<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bar product form') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="card" style="margin-left: 250px; margin-right: 100px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card-body">
          <div class="table-responsive" style="padding-top: 20px; margin-left: 10px;">
              <h6 style="padding-bottom: 20px; color: #656b71;">Bar Product form</h6>
              @if ($errors->any())
                <div class="alert alert-danger">
                <strong>Oops</strong> There were some problems with your input. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if(Session::has('success'))
                <div class="alert alert-success text-center">
                    {{Session::get('success')}}
                </div>
            @endif
            <form action="{{route('bar.product')}}" method="POST" enctype="multipart/form-data" style="margin-left: 80px; margin-right: 80px;" novalidate>
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                        <div class="form-group">
                            <strong>Product Name</strong>
                            <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror w-50" id="product_name" placeholder="Product name">
                            @error('product_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2 mt-3">
                        <div class="form-group">
                            <strong>Price</strong>
                            <input class="form-control @error('price') is-invalid @enderror w-50" name="price" id="price" placeholder="Price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        </div>
            
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2 mt-3">
                        <button type="submit" class="btn btn-primary btn-sm" style="color:black;s">Submit</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#wines-table').DataTable();
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
