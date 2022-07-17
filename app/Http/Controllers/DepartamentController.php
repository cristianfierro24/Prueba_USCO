<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Departament;
use Illuminate\Http\Request;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartamentResource;

/**
 * Class DepartamentController
 * @package App\Http\Controllers
 */
class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return new DepartamentCollection(departament::latest()->paginate());

       // $departaments = Departament::paginate();

        //return view('departament.index', compact('departaments'))
           // ->with('i', (request()->input('page', 1) - 1) * $departaments->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $departament = new Departament();
        //return view('departament.create', compact('departament'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Departament::$rules);

        $departament = Departament::create($request->all());

        return redirect()->route('departaments.index')
            ->with('success', 'Departament created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departament = Departament::find($id);

        return view('departament.show', compact('departament'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      //  $departament = Departament::find($id);

        //return view('departament.edit', compact('departament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Departament $departament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Departament $departament)
    {
        request()->validate(Departament::$rules);

        $departament->update($request->all());

        return redirect()->route('departaments.index')
            ->with('success', 'Departament updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $departament = Departament::find($id)->delete();

        return redirect()->route('departaments.index')
            ->with('success', 'Departament deleted successfully');
    }
}
