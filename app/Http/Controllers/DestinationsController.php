<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_destination(Request $request)
    {
        if (!$request->ajax()) return redirect('/'); //Si no es petición ajax redirecciona al home

        $destination = Destination::find(request()->idDestination);

        return ['destination' => $destination];
    }

    public function update_destination(Request $request)
    {
        if (!$request->ajax()) return redirect('/'); //Si no es petición ajax redirecciona al home

        $destination = Destination::find(request()->idDestination);

        $destination->title = request()->title;
        $destination->save();

        if($request->file('file-destination')){
            $path = Storage::disk('public')->put('imagenes', $request->file('file-destination'));
            $destination->fill(['file' => asset($path)])->save();
        }
    }
}
