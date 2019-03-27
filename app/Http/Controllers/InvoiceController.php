<?php

namespace App\Http\Controllers;

use App\Account;
use App\CustomerRoom;
use App\Invoice;
use App\InvoiceDetail;
use App\MeterEletric;
use App\MeterWater;
use App\Room;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::where('status', '=', '1')->get();

        return view('invoices.index', compact('rooms'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function build($date, $id)
    {
        $checkDate = new \Carbon\Carbon($date);
        $textCheckDate = "{$checkDate->year}-{$checkDate->month}";
        $checkInvoiceOrCreate = Invoice::where('room_id', '=', $id)
            ->where('month_year', '=', $textCheckDate)
            ->first();

        if ($checkInvoiceOrCreate == null) {
            $invoice = new Invoice;
            $customer = CustomerRoom::where('room_id', '=', $id)
                ->whereNull('date_move_out')
                ->first();
            $invoice->customer_id = $customer->customer_id;
            $invoice->room_id = $id;
            $invoice->total = 0;
            $invoice->date = $date;
            $invoice->status = 0;
            $newDate = new \Carbon\Carbon($date);
            $invoice->month_year = "{$newDate->year}-{$newDate->month}";
            $invoice->save();

            $accounts = Account::all();

            $priceTotal = 0;

            foreach ($accounts as $account) {
                $invoiceDetail = new InvoiceDetail;
                $invoiceDetail->account_id = $account->id;
                $invoiceDetail->invoice_id = $invoice->id;
                switch ($account->id) {
                    case '1':
                        $meterWater = MeterWater::where('room_id', '=', $id)
                            ->where('account_id', '=', $account->id)
                            ->first();
                        $invoiceDetail->unit = $meterWater->unit;
                        $invoiceDetail->unit_current = $meterWater->unit_current;
                        $invoiceDetail->total = ($meterWater->unit_current - $meterWater->unit) * $account->price;
                        break;
                    case '2':
                        $meterEletric = MeterEletric::where('room_id', '=', $id)
                            ->where('account_id', '=', $account->id)
                            ->first();
                        $invoiceDetail->unit = $meterEletric->unit;
                        $invoiceDetail->unit_current = $meterEletric->unit_current;
                        $invoiceDetail->total = ($meterEletric->unit_current - $meterEletric->unit) * $account->price;
                        break;
                    default:
                        $invoiceDetail->total = $account->price;
                }

                $priceTotal += $invoiceDetail->total;
                $invoiceDetail->save();
            }

            $invoiceUpdate = Invoice::find($invoice->id);
            $invoiceUpdate->total = $priceTotal;
            $invoiceUpdate->save();
        }

        $rooms = Room::where('status', '=', '1')->get();

        session()->flash('message', 'สำเร็จ');

        return view('invoices.index', compact('rooms'));
    }

    public function buildAll($date)
    {
        $rooms = Room::where('status', '=', '1')->get();

        foreach ($rooms as $room) {

            $id = $room->id;

            $checkDate = new \Carbon\Carbon($date);
            $textCheckDate = "{$checkDate->year}-{$checkDate->month}";
            $checkInvoiceOrCreate = Invoice::where('room_id', '=', $id)
                ->where('month_year', '=', $textCheckDate)
                ->first();

            if ($checkInvoiceOrCreate == null) {
                $invoice = new Invoice;
                $customer = CustomerRoom::where('room_id', '=', $id)
                    ->whereNull('date_move_out')
                    ->first();
                $invoice->customer_id = $customer->customer_id;
                $invoice->room_id = $id;
                $invoice->total = 0;
                $invoice->date = $date;
                $invoice->status = 0;
                $newDate = new \Carbon\Carbon($date);
                $invoice->month_year = "{$newDate->year}-{$newDate->month}";
                $invoice->save();

                $accounts = Account::all();

                foreach ($accounts as $account) {
                    $invoiceDetail = new InvoiceDetail;
                    $invoiceDetail->account_id = $account->id;
                    $invoiceDetail->invoice_id = $invoice->id;
                    switch ($account->id) {
                        case '1':
                            $meterWater = MeterWater::where('room_id', '=', $id)
                                ->where('account_id', '=', $account->id)
                                ->first();
                            $invoiceDetail->unit = $meterWater->unit;
                            $invoiceDetail->unit_current = $meterWater->unit_current;
                            $invoiceDetail->total = ($meterWater->unit_current - $meterWater->unit) * $account->price;
                            break;

                        case '2':
                            $meterEletric = MeterEletric::where('room_id', '=', $id)
                                ->where('account_id', '=', $account->id)
                                ->first();
                            $invoiceDetail->unit = $meterEletric->unit;
                            $invoiceDetail->unit_current = $meterEletric->unit_current;
                            $invoiceDetail->total = ($meterEletric->unit_current - $meterEletric->unit) * $account->price;
                            break;

                        default:
                            $invoiceDetail->total = $account->price;
                    }

                    $invoiceDetail->save();
                }
            }
        }

        $rooms = Room::where('status', '=', '1')->get();

        session()->flash('message', 'สำเร็จ');

        return view('invoices.index', compact('rooms'));
    }
}
