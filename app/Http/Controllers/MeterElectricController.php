<?php

namespace App\Http\Controllers;

use App\MeterEletric;
use App\Room;
use Illuminate\Http\Request;

class MeterElectricController extends Controller
{
    public function index()
    {
        // Config
        $roomAll = Room::where('status', '!=', '0')->get();
        $listRoomId = [];
        foreach ($roomAll as $room) {
            $listRoomId[] = $room->id;
        }

        foreach ($listRoomId as $roomId) {
            $meterElectricSingle = MeterEletric::where('room_id', '=', $roomId)->get();
            if (count($meterElectricSingle) <= 0) {
                MeterEletric::create([
                    'account_id' => 1,
                    'room_id' => $roomId,
                    'unit' => 0,
                    'unit_current' => 0,
                    'total' => 0
                ]);
            }
        }

        $meterElectrics = MeterEletric::whereIn('room_id', $listRoomId)->get();

        return view('meters.electrics.index', compact('meterElectrics'));
    }

    public function updateAll(Request $request)
    {
        for ($i = 0; $i < count($request->id); $i++) {
            MeterEletric::where('id', $request->id[$i])->update([
                'unit' => $request->unit[$i],
                'unit_current' => $request->unit_current[$i],
                'total' => $request->unit_current[$i] - $request->unit[$i]
            ]);
        }

        // Config
        $roomAll = Room::where('status', '!=', '0')->get();
        $listRoomId = [];
        foreach ($roomAll as $room) {
            $listRoomId[] = $room->id;
        }

        foreach ($listRoomId as $roomId) {
            $meterEletricSingle = MeterEletric::where('room_id', '=', $roomId)->get();
            if (count($meterEletricSingle) <= 0) {
                MeterEletric::create([
                    'account_id' => 1,
                    'room_id' => $roomId,
                    'unit' => 0,
                    'unit_current' => 0,
                    'total' => 0
                ]);
            }
        }

        $meterElectrics = MeterEletric::whereIn('room_id', $listRoomId)->get();

        return view('meters.electrics.index', compact('meterElectrics'));
    }
}
