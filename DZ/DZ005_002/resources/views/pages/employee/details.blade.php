@extends('layout.app')
@section('content')
    <p>This is detailed view of Employee:</p>

    <p>ID: {{$employee->EmployeeID}}</p>
    <p>Contact ID: {{$employee->ContactID}}</p>
    <p>Full
        name: {{$employee->contact->Title}} {{$employee->contact->FirstName}} {{$employee->contact->MiddleName}} {{$employee->contact->LastName}}</p>
    <p>Birth date: {{$employee->BirthDate}}</p>
    <p>Department history:</p>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Group</th>
        </tr>
        </thead>
        <tbody>
        @foreach($employee->department_history as $department)
            <tr>
                <td>{{$department->Name}}</td>
                <td>{{$department->GroupName}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
