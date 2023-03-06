<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Playstation') }}
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="card" style="margin-left: 250px; margin-right: 100px; border: none; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
        <div class="card-body">
          <div class="table-responsive" style="padding-top: 20px; margin-left: 10px;">
              <h6 style="padding-bottom: 20px; color: #656b71;">Playstation form</h6>
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
            <form action="{{route('sales.ps')}}" method="POST" enctype="multipart/form-data" style="margin-left: 80px; margin-right: 80px;" novalidate>
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
                        <div class="form-group">
                            <strong>Total sales</strong>
                            <input type="text" name="total_sales" class="form-control w-50" id="total_sales" placeholder="Total sales">
                        </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mb-2 mt-3">
                        <div class="form-group">
                            <strong>Expenses</strong>
                            <input class="form-control w-50" name="expenses" id="expenses" placeholder="Expenses">
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
    </script>
</x-app-layout>
