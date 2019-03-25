<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Room;

class RoomController extends Controller
{
    function getRoomById(Request $request) {
        $room = Room::find($request->id);

        return response()->json([
            'data' => $room
        ]);
    }
}
