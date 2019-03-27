<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payments.index');
    }

    public function create(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $invoice->status = 1;
        $invoice->save();

        session()->flash('message', 'สำเร็จ');

        return view('payments.index');
    }

    public function fast(Request $request)
    {
        $invoice = Invoice::find($request->invoice_id);
        $invoice->status = 1;
        $invoice->save();


        $totalRooms = count(Room::all());
        $totalCustomers = count(Customer::all());
        $totalInvoices = count(Invoice::where('status', '=', '0')->get());

        session()->flash('message', 'สำเร็จ');

        return view('home', compact('totalRooms', 'totalCustomers', 'totalInvoices'));
    }
}
