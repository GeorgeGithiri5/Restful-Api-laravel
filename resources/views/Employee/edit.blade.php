@extends('base')
@section('main')

<div class="col-8 mx-auto">
    <h5 class="mt-4 text-center">Create New Employee Details</h5>
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
            <ul>
                <li>{{ $error }}</li>
            </ul>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{route('Employee.update',$Employees->id)}}" >
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label>First Name:</label>
            <input class="form-control" name="first_name"/>
        </div>
        <div class="form-group">
            <label>Last Name:</label>
            <input class="form-control" name="last_name"/>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label>Salary:</label>
            <input class="form-control" name="salary"/>
        </div>
        <div class="form-group">
            <label>Role:</label>
            <input class="form-control" name="role"/>
        </div>
        <button class="btn btn-dark" type="submit">Submit</button>
    </form>
</div>

@endsection