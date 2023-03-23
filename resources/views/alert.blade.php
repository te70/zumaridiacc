{{-- Message --}}
@vite(['resources/js/app.js'])
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Success!</strong> {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="bi bi-x"></i>
        </button>
        <strong>Error !</strong> {{ session('error') }}
    </div>
@endif


