<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="containern mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><a href="{{ route('courses.index') }}" class="btn btn-success">Manage
                            Course</a></div>
                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <form action="{{ route('courses.update', $editdata->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Course Name</label>
                                <input type="text" name='c_name' class="form-control"
                                    value="{{ $editdata->c_name }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                @if ($editdata->status == 0)
                                    <input type="radio" name="status" value="1"> Active
                                    <input type="radio" name="status" checked value="0">In-Active
                                @else
                                    <input type="radio" name="status" value="1">Active
                                    <input type="radio" name="status" checked value="0">In-Active
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="image">Profile</label>
                                <input type="file" name="image" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-success my-3" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
