@extends('layout.app')
@section('content')
    @foreach($employees as $employee)
        <p>
            {{$employee->LoginID}}, {{$employee->contact->FirstName}} {{$employee->contact->LastName}}
            <a href='{{route('employee.details', ['id' => $employee->EmployeeID])}}'>Details</a>
            <a href='{{route('employee.delete', ['id' => $employee->EmployeeID])}}'>Delete</a>
        </p>
    @endforeach
@endsection
