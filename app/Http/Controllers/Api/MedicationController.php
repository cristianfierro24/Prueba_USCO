<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Medication;
use App\Models\DiagnosticsMedication;
use App\Http\Resources\medications\MedicationResource;
use App\Http\Resources\medications\MedicationCollection;

class MedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new MedicationCollection(Medication::latest()->paginate());
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
            $medication = new Medication();
            $medication->name = $request->name;
           
            $medication->save();

            return response()->json([
                'message' => 'success',
                'data' => $medication
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
    public function show(Medication $medication)
    {
        return new MedicationResource($medication);
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
            $medication = Medication::findOrFail($id);
            $medication->name = $request->name;
           
            $medication->save();

            return response()->json([
                'message' => 'success',
                'data' => $medication
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
            
            if (DiagnosticsMedication::where('medications_id', $id )->exists()) {

                return response()->json([
                    'message' => 'warnign',
                    'info' => 'No se puede eliminar el registro por que ya está relacionado.'
                ]);
            } else {
                Medication::destroy($id);
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
