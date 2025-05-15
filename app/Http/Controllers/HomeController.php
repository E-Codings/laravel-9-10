<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('index');
    }

    /**
     * upload file that request from ajax
     * @param $request, request file when submit
     * @return string, file uploaded
     */
    public function uploadFile(Request $request){
        $validated = $request->validate([
            'profile' => 'required|file|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $profile = $request->file('profile');
        $profileName = date('dmy-H-i-s').'_'.$profile->getClientOriginalName();
        $path = 'assets/images/teacher';
        $profile->move($path, $profileName);

        return response()->json($profileName);
    }

    public function migrate(){
        Artisan::call("migrate");
        return back()->with('Success', "All the new tables created");
    }
}
