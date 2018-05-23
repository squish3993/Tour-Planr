@extends('layouts.master')

@push('head')

@endpush

@section('title')
    Confirm deletion
@endsection

@section('sidebar')
    <div class="container text-center">
        <h1>Confirm deletion</h1>

        <p>Are you sure you want to delete the venue <strong>{{ $venue->name }}</strong> from the database?</p>


        <form method='POST' action='/venues/{{ $venue->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
        </form>

        <p class='cancel'>
            <a href='/venues'>No, I changed my mind.</a>
        </p>
    </div>
@endsection