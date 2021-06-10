<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Ships</title>
        <style>

            th {
                text-align: center;
                padding: 10px;
            }
            td {
                text-align: center;
                padding: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Ships</h1>
        <table>
            <tr>
              <th><button>Id</button></th>
              <th>Ship Name</th>
              <th>Class</th>
              <th>Subclass</th>
              <th>inPort</th>
              <th>Island</th>
              <th>Locked</th>
              <th>Battle Ready</th>
              <th>Sunk</th>
              <th>Created at</th>
              <th>Updated at</th>
            </tr>
            @foreach($ships as $ship )
            <tr>
              <td>{{$ship->id}}</td>
              <td>{{$ship->name}}</td>
              <td>{{$ship->class}}</td>
              <td>{{$ship->subclass}}</td>
              <td>{{$ship->inPort}}</td>
              <td>{{$ship->islandName}}</td>
              <td>{{$ship->isLocked}}</td>
              <td>{{$ship->isBattleReady}}</td>
              <td>{{$ship->sunk}}</td>
              <td>{{$ship->created_at->tz('America/Los_Angeles')->toDayDateTimeString()}}</td>
              <td>{{$ship->updated_at->tz('America/Los_Angeles')->toDayDateTimeString()}}</td>
              
            </tr>
            @endforeach
        </table>
    </body>
</html>
