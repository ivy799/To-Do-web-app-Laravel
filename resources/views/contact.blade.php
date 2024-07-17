@extends('layout')
@section('content')
    <h1>Daftar Kontak</h1>
    <ul>
        @foreach($contacts as $contact)
            <li>
                <h2>{{ $contact->nama }}</h2>
                <p>{{ $contact->email }}</p>
            </li>
        @endforeach
    </ul>
@endsection
