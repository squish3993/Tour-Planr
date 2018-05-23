@extends('layouts.master')

@section('title')
	Edit a Venue
@endsection

@section('sidebar')

    <div class='container text-center'>
        
        <h1>Edit This Venue</h1>
        <div class='details'>* Required fields</div>

        <form method='POST' action='/venues/{{ $venue->id }}'>

            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class='form-group row'>
                <label for='name' class='col-sm-2 col-form-label'>Name of the Venue *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='name' id='name' value='{{ old("name", $venue->name) }}'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='city' class='col-sm-2 col-form-label'>City where the Venue is Located? *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='city' id='city' value='{{ old("city", $venue->city) }}'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='address' class='col-sm-2 col-form-label'>Address of the Venue *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='address' id='address' value='{{ old("address", $venue->address) }}'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='capacity' class='col-sm-2 col-form-label'>Capacity of the Venue (Must be an Integer - Leave Blank if Unknown)</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='capacity' id='capacity' value='{{ old("capacity", $venue->capacity) }}'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='booking' class='col-sm-2 col-form-label'>Any Contact info for ther Venue</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='booking' id='booking' value='{{ old("booking", $venue->booking) }}'>
                </div>
            </div>

            <input type='submit' value='Save Changes' class='btn btn-primary btn-small'>
        </form>
    </div>
@endsection