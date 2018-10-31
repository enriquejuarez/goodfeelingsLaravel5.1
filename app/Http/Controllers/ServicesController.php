<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function get_service(Request $request)
    {
        if (!$request->ajax()) return redirect('/'); //Si no es petición ajax redirecciona al home

        $service = Service::find(request()->idService);

        return ['service' => $service];
    }

    public function update_service(Request $request)
    {
        if (!$request->ajax()) return redirect('/'); //Si no es petición ajax redirecciona al home

        $service = Service::find(request()->idService);

        $service->title = request()->title;
        $service->save();

        if($request->file('file-service')){
            $path = Storage::disk('public')->put('imagenes', $request->file('file-service'));
            $service->fill(['file' => asset($path)])->save();
        }
    }
}
