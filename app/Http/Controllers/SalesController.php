<?php

namespace App\Http\Controllers;

use App\Models\Wines;
use App\Models\Bar;
use App\Models\Inbet;
use App\Models\PlayStation;
use App\Models\Room;
use App\Models\Expense;
use App\Models\Revenue;
use App\Models\BarRevenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SalesController extends Controller
{
    public function showWines(){
       $products = Wines::all();
       $expenses = Expense::whereDate('created_at','=',Carbon::today()->toDateString())->sum('total_amount');
       return view('wines', compact('products', 'expenses'));
    }

    public function showExpenses(){
        $expenses = Expense::all();
        $expensesToday = Expense::whereDate('created_at','=',Carbon::today())->get();
        return view('winesexpenses', compact('expenses','expensesToday'));
    }

    public function wExpensesForm(){
        $products = Wines::all();
        return view('wexpensesform', compact('products'));
    }

    public function wExpenses(){
        // $expenses = Expense::whereDate('created_at','=',Carbon::today()->toDateString())->get();
        $products = Wines::select('price')->where('product_name', '=', 'chrome 250ml')->get();
        return response()->json([
            "code" => 200,
            "data"=> $products
        ]);
    }

    public function winesExpenses(Request $request) {
        $pieces = $request->amount;
        $product_name = $request->product_name;
        
        $prices = Wines::where('product_name', '=', $product_name)->sum('price');
        $total_amount = $prices * $pieces;
        
        $winesExpenses = new Expense();
        $winesExpenses->item = $request->product_name;
        $winesExpenses->department = $request->department;
        $winesExpenses->amount = $request->amount;
        $winesExpenses->total_amount = $total_amount;
        $winesExpenses->save();

        return redirect('/sales/wines/expenses/form');
    }

    public function wines(Request $request){
        $wines = Wines::find($request->id);
        $wines->open = $request->close;
        $wines->add = $request->add;
        $wines->total = $request->total;
        $wines->close = $request->close;
        $wines->difference = $request->difference;
        $wines->total_amount = $request->total_amount;
        $wines->update();
   
        // if(is_nan($request->gross_cash)){
        //     return("No data");
        // } else {
            $revenue = new Revenue();
            $revenue->expenses = $request->expenses;
            $revenue->gross_cash = $request->gross_cash;
            $revenue->mpesa = $request->expenses;
            $revenue->net_cash = $request->net_cash;
            $revenue->save();
        // }

        return response()->json([
            "code" => 200,
            "wines" => $wines,
            "revenue" => $revenue
        ]);
    }

    public function showBar(){
        $products = Bar::all();
        $expenses = Expense::whereDate('created_at','=',Carbon::today()->toDateString())->sum('total_amount');
        return view('bars', compact('products', 'expenses'));
    }

    public function barProductForm(){
        return view('barform');
    }

    public function bExpensesForm(){
        $products = Bar::all();
        return view('bexpenses', compact('products'));
    }

    public function showBExpenses(){
        $expenses = Expense::all();
        $expensesToday = Expense::whereDate('created_at','=',Carbon::today())->get();
        return view('barexpenses', compact('expenses','expensesToday'));
    }

    public function barExpenses(Request $request) {
        $pieces = $request->amount;
        $product_name = $request->product_name;
        
        $prices = Bar::where('product_name', '=', $product_name)->sum('price');
        $total_amount = $prices * $pieces;
        
        $winesExpenses = new Expense();
        $winesExpenses->item = $request->product_name;
        $winesExpenses->department = $request->department;
        $winesExpenses->amount = $request->amount;
        $winesExpenses->total_amount = $total_amount;
        $winesExpenses->save();

        return redirect('/sales/bar/expenses/form');
    }

    public function bar(Request $request){
        $wines = Bar::find($request->id);
        $wines->open = $request->close;
        $wines->add = $request->add;
        $wines->total = $request->total;
        $wines->close = $request->close;
        $wines->difference = $request->difference;
        $wines->total_amount = $request->total_amount;
        $wines->update();
   
        // if(is_nan($request->gross_cash)){
        //     return("No data");
        // } else {
            $revenue = new BarRevenue();
            $revenue->expenses = $request->expenses;
            $revenue->gross_cash = $request->gross_cash;
            $revenue->mpesa = $request->expenses;
            $revenue->net_cash = $request->net_cash;
            $revenue->save();
        // }
        return response()->json([
            "code" => 200,
            "wines" => $wines,
            "revenue" => $revenue
        ]);
    }

    public function showRooms(){
        $products = Room::all();
        return view('rooms', compact('products'));
    }

    public function rooms(Request $request){
        $wines = Bar::find($request->id);
        $wines->open = $request->close;
        $wines->add = $request->add;
        $wines->total = $request->total;
        $wines->close = $request->close;
        $wines->difference = $request->difference;
        $wines->total_amount = $request->total_amount;
        $wines->update();

        return redirect('/sales/bar/expenses/form');
    }

    public function showPlaystation(){
        return view('playstation');
    }

    public function showPs(){
        $products = PlayStation::all();
        $expenses = Playstation::sum('net_cash');
        $expensesToday = PlayStation::whereDate('created_at','=',Carbon::today())->sum('net_cash');
        return view('ps', compact('products', 'expenses', 'expensesToday'));
    }

    public function playStation(Request $request){
        $netCash = $request->total_sales - $request->expenses;

        $ps = new PlayStation();
        $ps->cash = $request->total_sales;
        $ps->expenses= $request->expenses;
        $ps->net_cash = $netCash;
        $ps->save();

        return redirect('/sales/ps');
    }
    
    public function showInbet(){
        return view('inbet');
    }

    public function showIb(){
        $products = PlayStation::all();
        $expenses = Playstation::sum('net_cash');
        $expensesToday = PlayStation::whereDate('created_at','=',Carbon::today())->sum('net_cash');
        return view('ps', compact('products', 'expenses', 'expensesToday'));
    }

    public function inbet(Request $request){
        $netCash = $request->cashier_1 + $request->cashier2;

        $ib = new Inbet();
        $ib->cashier_1 = $request->cashier_1;
        $ib->cashier_2= $request->cashier_2;
        $ib->net_cash = $netCash;
        $ib->save();

        return redirect('/sales/ib');
    }

    public function productForm(){
        return view('productform');
    }

    public function addProduct(Request $request){
        $request->validate([
            'product_name' => 'required',
            'price' => 'required'
        ]);

        $product = Wines::create([
            "product_name" => $request->product_name,
            "price" => $request->price,
        ]);
        echo $product;
        return redirect('/sales/wines');
    }

    public function productList(){
        $products = Wines::all();

        return response()->json([
            "code" => 200,
            "data" => $products
        ]);
    }
    
}
