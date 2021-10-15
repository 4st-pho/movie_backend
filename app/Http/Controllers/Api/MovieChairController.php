<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChairRequest;
use App\Models\MovieChair;
use Illuminate\Http\Request;

class MovieChairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return MovieChair::where('room_id', '=', $request->room_id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChairRequest $request)
    {
        try {
            MovieChair::create($request->all());
            return response()->json(['result' => 'Success!', 'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['result' => 'False!', 'errors' => $e, 'status' => 400]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MovieChair $chair)
    {
        return $chair;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreChairRequest $request, MovieChair $chair)
    {
        try {
            $chair->update($request->all());
            return response()->json(['result' => 'Success!','chair' => $chair,  'status' => 200]);
        } catch (\Exception $e) {
            return response()->json(['result' => 'False!', 'errors' => $e, 'status' => 400]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieChair $chair)
    {
        try{
            $chair->delete();
            return response()->json(['result' => 'Success!','chair' => $chair, 'status' => 200]);
        }
        catch (\Exception $e) {
            return response()->json(['result' => 'False!', 'errors' => $e, 'status' => 400]);
        }
    }
}
