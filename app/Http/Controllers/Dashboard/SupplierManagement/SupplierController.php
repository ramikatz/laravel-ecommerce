<?php

namespace App\Http\Controllers\Dashboard\SupplierManagement;

use App\User;
use App\Models\Roleuser;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\MailController;

class SupplierController extends Controller
{
    public function quotationindex()
    {
        $suppliers = Supplier::with('user')->get();
        //dd($suppliers);
        return view('Backend.supplierManagement.indexQuotation', compact('suppliers'));
    }
    public function quotationcreate()
    {
        $dashboardusers = [6];
        $role = Roleuser::whereIn('role_id', $dashboardusers)->select('user_id')->get();
        $suppliers = User::whereIn('id', $role)->get();
        return view('Backend.supplierManagement.askQuotation', compact('suppliers'));
    }
    public function quotationstore(Request $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);
        //dd($user);
        $supplier = new Supplier();
        $supplier->title = $request->quotation_title;
        $supplier->content = $request->content;
        $supplier->number = $request->number;
        $supplier->status = 'pending';
        $supplier->created_user = $user->userName;
        $supplier->user_id = $request->supplier_id;
        $supplier->save();

        MailController::Sendquotation($supplier->title, $supplier->content, $supplier->created_user, $supplier->number, $user->userName, $user->email, $supplier->created_at);

        /*  $to_name = 'Romal';
        $to_email = 'roomikat@gmail.com';
        $data = array('name' => "Ogbonna Vitalis(sender_name)", "body" => "A test mail");
        Mail::send('Mail.Quotation.Quote', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
            $message->from('roomikat@gmail.com', 'Test Mail');
        });
 */



        return redirect()->route('dashboard.supplier.quotation.index')
            ->with('success', 'Send Quotation Request successfully');
    }
    public function quotationedit(Supplier $supplier)
    {
        // dd($supplier);
        $supplier->status = 'Receviced';
        $supplier->save();
        /* $supplier->status=$r */
        return redirect()->route('dashboard.supplier.quotation.index')
            ->with('success', 'Send Quotation Request successfully');
    }
    public function quotationshow($supplier)
    {
        $supplier = Supplier::where('id', $supplier)->first();

        $pdf = PDF::loadView('Backend.supplierManagement.requestedQuotation', ['data' => $supplier]);
        return $pdf->stream('document.pdf');

        return view('Backend.supplierManagement.askQuotation', compact('supplier'));
    }
    public function supplierdestroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('dashboard.supplier.quotation.index')
            ->with('message', 'product Deleted Successfully');
    }
}
