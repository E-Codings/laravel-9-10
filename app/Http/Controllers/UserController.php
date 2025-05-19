<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = User::all();
        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "first_name" => ['required', 'min:2', 'max:10'],
            "last_name" => ['required', 'min:2', 'max:10'],
            "gender" => ['required', 'min:4', 'max:6'],
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'password' => ['required', Password::min(8)],
        ]);

        if($validator->fails()){
            $errors = $validator->messages();
            $messsage = implode(", ", $errors->all());
            return back()->with("Error", $messsage);
        }

        User::create([
            User::FIRST_NAME => $request->first_name,
            User::LAST_NAME => $request->last_name,
            User::GENDER => $request->gender,
            User::PROFILE => $request->profile_name,
            User::EMAIL => $request->email,
            User::PASSWORD => $request->password,
            User::ROLE => 2,
            User::CREATED_BY => 1,
        ]);

        return back()->with('Success', "Teacher created success");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
