<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DocumentType;

use App\Http\Resources\documenttypes\DocumentTypeResource;
use App\Http\Resources\documenttypes\DocumentTypeCollection;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new DocumentTypeCollection(DocumentType::latest()->paginate());
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
            $documentType = new DocumentType();
            $documentType->name = $request->name;
            $documentType->code = $request->code;
           
            $documentType->save();

            return response()->json([
                'message' => 'success',
                'data' => $documentType
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
    public function show(DocumentType $documentType)
    {
        return new DocumentTypeResource($documentType);
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
            $documentType = DocumentType::findOrFail($id);
            $documentType->name = $request->name;
            $documentType->code = $request->code;
            
            $documentType->save();

            return response()->json([
                'message' => 'success',
                'data' => $documentType
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
            
            if (User::where('document_types_id', $id )->exists()) {

                return response()->json([
                    'message' => 'warnign',
                    'info' => 'No se puede eliminar el registro por que ya está relacionado.'
                ]);
            } else {
                Profile::destroy($id);
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
