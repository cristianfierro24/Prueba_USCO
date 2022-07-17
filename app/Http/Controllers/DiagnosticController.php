<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic;
use Illuminate\Http\Request;

/**
 * Class DiagnosticController
 * @package App\Http\Controllers
 */
class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnostics = Diagnostic::paginate();

        return view('diagnostic.index', compact('diagnostics'))
            ->with('i', (request()->input('page', 1) - 1) * $diagnostics->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diagnostic = new Diagnostic();
        return view('diagnostic.create', compact('diagnostic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Diagnostic::$rules);

        $diagnostic = Diagnostic::create($request->all());

        return redirect()->route('diagnostics.index')
            ->with('success', 'Diagnostic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnostic = Diagnostic::find($id);

        return view('diagnostic.show', compact('diagnostic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagnostic = Diagnostic::find($id);

        return view('diagnostic.edit', compact('diagnostic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Diagnostic $diagnostic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnostic $diagnostic)
    {
        request()->validate(Diagnostic::$rules);

        $diagnostic->update($request->all());

        return redirect()->route('diagnostics.index')
            ->with('success', 'Diagnostic updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $diagnostic = Diagnostic::find($id)->delete();

        return redirect()->route('diagnostics.index')
            ->with('success', 'Diagnostic deleted successfully');
    }
}
