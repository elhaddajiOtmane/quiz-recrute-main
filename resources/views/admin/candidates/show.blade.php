@extends('layouts.app')

@section('content')
    <h1>Candidate Details</h1>

    <p><strong>Name:</strong> {{ $candidate->first_name }} {{ $candidate->last_name }}</p>
    <!-- Display other candidate details -->

    <h2>Files</h2>
    <p><strong>CV:</strong> <a href="{{ $cvUrl }}" target="_blank">View CV</a></p>
    <p><strong>Cover Letter:</strong> <a href="{{ $coverLetterUrl }}" target="_blank">View Cover Letter</a></p>
@endsection
