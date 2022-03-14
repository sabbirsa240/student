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
                    <div class="card-header"><a href="{{ route('students.create') }}" class="btn btn-success">Add
                            Student</a></div>
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
                                        <th>#</th>
                                        <th>Student name</th>
                                        <th>Phone number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Picture</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentInfo as $i => $students)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $students->s_name }}</td>
                                            <td>{{ $students->phone }}</td>
                                            <td>{{ $students->email }}</td>
                                            <td>
                                                @if ($students->status == '0')
                                                    In-Active
                                                @else
                                                    Active
                                                @endif
                                            </td>
                                            <td>
                                                <img src="{{ asset('student/images/' . $students->image) }}"
                                                    style="height: 50px; weidth:50px;">
                                                {{-- <a href="{{ asset('student/images/'.$students->image) }}" target="_blank">{{ $students->image }} </a> --}}
                                            </td>

                                            <td>
                                                <form action="{{ route('students.destroy', $students->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <a href="{{ route('students.edit', $students->id) }}"
                                                        class="btn btn-info">Edit</a>
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('are you sure want to delete')"
                                                        class="btn btn-danger">Delete</button>
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
