@extends('layout.app')
@section('content')
    @foreach($addresses as $address)
        <p>
            {{$address->AddressID . "" . $address->AddressLine1}}
            <a href='{{route('address.details', ['id' => $address->AddressID])}}'>Details</a>
            <a href='{{route('address.delete', ['id' => $address->AddressID])}}'>Delete</a>
        </p>
    @endforeach
@endsection
