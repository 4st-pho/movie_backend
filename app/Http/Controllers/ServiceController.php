<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormService;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services= Service::all();
        return response()->json($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormService $request)
    {
        $image = $request->file('image');
        $storedPath = $image->move('images/services', $image->getClientOriginalName());
        $service = new Service;
        $service->name= $request->name;
        $service->image= $storedPath;
        $service->price= $request->price;
        $service->save();
        return response()->json(["message" => "Thành công"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return response()->json($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $image = $request->file('image');
        $storedPath = $image->move('images/services', $image->getClientOriginalName());
        $service->name= $request->name;
        $service->image= $storedPath;
        $service->price= $request->price;
        $service->save();
        return response()->json(["message" => "Cập nhật thành công"]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return response(null, 204);
    }
}