<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Course;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courseInfo = Course::all();
        return view('course.index',compact('courseInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'c_name' => 'required',
            'status' => 'required',
        ],[
            'c_name.required' => 'must be input',
            'status.required' => 'must be input'
        ] );

        $courses = new Course();
        $courses->c_name = $request->c_name;
        $courses->status = $request->status;
        $courses->save();

        // return $courses;
        return redirect()->route('courses.index')->with('success', 'data successfully save');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editdata = Course::find($id);
        return view('course.edit',compact('editdata'));
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
        $this->validate($request,[
            'c_name'  => 'required',
            'status'  => 'required',
        ],[
            'c_name.required'  => 'must be input',
            'status.required'  => 'must be input',
        ]);

        $courses = Course::find($id);
        $courses->c_name = $request->c_name;
        $courses->status = $request->status;
        $courses->save();

        return redirect()->route('courses.index')->with('success', 'data successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Course::find($id);
        $deleteData->delete();
        return back()->with('success', 'data delete successfully');
    }
}
