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
                    <div class="card-header"><a href="{{ route('students.index') }}" class="btn btn-success">Manage
                            Student</a></div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Student name</label>
                                <input type="text" name="s_name"
                                    class="form-control @error('s_name') is-invalid @enderror"
                                    placeholder="enter your name">

                                @error('s_name')
                                    <span class="invalid-feedback" role="alert">
                                        <label for="" style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone number</label>
                                <input type="text" name="phone" placeholder="Enter your number"
                                    class="form-control @error('phone') is-invalid @enderror">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <label for="" style="color:red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter your email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <label for="" style="color:red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-2">
                                <label for="status">Status:</label>
                                <br>
                                <input type="radio" value="1" name="status" class="form-check-input"> Active
                                <br>
                                <input type="radio" value="0" name="status" class="form-check-input"> In-Active
                            </div>
                            <div class="form-group">
                                <label for="image">Profile</label>
                                <input type="file" name="image" class="form-control">
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
