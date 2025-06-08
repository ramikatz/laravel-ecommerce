<?php

namespace App\Http\Controllers\Dashboard\Reports;

use App\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Roleuser;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    /*  report generate Home */
    public function index()
    {
        return view('Backend.reportGeneration.index');
    }

    // order report ================================================================== //
    public function orderIndex()
    {
        $orders = Order::with('order_items')->get();
        return view('Backend.reportGeneration.orderReport.orderReport-index', compact('orders'));
    }
    public function orderFilter(Request $request)
    {
        $start_date = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');

        if ($request->input('filter')) {

            $rstart_date = \Carbon\Carbon::parse($start_date)->format('m/d/y');
            $rend_date = \Carbon\Carbon::parse($end_date)->format('m/d/y');

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();
            return view('Backend.reportGeneration.orderReport.orderReport-index', compact('orders', 'rstart_date', 'rend_date'));
        }

        if ($request->input('report')) {
            $start_date = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();

            $pdf = PDF::loadView('Backend.reportGeneration.pdf.orderReport', ['data' => $orders]);
            return $pdf->stream('document.pdf');
        }
    }
    // employee report ================================================================== //
    public function employee()
    {
        $role = Roleuser::where('role_id', 3)->select('user_id')->get();
        $users = User::whereIn('id', $role)->with('roles')->get();
        return view('Backend.reportGeneration.employReport.index', compact('users'));
    }
    public function employeegenerate(Request $request)
    {
        $role = Roleuser::where('role_id', 3)->select('user_id')->get();
        $users = User::whereIn('id', $role)->with('roles')->get();
        $pdf = PDF::loadView('Backend.reportGeneration.pdf.employee', ['data' => $users]);
        return $pdf->stream('document.pdf');
    }
    // customer report ================================================================== //
    public function customer()
    {
        $role = Roleuser::where('role_id', 4)->select('user_id')->get();
        $users = User::whereIn('id', $role)->with('roles')->get();
        return view('Backend.reportGeneration.customerReport.index', compact('users'));
    }
    public function customergenerate(Request $request)
    {
        $role = Roleuser::where('role_id', 4)->select('user_id')->get();
        $users = User::whereIn('id', $role)->with('roles')->get();
        $pdf = PDF::loadView('Backend.reportGeneration.pdf.customer', ['data' => $users]);
        return $pdf->stream('document.pdf');
    }
    // Low in Stock Report
    public function instock()
    {
        $products = Product::where('quantity', '<=', 5)->get();
        //dd($products);
        //$role = Roleuser::where('role_id', 4)->select('user_id')->get();

        return view('Backend.reportGeneration.lowInStock.index', compact('products'));
    }
    public function instockgenerate(Request $request)
    {
        $products = Product::where('quantity', '<=', 5)->get();

        $pdf = PDF::loadView('Backend.reportGeneration.pdf.instock', ['data' => $products]);
        return $pdf->stream('document.pdf');
    }


    // supplier report ================================================================== //
    public function supplier()
    {
        $role = Roleuser::where('role_id', 6)->select('user_id')->get();
        $users = User::whereIn('id', $role)->with('roles')->get();
        return view('Backend.reportGeneration.supplierReport.index', compact('users'));
    }
    public function suppliergenerate(Request $request)
    {
        $role = Roleuser::where('role_id', 6)->select('user_id')->get();
        $users = User::whereIn('id', $role)->with('roles')->get();
        $pdf = PDF::loadView('Backend.reportGeneration.pdf.supplier', ['data' => $users]);
        return $pdf->stream('document.pdf');
    }
    // Stock report ================================================================== //
    public function product()
    {
        $products = Product::paginate(10);
        return view('Backend.reportGeneration.stockReport.index', compact('products'));
    }
    public function productgenerate(Request $request)
    {
        $orders = Product::get();
        $pdf = PDF::loadView('Backend.reportGeneration.pdf.product', ['data' => $orders]);
        return $pdf->stream('document.pdf');
    }

    // Delivery report ================================================================== //
    public function delivery()
    {
        $orders = Order::get();
        return view('Backend.reportGeneration.deliveryReport.index', compact('orders'));
    }

    public function deliveryfilter(Request $request)
    {
        $start_date = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');

        if ($request->input('filter')) {

            $rstart_date = \Carbon\Carbon::parse($start_date)->format('m/d/y');
            $rend_date = \Carbon\Carbon::parse($end_date)->format('m/d/y');

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();

            return view('Backend.reportGeneration.deliveryReport.index', compact('orders', 'rstart_date', 'rend_date'));
        }

        if ($request->input('report')) {

            $start_date = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->get();

            $pdf = PDF::loadView('Backend.reportGeneration.pdf.delivery', ['data' => $orders]);
            return $pdf->stream('document.pdf');
        }
    }

    // Profit report ================================================================== //
    public function profit()
    {
        $orders = Order::with('order_items')->get();
        return view('Backend.reportGeneration.profitReport.index', compact('orders'));
    }

    public function profitfilter(Request $request)
    {
        $start_date = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
        $end_date = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');

        if ($request->input('filter')) {

            $rstart_date = \Carbon\Carbon::parse($start_date)->format('m/d/y');
            $rend_date = \Carbon\Carbon::parse($end_date)->format('m/d/y');

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->with('order_items')->get();
            //$products = Product::whereIn('id', $orders)->paginate(10);

            return view('Backend.reportGeneration.profitReport.index', compact('orders', 'rstart_date', 'rend_date'));
        }

        if ($request->input('report')) {
            $start_date = \Carbon\Carbon::parse($request->start_date)->format('Y-m-d');
            $end_date = \Carbon\Carbon::parse($request->end_date)->format('Y-m-d');

            $orders = Order::whereBetween('created_at', [$start_date, $end_date])->with('order_items')->get();
            //$orders = Order_Item::whereBetween('created_at', [$start_date, $end_date])->pluck('product_id')->all();
            $products = Product::whereIn('id', $orders)->paginate(10);

            $pdf = PDF::loadView('Backend.reportGeneration.pdf.profit', ['data' => $orders]);
            return $pdf->stream('document.pdf');
        }
    }
}
