@extends('layouts.app')
@section('content')
<div class="container m-3">
    <div class="row" style="margin-left:250px">
        <div class="card">
            <form method="POST" action="{{route('ib.edit',['id'=>$editIb->id])}}">
                <div class="row pt-4">
                <div class="col">
                    <label for="name" class="form-label" style="font-weight: bold;">Cashier 1</label>
                    <input type="text" class="form-control" placeholder="1000" value="{{$editIb->cashier_1}}" name="cashier_1">
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Cashier 2</label>
                    <input type="text" class="form-control" placeholder="200" value="{{$editIb->cashier_2}}" name="cashier_2">
                </div>
                </div>
                <div class="row pt-4 pb-4">
                <div class="col">
                    <button class="btn btn-outline-primary btn-sm" role="submit">Submit</button>
                </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection