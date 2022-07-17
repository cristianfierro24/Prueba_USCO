<?php

namespace App\Http\Controllers;

use App\Models\DiagnosticsMedication;
use Illuminate\Http\Request;

/**
 * Class DiagnosticsMedicationController
 * @package App\Http\Controllers
 */
class DiagnosticsMedicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosticsMedications = DiagnosticsMedication::paginate();

        return view('diagnostics-medication.index', compact('diagnosticsMedications'))
            ->with('i', (request()->input('page', 1) - 1) * $diagnosticsMedications->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diagnosticsMedication = new DiagnosticsMedication();
        return view('diagnostics-medication.create', compact('diagnosticsMedication'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DiagnosticsMedication::$rules);

        $diagnosticsMedication = DiagnosticsMedication::create($request->all());

        return redirect()->route('diagnostics-medications.index')
            ->with('success', 'DiagnosticsMedication created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnosticsMedication = DiagnosticsMedication::find($id);

        return view('diagnostics-medication.show', compact('diagnosticsMedication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagnosticsMedication = DiagnosticsMedication::find($id);

        return view('diagnostics-medication.edit', compact('diagnosticsMedication'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DiagnosticsMedication $diagnosticsMedication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiagnosticsMedication $diagnosticsMedication)
    {
        request()->validate(DiagnosticsMedication::$rules);

        $diagnosticsMedication->update($request->all());

        return redirect()->route('diagnostics-medications.index')
            ->with('success', 'DiagnosticsMedication updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $diagnosticsMedication = DiagnosticsMedication::find($id)->delete();

        return redirect()->route('diagnostics-medications.index')
            ->with('success', 'DiagnosticsMedication deleted successfully');
    }
}
