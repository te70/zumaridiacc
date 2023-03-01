<?php

namespace App\Http\Controllers;

use App\Models\Wines;
use App\Models\Bar;
use App\Models\Inbet;
use App\Models\PlayStation;
use App\Models\Room;
use App\Models\Expense;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class SalesController extends Controller
{
    public function showWines(){
       $products = Wines::all();
       $expenses = Expense::where('created_at','=',Carbon::today()->toDateString())->get();
       dd($expenses);
       return view('wines', compact('products'));
    }

    public function showExpenses(){
        return view('winesexpenses');
    }

    public function winesExpenses(Request $request) {
        $data = $request->all();
        $item = $data['item'];
        $amount = $data['amount'];
        $department = $data['department'];

        $jsonItem = json_encode($item);
        $jsonAmount = json_encode($amount);
        $jsonDepartment = json_encode($department);

        $winesExpenses = new Expense();
        $winesExpenses->item = $jsonItem;
        $winesExpenses->department = $jsonDepartment;
        $winesExpenses->amount = $jsonAmount;
        $winesExpenses->save();

        return redirect('/sales/wines');
    }

    public function wines(Request $request){
        $wines = Wines::find($request->id);
        $wines->product_name = $request->product_name;
        $wines->open = $request->open;
        $wines->add = $request->add;
        $wines->total = $request->total;
        $wines->close = $request->close;
        $wines->difference = $request->difference;
        $wines->price = $request->price;
        $wines->total_amount = $request->total_amount;
        $wines->expenses = $request->expenses;
        $wines->gross_cash = $request->gross_cash;
        $wines->mpesa = $request->mpesa;
        $wines->net_cash = $request->net_cash;
        $wines->update();
    
        return response()->json([
            "code" => 200,
            "data" => $wines
        ]);
    }

    public function showBar(){
        return view('ba
        rs');
    }

    public function bar(Request $request){
        $request->validate([
            'product_name' => 'required',
            'open' => 'required',
            'add' => 'required',
            'total' => 'required',
            'close' => 'required',
            'close' => 'required',
            'difference' => 'required',
            'price' => 'required',
            'total_amount' => 'required',
            'expenses' => 'required',
            'gross_cash' => 'required',
            'mpesa' => 'required',
            'net_cash' => 'required'
        ]);

        $bar = Bar::create([
            "product_name" => $request->product_name,
            "open" => $request->open,
            "add" => $request->add,
            "total" => $request->total,
            "close" => $request->close,
            "difference" => $request->difference, 
            "price" => $request->price,
            "total_amount" => $request->total_amount,
            "expenses" => $request->expenses,
            "gross_cash" => $request->gross_cash,
            "mpesa" => $request->mpesa,
            "net_cash" => $request->net_cash
        ]);

        return response()->json([
            "code" => 200,
            "data" => $bar
        ]);
    }

    public function rooms(Request $request){
        $request->validate([
            'room_number' => 'required',
            'receipt_number' => 'required',
            'total_amount' => 'required',
            'gross_cash' => 'required',
            'mpesa' => 'required',
            'net_cash' => 'required',
            'room_price' => 'required',
        ]);

        $room = Room::create([
            "room_number" => $request->room_number,
            "receipt_number" => $request->receipt_number,
            "total_amount" => $request->total_amount,
            "room_price" => $request->room_price,
            "gross_cash" => $request->gross_cash,
            "mpesa" => $request->mpesa,
            "net_cash" => $request->net_cash, 
        ]);

        return response()->json([
            "code" => 200,
            "data" => $room
        ]);
    }

    public function playStation(Request $request){
        $request->validate([
            'games_played' => 'required',
            'soda_sold' => 'required',
            'sweets_sold' => 'required',
            'cash' => 'required',
            'expenses' => 'required',
            'net_cash' => 'required',
        ]);

        $playStation = PlayStation::create([
            "games_played" => $request->games_played,
            "soda_sold" => $request->soda_sold,
            "sweets_sold" => $request->sweets_sold,
            "cash" => $request->cash,
            "expenses" => $request->expenses,
            "net_cash" => $request->net_cash,
        ]);

        return response()->json([
            "code" => 200,
            "data" => $playStation
        ]);
    }

    public function inbet(Request $request){
        $request->validate([
            'cash' => 'required',
            'mpesa' => 'required',
        ]);

        $inbet = Inbet::create([
            "cash" => $request->cash,
            "mpesa" => $request->mpesa,
            
        ]);

        return response()->json([
            "code" => 200,
            "data" => $inbet
        ]);
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
