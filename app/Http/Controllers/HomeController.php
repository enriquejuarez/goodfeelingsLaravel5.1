<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Gallery;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Package;
use App\Section;
use App\Service;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Gallery::orderBy('id', 'DESC')
            ->where('status', 'on')
            ->where('reference', 'encabezado')
            ->get();
        $paquetes = Package::orderBy('id', 'DESC')
            ->where('status', 'on')
            ->get();
        $destinos = Destination::orderBy('id', 'DESC')
            ->where('status', 'on')
            ->get();
        $services = Service::orderBy('id', 'DESC')
            ->where('status', 'on')
            ->get();
        $sections1 = Section::select('name', 'title', 'id')
            ->where('status', 'on')
            ->get();
        $sections = [];
        foreach ($sections1 as $section) {
            $sections[$section->name] = $section->id."-".$section->title;
            
        }
    
        return view('home', compact('fotos', 'paquetes', 'sections', 'destinos', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$post = Post::create($request->all());

        //Image
        if($request->file('file')){
            $path = Storage::disk('public')->put('imagenes', $request->file('file'));
            $post->fill(['file' => asset($path)])->save();
        }
        //$post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.edit', $post->id)
            ->with('info', 'Entrada creada con éxito');
    }

}
