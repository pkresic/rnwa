@extends('layout.app')
@section('content')
    @foreach($departments as $department)
        <p>
            {{$department->DepartmentID . " " . $department->Name}}
            <a href='{{route('department.details', ['id' => $department->DepartmentID])}}'>Details</a>
        </p>
    @endforeach
@endsection
