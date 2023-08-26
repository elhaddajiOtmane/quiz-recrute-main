@extends('layouts.app')

@section('content')
    <h1>Cover Letter for {{ $candidate->first_name }} {{ $candidate->last_name }}</h1>

    <!-- Display cover letter content here -->
    <!-- You can embed or display the cover letter file content as needed -->
@endsection
