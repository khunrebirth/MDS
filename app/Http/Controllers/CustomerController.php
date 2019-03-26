<?php

namespace App\Http\Controllers;

use App\CustomerRoom;
use App\Invoice;
use App\InvoiceDetail;
use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $customerType = 'all';

        return view('customers.index', compact('customers', 'customerType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create([
            'first_name' => $request->customer_first_name,
            'last_name' => $request->customer_last_name,
            'nickname' => $request->customer_nickname,
            'idcard' => $request->customer_idcard,
            'phone' => $request->customer_phone,
            'email' => $request->customer_email
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'เพิ่มลูกค้าสำเร็จ!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Customer::where('id', $id)->update([
            'first_name' => $request->customer_first_name,
            'last_name' => $request->customer_last_name,
            'nickname' => $request->customer_nickname,
            'idcard' => $request->customer_idcard,
            'phone' => $request->customer_phone,
            'email' => $request->customer_email
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'อัพเดทลูกค้าสำเร็จ!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'ลบลูกค้าสำเร็จ!'
        ]);
    }

    public function search(Request $request)
    {
        $customerType = $request->customer_type;

        switch ($customerType) {
            case 'all':
                $customers = Customer::all();
                break;
            case 'have':
                $customers_all = Customer::all();
                $listId = [];
                foreach ($customers_all as $customer) {
                    if (count($customer->invoices) > 0)
                        $listId[] = $customer->id;
                }

                $customers = Customer::whereIn('id', $listId)->get();
                break;
        }

        return view('customers.index', compact('customers', 'customerType'));
    }

    public function invoice($id)
    {
        $customers = Customer::find($id);
        $invoices = Invoice::where('customer_id', '=', $id)->get();

        return view('customers.invoice', compact('customers', 'invoices'));
    }

    public function invoiceDetail($id)
    {
        $invoices = InvoiceDetail::where('invoice_id', '=', $id)->get();

        return view('customers.invoice_detail', compact('invoices'));
    }
}
