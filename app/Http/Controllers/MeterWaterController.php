<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeterWaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('meters.waters.index');
    }
}
