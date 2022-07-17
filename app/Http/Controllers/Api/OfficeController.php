<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office;
use App\Http\Resources\offices\OfficeResource;
use App\Http\Resources\offices\OfficeCollection;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OfficeCollection(Office::latest()->paginate());
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
            $office = new Office();
            $office->name = $request->name;
            $office->address = $request->address;
            $office->municipalities_id = $request->municipalities_id;
            $office->departaments_id = $request->departaments_id;
            $office->save();

            return response()->json([
                'message' => 'success',
                'data' => $office
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
    public function show(Office $office)
    {
        return new OfficeResource($office);
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
            $office = Office::findOrFail($id);
            $office->name = $request->name;
            $office->address = $request->address;
           
            $office->save();

            return response()->json([
                'message' => 'success',
                'data' => $office
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
                       
            Office::destroy($id);
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
