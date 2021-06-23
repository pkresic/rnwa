@extends('layout.app')
@section('content')
    <p>This is detailed view of Contacts:</p>

    <p>ID: {{$contact->ContactID}}</p>
    <p>Full name: {{$contact->Title}} {{$contact->FirstName}} {{$contact->MiddleName}} {{$contact->LastName}}</p>
    <p>Phone: {{$contact->Phone}}</p>
    <p>Email: {{$contact->EmailAddress}}</p>
@endsection
