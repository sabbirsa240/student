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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    <div class="card-header"><a href="{{ route('students.index') }}" class="btn btn-success">Manage
                            course</a></div>
                    <div class="card-body">
                        <form action="{{ route('students.update', $editData->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Student name</label>
                                <input type="text" name="s_name" class="form-control"
                                    placeholder="input your name" value="{{ $editData->s_name }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="input your number"
                                    value="{{ $editData->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="input your email"
                                    value="{{ $editData->email }}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                @if ($editData->status == '0')
                                    <input type="radio" name="status"  value="1"> Active
                                    <input type="radio" name="status" checked value="0"> In-Active
                                @else
                                    <input type="radio" name="status" checked value="1">Active
                                    <input type="radio" name="status" value="0">In-Active
                                @endif
                            </div>
                            {{-- <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="text" name="image" class="form-control">
                            </div> --}}
                            <div class="form-group">
                                <img src="{{ asset('student/images/' . $editData->image) }}"
                                    style="height: 50px; weidth:50px;">
                            </div>
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
