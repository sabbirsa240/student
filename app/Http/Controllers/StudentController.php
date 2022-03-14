<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentInfo = Student::all();
        return view('student.index',compact('studentInfo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
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
            's_name'    => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'status'    => 'required',
            // 'image'     => 'required',
        ],[
            's_name.required'   => 'Name must be need',
            'phone.required'    => 'phone number must be need',
            'email.required'    => 'Email address must be need',
            'status.required'   => 'fill the status',
            // 'image.required'   =>  'optional',
        ]);

        $students = new Student();
        $students->s_name  = $request->s_name;
        $students->phone   = $request->phone;
        $students->email   = $request->email;
        $students->status  = $request->status;

        if($request->image == ''){
            //
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('student/images/', $fileName);
                $students->image = $fileName;
            } else {
                return $request;
                $students->image = '';
            }
        }
        $students->save();

        // return $students;
        return redirect()->route('students.index')->with('success','data successfully save');
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
        $editData = Student::find($id);
        return view('student.edit',compact('editData'));
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
            's_name'    => 'required',
            'phone'     => 'required',
            'email'     => 'required',
            'status'    => 'required',
            // 'image'     => 'required',
        ],[
            's_name.required'   => 'Name must be need',
            'phone.required'    => 'phone number must be need',
            'email.required'    => 'Email address must be need',
            'status.required'   => 'fill the status',
            // 'image.required'   =>  'optional',
        ]);

        $students = Student::find($id);
        $students->s_name  = $request->s_name;
        $students->phone   = $request->phone;
        $students->email   = $request->email;
        $students->status  = $request->status;

        if($request->image == ''){
            //
        }else{
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $extension;
                $file->move('student/images/', $fileName);
                $students->image = $fileName;
            } else {
                return $request;
                $students->image = '';
            }
        }
        $students->save();
        // return $students;
        return redirect()->route('students.index')->with('success','data successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData = Student::find($id);
        $deleteData->delete();
        return back()->with('success','data successfully delete');
    }
}
