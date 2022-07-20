<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Diagnostic;
use App\Http\Resources\quotations\QuotationResource;
use App\Http\Resources\quotations\QuotationCollection;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new QuotationCollection(Quotation::latest()->paginate());
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
            $quotation = new Quotation();
            $quotation->date_init_quotations = $request->date_init_quotations;
            $quotation->date_end_quotations = $request->date_end_quotations;
            $quotation->justification = $request->justification;
            $quotation->status = $request->status;
            $quotation->users_id = $request->users_id;
            $quotation->offices_id = $request->offices_id;
            $quotation->doctors_id = $request->doctors_id;
            $quotation->pacients_id = $request->pacients_id;
            $quotation->save();

            return response()->json([
                'message' => 'success',
                'data' => $quotation
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
    public function show(Quotation $quotation)
    {
        return new QuotationResource($quotation);
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
            $quotation = Quotation::findOrFail($id);
            $quotation->date_init_quotations = $request->date_init_quotations;
            $quotation->date_end_quotations = $request->date_end_quotations;
            $quotation->justification = $request->justification;
            $quotation->status = $request->status;
            $quotation->users_id = $request->users_id;
            $quotation->offices_id = $request->offices_id;
            $quotation->doctors_id = $request->doctors_id;
            $quotation->pacients_id = $request->pacients_id;
            $quotation->save();

            return response()->json([
                'message' => 'success',
                'data' => $quotation
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
            
            if (Diagnostic::where('quotations_id', $id )->exists()) {

                return response()->json([
                    'message' => 'warnign',
                    'info' => 'No se puede eliminar el registro por que ya está relacionado.'
                ]);
            } else {
                Quotation::destroy($id);
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
