<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnostic;
use App\Models\DiagnosticsMedication;
use App\Http\Resources\diagnostics\DiagnosticResource;
use App\Http\Resources\diagnostics\DiagnosticCollection;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DiagnosticCollection(Diagnostic::latest()->paginate());
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
        try {
            $diagnostic = new Diagnostic();
            $diagnostic->description = $request->description;
            $diagnostic->quotations_id = $request->quotations_id;
            $diagnostic->save();

            return response()->json([
                'message' => 'success',
                'data' => $diagnostic
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnostic $diagnostic)
    {
        return new DiagnosticResource($diagnostic);
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
        try {
            $diagnostic = Diagnostic::findOrFail($id);
            $diagnostic->description = $request->description;
            $diagnostic->quotations_id = $request->quotations_id;
            $diagnostic->save();

            return response()->json([
                'message' => 'success',
                'data' => $diagnostic
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
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
            
            if (DiagnosticMedication::where('diagnostic_id', $id )->exists()) {

                return response()->json([
                    'message' => 'warnign',
                    'info' => 'No se puede eliminar el registro por que ya está relacionado.'
                ]);
            } else {
                Diagnostic::destroy($id);
                return response()->json([
                    'message' => 'success'
                ]);
            }
        } catch ( \Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
        }
    }
}
