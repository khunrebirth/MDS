<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Room;
use App\CustomerRoom;

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
        $roomType = 'all';
        $listCustomers = Customer::all();

        return view('rooms.index', compact('rooms', 'roomType', 'listCustomers'));
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

        $room = Room::create([
            'no' => $request->room_no,
            'detail' => $request->room_detail,
            'price' => $request->room_price,
            'status' => $request->room_status
        ]);

        // Event after create room
        if ($request->customer_room != 'empty') {
            CustomerRoom::create([
                'customer_id' => $request->customer_room,
                'room_id' => $room->id,
                'date_move_in' => \Carbon\Carbon::now()->toDateTimeString()
            ]);
        }

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
        // Update Room
        Room::find($id)->update([
            'no' => $request->room_no,
            'detail' => $request->room_detail,
            'price' => $request->room_price,
            'status' => $request->room_status
        ]);

        switch ($request->customer_room_type) {
            case 'old':
                break;

            case 'change':
                if ($request->customer_room_id != '') {
                    CustomerRoom::where('id', $request->customer_room_id)
                        ->update([
                            'date_move_out' => \Carbon\Carbon::now()->toDateTimeString()
                        ]);
                }

                CustomerRoom::create([
                    'customer_id' => $request->customer_room,
                    'room_id' => $id,
                    'date_move_in' => \Carbon\Carbon::now()->toDateTimeString()
                ]);
                break;

            case 'move_out':
                CustomerRoom::where('customer_id', '=', $request->customer_room)
                    ->where('room_id', '=', $id)
                    ->update([
                        'date_move_out' => \Carbon\Carbon::now()->toDateTimeString()
                    ]);
                break;
        }

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

    public function search(Request $request)
    {
        $roomType = $request->room_type;
        $listCustomers = Customer::all();

        switch ($roomType) {
            case 'all':
                $rooms = Room::all();
                break;
            case 'empty':
                $rooms = Room::where('status', '=', '0')->get();
                break;
            case 'full':
                $rooms = Room::where('status', '=', '1')->get();
                break;
        }

        return view('rooms.index', compact('rooms', 'roomType', 'listCustomers'));
    }

    public function history($id)
    {
        $customerRooms = CustomerRoom::where('room_id', '=',$id)->get();

        return view('rooms.history', compact('customerRooms'));
    }
}
