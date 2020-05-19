@extends('base')

@section('main')


<div class="col-8 mx-auto">
    <h6 class="text-center">Our Employees</h6>
    <div class="container">
        <div class="my-2">
            <a class="btn btn-success" href="{{route('Employee.create')}}">Create</a>
        </div>
        <table class="table table-stripped">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>salary</th>
                    <th>Role</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Employees as $Employee)
                <tr>
                    <td>{{ $Employee-> first_name}} {{ $Employee-> last_name }}</td>
                    <td>{{ $Employee-> email}}</td>
                    <td>{{ $Employee-> salary}}</td>
                    <td>{{ $Employee-> role}}</td>
                    <td>
                        <a href="{{route('Employee.edit',$Employee->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('Employee.destroy',$Employee->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection