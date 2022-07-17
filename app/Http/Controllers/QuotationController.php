<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use Illuminate\Http\Request;

/**
 * Class QuotationController
 * @package App\Http\Controllers
 */
class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Quotation::paginate();

        return view('quotation.index', compact('quotations'))
            ->with('i', (request()->input('page', 1) - 1) * $quotations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quotation = new Quotation();
        return view('quotation.create', compact('quotation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Quotation::$rules);

        $quotation = Quotation::create($request->all());

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = Quotation::find($id);

        return view('quotation.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotation = Quotation::find($id);

        return view('quotation.edit', compact('quotation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Quotation $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        request()->validate(Quotation::$rules);

        $quotation->update($request->all());

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $quotation = Quotation::find($id)->delete();

        return redirect()->route('quotations.index')
            ->with('success', 'Quotation deleted successfully');
    }
}
