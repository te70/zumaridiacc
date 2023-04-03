@extends('layouts.app')
@section('content')
<div class="container m-3">
    <div class="row" style="margin-left:250px">
        <div class="card">
            <form method="POST" action="{{route('ps.edit',['id'=>$ps->id])}}">
                <div class="row pt-4">
                <div class="col">
                    <label for="name" class="form-label" style="font-weight: bold;">Total amount</label>
                    <input type="text" class="form-control" placeholder="1000" value="{{$ps->cash}}" name="total_amount">
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Expenses</label>
                    <input type="text" class="form-control" placeholder="200" value="{{$ps->expenses}}" name="expenses">
                </div>
                </div>
                <div class="row pt-4">
                <div class="col">
                    <label for="email" class="form-label" style="font-weight: bold;">Net cash</label>
                    <input type="text" class="form-control" placeholder="1000" value="{{$ps->net_cash}}" name="net_cash">
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