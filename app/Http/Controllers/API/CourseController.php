<?php

namespace App\Http\Controllers\API;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Constants\PermissionConstant;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    function index()
    {
        if (Auth::user()->can(PermissionConstant::VIEW_COURSE)) {
            $courses = Course::all();
            return response()->json($courses, 200);
        } else {
            return response()->json([
                "message" => "Permission Denied"
            ], 403);
        }
    }
    function store(Request $request)
    {

        if (Auth::user()->can(PermissionConstant::CREATE_COURSE)) {

            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'price' => 'required',
                'start_date' => 'required',
                'teacher_id' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->messages();
                $messsage = implode(", ", $errors->all());
                return response()->json([
                    "message" => $messsage
                ], 400);
            }

            $course = Course::create([
                Course::TITLE => $request->title,
                Course::PRICE => $request->price,
                Course::START_DATE => $request->start_date,
                Course::END_DATE => $request->end_date,
                Course::USER_ID => $request->teacher_id,
                Course::DESCRIPTION => $request->description
            ]);

            return response()->json($course, 201);
        } else {
            return response()->json([
                "message" => "Permission Denied"
            ], 403);
        }
    }

    public function update(Request $request, $id)
    {
        if (!Auth::user()->can(PermissionConstant::EDIT_COURSE)) {
            return response()->json([
                "message" => "Permission Denied"
            ], 403);
        }
        $course = Course::find($id);
        if ($course) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'price' => 'required',
                'start_date' => 'required',
                'teacher_id' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->messages();
                $messsage = implode(", ", $errors->all());
                return response()->json([
                    "message" => $messsage
                ], 400);
            }

            $course = Course::where(Course::ID, $id)->update([
                Course::TITLE => $request->title,
                Course::PRICE => $request->price,
                Course::START_DATE => $request->start_date,
                Course::END_DATE => $request->end_date,
                Course::USER_ID => $request->teacher_id,
                Course::DESCRIPTION => $request->description
            ]);


            return response()->json([
                "message" => "Update Successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Course not found"
            ], 404);
        }
    }

    function delete($id)
    {
        if (!Auth::user()->can(PermissionConstant::REMOVE_COURSE)) {
            return response()->json([
                "message" => "Permission Denied"
            ], 403);
        }
        $course = Course::find($id);
        if ($course) {
            $course->delete();
            return response()->json([
                "message" => "Course remove successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Course not found"
            ], 404);
        }
    }

    public function show($id)
    {
        if (!Auth::user()->can(PermissionConstant::VIEW_COURSE)) {
            return response()->json([
                "message" => "Permission Denied"
            ], 403);
        }
        $course = Course::find($id);
        if ($course) {
            return response()->json($course, 200);
        } else {
            return response()->json([
                "message" => "Course not found"
            ], 404);
        }
    }
}
