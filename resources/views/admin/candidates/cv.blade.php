@extends('layouts.app')

@section('content')
    <h1>CV for {{ $candidate->first_name }} {{ $candidate->last_name }}</h1>


    <!-- Display CV content here -->
    <embed src="{{ asset('storage/' . $candidate->CV) }}" type="application/pdf" width="100%" height="600px">

    


@endsection


