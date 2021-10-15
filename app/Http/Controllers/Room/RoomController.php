<?php

namespace App\Http\Controllers\Room;

use App\Events\RoomCreated;
use App\Events\RoomDeleted;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ConstController;
use App\Models\Room\Room;
use App\Http\Requests\RoomRequest;

class RoomController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::with('type')->paginate(ConstController::$ROOM_PER_PAGE);
        return response()->json($rooms);
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
    public function store(RoomRequest $roomRequest)
    {
        $temp = Room::create($roomRequest->all());
        RoomCreated::dispatch($temp->id);
        return response()->json(["message" => "Thành công"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        $room = Room::where('id', $room->id)->with('type')->firstOrFail();
        return response()->json($room);
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
    public function update(RoomRequest $roomRequest, Room $room)
    {
        $room->update($roomRequest->all());
        return response()->json(["message" => "Thành công"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $id = $room->id;
        $room->delete();
        RoomDeleted::dispatch($id);
        return response(null, 204);
    }
}
