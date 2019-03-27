<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalRooms = count(Room::all());
        $totalCustomers = count(Customer::all());
        $totalInvoices = count(Invoice::where('status', '=', '0')->get());

        return view('home', compact('totalRooms', 'totalCustomers', 'totalInvoices'));
    }
}
