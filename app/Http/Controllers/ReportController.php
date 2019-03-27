<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();

//        $invoicesTotalAll= Invoice::all()
//            ->sum('total');
//        $invoicesTotalPaid = Invoice::where('status', '=', 1)
//            ->sum('total');
//        $invoicesTotalUnpaid  = $invoicesTotalAll - $invoicesTotalPaid;
//
//        $invoicesTotal = [
//            'ยอดเดือนนี้ทั้งหมด' => $invoicesTotalAll,
//            'ยอดที่จ่ายแล้ว' => $invoicesTotalPaid,
//            'ยอดที่ค้างชำระ' => $invoicesTotalUnpaid,
//        ];

        $invoicesTotal = [];

        return view('reports.index', compact('invoicesTotal'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $checkDate = new \Carbon\Carbon($request->M);
        $textCheckDate = "{$checkDate->year}-{$checkDate->month}";

        $invoicesTotalAll= Invoice::where('month_year', '=', $textCheckDate)
            ->sum('total');
        $invoicesTotalPaid = Invoice::where('status', '=', 1)
            ->where('month_year', '=', $textCheckDate)
            ->sum('total');
        $invoicesTotalUnpaid  = $invoicesTotalAll - $invoicesTotalPaid;

        $invoicesTotal = [
            'ยอดเดือนนี้ทั้งหมด' => $invoicesTotalAll,
            'ยอดที่จ่ายแล้ว' => $invoicesTotalPaid,
            'ยอดที่ค้างชำระ' => $invoicesTotalUnpaid,
        ];

        return view('reports.index', compact('invoicesTotal'));
    }
}
