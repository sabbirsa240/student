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
                    <div class="card-header"><a href="{{ route('courses.index') }}" class="btn btn-success">Manage
                            course</a></div>
                    <div class="card-body">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <form action="{{ route('courses.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Course name</label>
                                <input type="text" name="c_name"
                                    class="form-control @error('c_name') is-invalid @enderror">

                                @error('c_name')
                                    <span class="invalid-feedback" role="alert">
                                        <label for="" style="color: red">{{ $message }}</label>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="radio" name="status" value="1"> Active |
                                <input type="radio" name="status" value="0"> In-Active

                                {{-- @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <label for="" style="color:red">{{ $message }}</label>
                                    </span>
                                @enderror --}}
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
