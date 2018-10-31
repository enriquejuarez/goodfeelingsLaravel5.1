<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function get_section(Request $request)
    {
        if (!$request->ajax()) return redirect('/'); //Si no es petición ajax redirecciona al home

        $section = Section::find(request()->idTitle);

        return ['section' => $section];
    }

    public function update_title_section(Request $request)
    {
        if (!$request->ajax()) return redirect('/'); //Si no es petición ajax redirecciona al home
//dd("Llega");
        $section = Section::find(request()->idTitle);

        $section->title = request()->title;
        $section->save();
    }
}
