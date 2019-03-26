<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::all();

        return view('settings.index', compact('accounts'));
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

    public function updateAll(Request $request)
    {
        $accounts = Account::all();

        // Update Account Meter Water
        $account_meter_water  = Account::find($request->meter_water_id);
        $account_meter_water->price = $request->meter_water_price;
        $account_meter_water->save();

        // Update Account Meter Eletrice
        $account_meter_eletric  = Account::find($request->meter_eletric_id);
        $account_meter_eletric->price = $request->meter_eletric_price;
        $account_meter_eletric->save();

        // Update Account Room
//        $account_room  = Account::find($request->room_id);
//        $account_room->price = $request->room_price;
//        $account_room->save();

        return redirect()->route('settings.index');
    }
}
