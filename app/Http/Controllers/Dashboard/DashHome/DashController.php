<?php

namespace App\Http\Controllers\Dashboard\DashHome;

use App\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Ticket;
use App\Models\Product;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{

    public function index()
    {
        $date = \Carbon\Carbon::today()->subDays(7);
        //dd($date); // dawas 7kata kalin dawasa gannawa.
        $orderwithing7days = Order::where('created_at', '>=', $date)->with('order_items')->get();

        //dd($orderwithing7days);
        $supportTickets = Ticket::where('status', 'Pending')->get();
        $totalsupportTickets = 0;
        foreach ($supportTickets as $value) {
            //$total = +$value->id;
            $totalsupportTickets++;
        }
        //dd($supportTickets);

        $products = Product::where('status', 'Published')->get();
        $totalproducts = 0;
        foreach ($products as $value) {
            //$total = +$value->id;
            $totalproducts++;
        }
        //dd($products);
        $newUsers = User::where('created_at', '>=', $date)->get();
        $totalnewUsers = 0;
        foreach ($newUsers as $value) {
            //$total = +$value->id;
            $totalnewUsers++;
        }

        //dd($newUsers);
        $orderWaiting = Order::where('status', 'Order Pending')->get();
        //$newUsers = User::where('created_at', '<=', $date)->get();
        $totalorderWaiting = 0;
        foreach ($orderWaiting as $value) {
            //$total = +$value->id;
            $totalorderWaiting++;
        }
        //dd($orderWaiting);
        $lowStock = Product::where('quantity', '<=', 5)->get();
        $totalStock = 0;
        foreach ($lowStock as $value) {
            //$total = +$value->id;
            $totalStock++;
        }
        //dd($profir);
        $date = \Carbon\Carbon::today()->subDays(30);

        //$orders = Order_Item::where('created_at', '>=', $date)->pluck('product_id')->all();
        $ordersItems = Order_Item::where('created_at', '>=', $date)->get();
        //dd($ordersItems);
        //$products = Product::whereIn('id', $orders)->get();

        $totalprofit = 0;
        $totalprofititems = 0;
        foreach ($ordersItems as $item) {

            $productcc = Product::where('id', $item->product_id)->first();
            //dd($product);
            // echo $product->id;
            $totalprofititems += (($item->price - $productcc->purchase_price) * $item->quantity);
            //$totalprofit += ($item->price - $product->purchase_price);
            //$profit++;
        }

        // dd($totalprofititems);
        $completedOrders = Order::where('status', 'Ready for pickup')->get();
        $totalcompletedOrders = 0;
        foreach ($completedOrders as $value) {
            //$total = +$value->id;
            $totalcompletedOrders++;
        }

        $products = Product::get();
        foreach ($products as $key => $value) {
            $totalproducts++;
        }
        //dd($completedOrders);
        return view('Backend.dashboardHome.index', compact('orderwithing7days', 'totalsupportTickets', 'totalproducts', 'totalnewUsers', 'totalorderWaiting', 'totalStock', 'totalprofititems', 'totalcompletedOrders'));
    }
}
