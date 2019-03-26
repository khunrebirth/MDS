<?php

namespace App\Http\Controllers;

use App\MeterWater;
use App\Room;
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
        // Config
        $roomAll = Room::where('status', '!=', '0')->get();
        $listRoomId = [];
        foreach ($roomAll as $room) {
            $listRoomId[] = $room->id;
        }

        foreach ($listRoomId as $roomId) {
            $meterWaterSingle = MeterWater::where('room_id', '=', $roomId)->get();
            if (count($meterWaterSingle) <= 0) {
                MeterWater::create([
                    'account_id' => 1,
                    'room_id' => $roomId,
                    'unit' => 0,
                    'unit_current' => 0,
                    'total' => 0
                ]);
            }
        }

        $meterWaters = MeterWater::whereIn('room_id', $listRoomId)->get();

        return view('meters.waters.index', compact('meterWaters'));
    }

    public function updateAll(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            MeterWater::where('id', $request->id[$i])->update([
                'unit' => $request->unit[$i],
                'unit_current' => $request->unit_current[$i],
                'total' => $request->unit_current[$i] - $request->unit_current[$i]
            ]);
        }

        // Config
        $roomAll = Room::where('status', '!=', '0')->get();
        $listRoomId = [];
        foreach ($roomAll as $room) {
            $listRoomId[] = $room->id;
        }

        foreach ($listRoomId as $roomId) {
            $meterWaterSingle = MeterWater::where('room_id', '=', $roomId)->get();
            if (count($meterWaterSingle) <= 0) {
                MeterWater::create([
                    'account_id' => 1,
                    'room_id' => $roomId,
                    'unit' => 0,
                    'unit_current' => 0,
                    'total' => 0
                ]);
            }
        }

        $meterWaters = MeterWater::whereIn('room_id', $listRoomId)->get();

        return view('meters.waters.index', compact('meterWaters'));
    }
}
