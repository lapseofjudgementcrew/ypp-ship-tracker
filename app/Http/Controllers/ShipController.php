<?php

namespace App\Http\Controllers;

use App\Ship;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ShipController extends Controller
{
    function store(Request $request){
        $ships_input = $request->input('ships');
        // dd($ships_input);
        $sanitized = filter_var($ships_input, FILTER_SANITIZE_STRING);
        $ships_array = explode(PHP_EOL, $sanitized);
        // dd($ships_array);
        $ships = array();


        $now = Carbon::now();
        foreach ($ships_array as $ship) {
            $s = sscanf($ship, "[vesselName=%[^,], vesselClass=%[^,], vesselSubclass=%[^,], inPort=%[^,], islandName=%[^,], isLocked=%[^,], isBattleReady=%[^,], vesselId=%d, sunk=%[^]]]", $name, $class, $subclass, $inPort, $islandName, $isLocked, $isBattleReady, $id, $sunk);

            $created_at = DB::table('ships')->where('id', $id)->value('created_at');

            $ships[] = [
                'id' => $id,
                'name' => $name,
                'class' => $class,
                'subclass' => $subclass === "null" ? null : $subclass,
                'inPort' => filter_var($inPort,FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE),
                'islandName' => $islandName,
                'isLocked' => filter_var($isLocked,FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE),
                'isBattleReady' => filter_var($isBattleReady,FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE),
                'sunk' => filter_var($sunk,FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE),
                'created_at' => $created_at?$created_at:$now,
                'updated_at' => $now
            ];

        }
        $ids_to_delete = array_map(function ($item) {
            return $item['id'] ;
        }, $ships);


        DB::table('ships')->whereIn('id', $ids_to_delete)->delete();
        DB::table('ships')->insert($ships);



    }

}

