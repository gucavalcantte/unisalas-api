<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cursos;

class CursosController extends Controller
{
    
        public function index(Request $request)
    {
        $params = $request->query();
        $cursos = new Cursos();

        if (isset($params["curso"])) {
            $cursos = $cursos->where("curso", $params["curso"]);
        }

        if (isset($params["semestre"])) {
            $cursos = $cursos->where("semestre", $params["semestre"]);
        }

        if (isset($params["periodo"])) {
            $cursos = $cursos->where("periodo", $params["periodo"]);
        }

        if (empty($params)) {
            return response()->json($cursos->select("curso")->distinct("curso")->get());
        }

        return response()->json($cursos->firstOrFail());
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cursos::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cursos::findOrFail($id);
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
        $curso = Cursos::findOrFail($id);
        $curso->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curso = Cursos::findOrFail($id);
        $curso->delete();
    }
}

