<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;

/**
 * Class OfficeController
 * @package App\Http\Controllers
 */
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::paginate();

        return view('office.index', compact('offices'))
            ->with('i', (request()->input('page', 1) - 1) * $offices->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $office = new Office();
        return view('office.create', compact('office'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Office::$rules);

        $office = Office::create($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'Office created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $office = Office::find($id);

        return view('office.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);

        return view('office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Office $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office)
    {
        request()->validate(Office::$rules);

        $office->update($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'Office updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $office = Office::find($id)->delete();

        return redirect()->route('offices.index')
            ->with('success', 'Office deleted successfully');
    }
}
