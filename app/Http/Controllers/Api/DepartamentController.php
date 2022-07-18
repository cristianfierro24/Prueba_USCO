<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departament;
use App\Models\Municipality;
use App\Http\Resources\departaments\DepartamentResource;
use App\Http\Resources\departaments\DepartamentCollection;


class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DepartamentCollection(Departament::latest()->paginate());
/*
         $departaments = Departament::paginate();

        return view('departament.index', compact('departaments'))
           ->with('i', (request()->input('page', 1) - 1) * $departaments->perPage());*/
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $departament = new Departament();
            $departament->name = $request->name;
           
            $departament->save();

            return response()->json([
                'message' => 'success',
                'data' => $departament
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Departament $departament)
    {
        return new DepartamentResource($departament);

        /*$departament = Departament::find($id);

        return view('departament.show', compact('departament'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departament $departament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $departament = Departament::findOrFail($id);
            $departament->name = $request->name;
           
            $departament->save();

            return response()->json([
                'message' => 'success',
                'data' => $departament
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
      //
    }
    
}
