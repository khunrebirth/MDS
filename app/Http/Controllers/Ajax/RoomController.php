<?php

namespace App\Http\Controllers\Ajax;

use App\CustomerRoom;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class RoomController extends Controller
{
    function getRoomById(Request $request) {

        $room = Room::find($request->id);

        if ($room->status != '0') {
            $customerRoom = CustomerRoom::where('room_id', '=', $room->id)
                ->whereNull('date_move_out')
                ->get();
        }

        return response()->json([
            'data' => $room,
            'etc' => [
                'customer_id' => isset($customerRoom[0]->customer_id) ? $customerRoom[0]->customer_id : '',
                'customer_room_id' => isset($customerRoom[0]->id) ? $customerRoom[0]->id : ''
            ]
        ]);
    }
}
