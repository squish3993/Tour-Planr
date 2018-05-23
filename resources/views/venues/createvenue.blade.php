@extends('layouts.master')

@section('title')
	Create an Uncfirmed Show
@endsection

@section('sidebar')

	<div class='container text-center'>
    
        <h1>Add a Venue</h1>
        <div class='details'>* Required fields</div>

        <form method='POST' action='/venues'>

            {{ csrf_field() }}

            <div class='form-group row'>
                <label for='name' class='col-sm-2 col-form-label'>Name of the Venue *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='name' id='name'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='city' class='col-sm-2 col-form-label'>City where the Venue is Located? *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='city' id='city'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='address' class='col-sm-2 col-form-label'>Address of the Venue *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='address' id='address'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='capacity' class='col-sm-2 col-form-label'>Capacity of the Venue</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='capacity' id='capacity'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='booking' class='col-sm-2 col-form-label'>Any Contact info for ther Venue</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='booking' id='booking'>
                </div>
            </div>

            <input type='submit' value='Add Venue' class='btn btn-primary btn-small'>
        </form>
    </div>


@endsection