<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\User;
use App\Http\Resources\users\UserResource;
use App\Http\Resources\users\UserCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new UserCollection(User::latest()->paginate());
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
            $user = new User();
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->document_number = $request->document_number;
            $user->email = $request->email;
            $user->email_verified_at = $request->email_verified_at;
            $user->password = $request->password;
            $user->last_names = $request->last_names;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->salary = $request->salary;
            $user->taxes = $request->taxes;
            $user->document_types_id = $request->document_types_id;
            $user->profiles_id = $request->profiles_id;
            $user->municipalities_id = $request->municipalities_id;
            $user->departaments_id = $request->departaments_id;
            $user->save();

            return response()->json([
                'message' => 'success',
                'data' => $user
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
    public function show(User $user)
    {
        return new UserResource($user);
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
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->birthdate = $request->birthdate;
            $user->document_number = $request->document_number;
            $user->email = $request->email;
            $user->email_verified_at = $request->email_verified_at;
            $user->password = $request->password;
            $user->last_names = $request->last_names;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->salary = $request->salary;
            $user->taxes = $request->taxes;
            $user->document_types_id = $request->document_types_id;
            $user->profiles_id = $request->profiles_id;
            $user->municipalities_id = $request->municipalities_id;
            $user->departaments_id = $request->departaments_id;
            $user->save();

            return response()->json([
                'message' => 'success',
                'data' => $user
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
            
            if (Quotation::where('users_id', $id )->exists()) {

                return response()->json([
                    'message' => 'warnign',
                    'info' => 'No se puede eliminar el registro por que ya está relacionado.'
                ]);
            } else {
                User::destroy($id);
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
