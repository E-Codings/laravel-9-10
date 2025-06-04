<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

use function Laravel\Prompts\search;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::user()->hasPermissionTo('view users')) {
            $search = $request->search;
            $page = $request->page;
            $total = ($page - 1) * 5;
            if ($search) {
                $teachers = User::where(User::FIRST_NAME, 'like', '%' . $search . '%')
                    ->orWhere(User::LAST_NAME, 'like', '%' . $search . '%')
                    ->offset($total)
                    ->limit(5)
                    ->get();
                $total_pages = User::where(User::FIRST_NAME, 'like', '%' . $search . '%')
                    ->orWhere(User::LAST_NAME, 'like', '%' . $search . '%')
                    ->count(User::ID);

                $total_pages = ceil($total_pages /  5);
            } else {
                $total_pages = ceil(User::count(User::ID) / 5);
                $teachers = User::offset($total)->limit(5)->get();
            }

            return view('teacher.index', compact('teachers', 'total_pages'));
        } else {
            // abort(401);
            return back()->with('Error', "Permission denied");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->can('create users')) {
            return view('teacher.create');
        } else {
            return back()->with('Error', "Permission denied");
        }
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

        if ($validator->fails()) {
            $errors = $validator->messages();
            $messsage = implode(", ", $errors->all());
            return back()->with("Error", $messsage);
        }

        $user = User::create([
            User::FIRST_NAME => $request->first_name,
            User::LAST_NAME => $request->last_name,
            User::GENDER => $request->gender,
            User::PROFILE => $request->profile_name,
            User::EMAIL => $request->email,
            User::PASSWORD => $request->password,
            User::CREATED_BY => 1,
        ]);

        $user->assignRole('employee');

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
    public function edit($id)
    {
        $user = User::find($id);
        return view('teacher.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            "first_name" => ['required', 'min:2', 'max:10'],
            "last_name" => ['required', 'min:2', 'max:10'],
            "gender" => ['required', 'min:4', 'max:6'],
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        ]);

        if ($validator->fails()) {
            $errors = $validator->messages();
            $messsage = implode(", ", $errors->all());
            return back()->with("Error", $messsage);
        }

        $user = User::find($id);
        if ($user) {
            $user = User::where('id', $user->id)->update([
                User::FIRST_NAME => $request->first_name,
                User::LAST_NAME => $request->last_name,
                User::GENDER => $request->gender,
                User::PROFILE => $request->profile_name,
                User::EMAIL => $request->email,
            ]);
        }

        return back()->with('Success', "Teacher updated success");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $user = User::find($request->id);
        if ($user) {
            User::where('id', $request->id)->delete();
            $search = $request->search;
            $page = $request->page;
            $total = ($page - 1) * 5;
            if ($search) {
                $teachers = User::where(User::FIRST_NAME, 'like', '%' . $search . '%')
                    ->orWhere(User::LAST_NAME, 'like', '%' . $search . '%')
                    ->offset($total)
                    ->limit(5)
                    ->get();
                $total_pages = User::where(User::FIRST_NAME, 'like', '%' . $search . '%')
                    ->orWhere(User::LAST_NAME, 'like', '%' . $search . '%')
                    ->count(User::ID);

                $total_pages = ceil($total_pages /  5);
            } else {
                $total_pages = ceil(User::count(User::ID) / 5);
                $teachers = User::offset($total)->limit(5)->get();
            }

            return response()->json(
                [
                    "message" => "Teacher remove success",
                    "status" => 200, 'data' => $teachers,
                    'total_page' => $total_pages
                ]);
        } else {
            return response()->json(["message" => "Teacher not found", "status" => 404]);
        }
    }
}
