<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ads\StoreAdsRequest;
use App\Http\Requests\Ads\UpdateAdsRequest;
use App\Models\Ads;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAds = Ads::limit(2)->get();
        if ($allAds) {
            return response()->json($allAds, 200);
        }
        return response()->json(['message' => 'Ads not found'], 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdsRequest $request)
    {
        try {
            $ads = Ads::create($request->only(['title', 'adv_image_path']));
            return response()->json([
                'ads' => $ads,
                'message' => 'New ads created successfully'
            ], 200);
        } catch (\Error $err) {
            return response()->json([
                'message' => "Can't create new ads",
                'error' => $err
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Ads::find($id);
        if ($ads) {
            return response()->json($ads, 200);
        }
        return response()->json(['message' => 'Ads not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdsRequest $request, $id)
    {
        try {
            $ads = Ads::find($id)->update($request->all());
            return response()->json([
                'ads' => $ads,
                'message' => 'Ads updated successfully'
            ], 200);
        } catch (\Error $err) {
            return response()->json([
                'message' => "Can't update ads",
                'error' => $err
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $deletedAds = Ads::find($id);
            $deletedAds->delete();
            return response()->json([
                'message' => 'Ads deleted successfully',
                'deletedAds' => $deletedAds
            ], 200);
        } catch (\Error $err) {
            return response()->json([
                'message' => "Can't delete ads",
                'error' => $err
            ]);
        }
    }
}
