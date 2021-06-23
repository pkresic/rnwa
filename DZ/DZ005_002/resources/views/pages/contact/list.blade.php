@extends('layout.app')
@section('content')
    @foreach($contacts as $contact)
        <p>
            {{$contact->ContactID . " " . $contact->FirstName}}
            <a href='{{route('contact.details', ['id' => $contact->ContactID])}}'>Details</a>
        </p>
    @endforeach
@endsection
