<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\StoreFilmRequest;
use App\Models\AppConst;
use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::paginate(AppConst::FILM_PER_PAGE);
        return response()->json($films)->setStatusCode(200, "Thanh Cong");
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
    public function store(StoreFilmRequest $request)
    {
        $fileName = $request->file('image_url')->store('images/film');

        $film = new Film;

        $film -> fill( $request->all() );
        $film -> image_url = $fileName;

        if ($film->save()) {
            return response()->json(['message'=>"Thanh Cong"])->setStatusCode(200,"Them du lieu thanh cong");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
            return response()->json([$film,"Tim thanh cong"])->setStatusCode(200,"Thanh cong");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        if($film)
        $film->update( $request->all() );
        return response()->json(['message'=>"Cap nhat thanh cong"])->setStatusCode(200,"Cap nhat thanh cong");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $film -> delete();
        return response()->json(['message'=>"Xoa Thanh cong"])->setStatusCode(200,"Xoa Thanh Cong");
    }
}
