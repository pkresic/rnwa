@extends('layout.app')
@section('content')
    <p>This is detailed view of Departments:</p>

    <p>ID: {{$department->DepartmentID}}</p>
    <p>Department name: {{$department->Name}}</p>
    <p>Group name: {{$department->GroupName}}</p>
@endsection
