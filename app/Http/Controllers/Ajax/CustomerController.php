<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;

class CustomerController extends Controller
{
    function getCustomerById(Request $request) {
        $customer = Customer::find($request->id);

        return response()->json([
            'data' => $customer
        ]);
    }
}
