<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Provide an overview of all rooms
     *
     * @return \Illuminate\Http\Response
     */
    public function overview()
    {
        $rooms = Room::all();

        return view('admin/rooms/overview', [
            'rooms' => $rooms,
        ]);
    }

    /**
     * Show a form to create a new room
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();

        return view('admin/rooms/create', [
            'buildings' => $buildings
        ]);
    }

    /**
     * Store a newly created room
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    protected function store(Request $request)
    {
        Room::create([
            'name'        => $request->input('name'),
            'capacity'    => $request->input('capacity'),
            'building_id' => $request->input('building_id'),
        ]);

        return redirect('/admin/rooms');
    }

    /**
     * Show a form to edit a room
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $roomId)
    {
        $room = Room::find($roomId);
        $buildings = Building::all();

        return view('admin/rooms/edit', [
            'room'      => $room,
            'buildings' => $buildings
        ]);
    }

    /**
     * Update an edited room
     *
     * @param  Request $request
     * @return Room
     */
    protected function update(Request $request)
    {
        $room = Room::find($request->input('room_id'));
        $room->name = $request->input('name');
        $room->capacity = $request->input('capacity');
        $room->building_id = $request->input('building_id');
        $room->save();

        return redirect('/admin/rooms');
    }

    /**
     * Delete a room
     *
     * @param  int $room_id
     * @return Room
     */
    protected function delete(int $room_id)
    {
        $room = Room::find($room_id);
        $room->delete();

        return redirect('/admin/rooms');
    }
}
