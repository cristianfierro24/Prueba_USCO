<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DiagnosticsMedication;

use App\Http\Resources\diagnosticsmedications\DiagnosticsMedicationResource;
use App\Http\Resources\diagnosticsmedications\DiagnosticsMedicationCollection;

class DiagnosticsMedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DiagnosticsMedicationCollection(DiagnosticsMedication::latest()->paginate());
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
            $diagnosticsMedication = new DiagnosticsMedication();
            $diagnosticsMedication->name = $request->name;
            $diagnosticsMedication->cantidad = $request->cantidad;
            $diagnosticsMedication->medications_id = $request->medications_id;
            $diagnosticsMedication->diagnostics_id = $request->diagnostics_id;
            $diagnosticsMedication->save();

            return response()->json([
                'message' => 'success',
                'data' => $diagnosticsMedication
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
    public function show(DiagnosticsMedication $diagnosticsMedication)
    {
        return new DiagnosticsMedicationResource($diagnosticsMedication);
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
            $diagnosticsMedication = DiagnosticsMedication::findOrFail($id);
            $diagnosticsMedication->name = $request->name;
            $diagnosticsMedication->cantidad = $request->cantidad;
            $diagnosticsMedication->save();

            return response()->json([
                'message' => 'success',
                'data' => $diagnosticsMedication
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
                       
            DiagnosticsMedication::destroy($id);
            return response()->json([
                'message' => 'success'
            ]);
        
    } catch ( \Throwable $th) {
        return  response()->json([
            'message' => 'Error' .  $th->__toString()
        ], 500);
    }
    }
}
