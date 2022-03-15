<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Enroll Student Into Course</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('student-courses.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Select Student </label>
                                <select class="form-select" aria-label="Default select example" name="student_id">
                                    <option>----Students----</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->s_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Course </label><br/>
                                @foreach ($courses as $course)
                                    <input type="checkbox" name="course_id[]" value="{{ $course->id }}"> {{ $course->c_name }} <br/>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-success" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
