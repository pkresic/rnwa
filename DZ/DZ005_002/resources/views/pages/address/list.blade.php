@extends('layout.app')
@section('content')
    @foreach($addresses as $address)
        <p>
            {{$address->AddressID . "" . $address->AddressLine1}}
            <a href='{{route('address.details', ['id' => $address->AddressID])}}'>Details</a>
        </p>
    @endforeach
@endsection
