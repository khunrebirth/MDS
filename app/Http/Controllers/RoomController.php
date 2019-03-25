<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();

        return view('rooms.index', compact('rooms'));
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
        Room::create([
            'no' => $request->room_no,
            'detail' => $request->room_detail,
            'price' => $request->room_price,
            'status' => $request->room_status
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'เพิ่มห้องสำเร็จ!'
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
        Room::where('id', $id)->update([
            'no' => $request->room_no,
            'detail' => $request->room_detail,
            'price' => $request->room_price,
            'status' => $request->room_status
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'อัพเดทห้องสำเร็จ!'
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
        Room::destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'ลบห้องสำเร็จ!'
        ]);
    }
}
