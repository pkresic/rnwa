@extends('layout.app')
@section('content')
    <p>This is detailed view of Addresses:</p>

    <p>ID: <b>{{$address->AddressID}}</b></p>
    <p>Address Line: {{$address->AddressLine1}}</p>
    <p>City: {{$address->City}}</p>
    <p>Postal Code: {{$address->PostalCode}}</p>
@endsection
