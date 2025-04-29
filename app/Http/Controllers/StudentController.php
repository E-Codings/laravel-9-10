<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')->select('*')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'first_name' => 'required|min:2|max:10',
            'last_name' => 'required|min:2|max:10',
            'gender' => 'required|min:4|max:6',
            'course' => 'required',
            'phone_number' => 'required',
            'profile' => 'required|mimes:jpg,jpeg,png'
        ]);

        $profile = $request->file('profile');
        $profileName = date('d-m-y-h-i-s').'_'.$profile->getClientOriginalName();
        $path = 'images';
        $profile->move($path, $profileName);

        //insert is not have default value for timestamp
        DB::table('students')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'course' => $request->course,
            'phone' => $request->phone_number,
            'profile' => $profileName,
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return back()->with('success','created');
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
    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * open form delete
     * @param $id, id specific resource
     */
    public function modalDelete($id){
        return view('students.delete', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
