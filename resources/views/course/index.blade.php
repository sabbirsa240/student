<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><a href="{{ route('courses.create') }}" class="btn btn-success">Add
                            course</a></div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Course name</th>
                                        <th>Course status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courseInfo as $i => $courses)
                                        <tr>
                                            <td>{{ $courses->c_name }}</td>
                                            <td>
                                                @if ($courses->status == '0')
                                                    In-Active
                                                @else
                                                    Active
                                                @endif
                                            </td>
                                            <td>
                                                <form action="{{ route('courses.destroy', $courses->id) }}"
                                                    method="post">
                                                    <a href="{{ route('courses.edit', $courses->id) }}"
                                                        class="btn btn-success">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('are you sure want to delete')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
