@extends('layouts.master')

@section('title')
	Edit a Show
@endsection

@section('sidebar')

    <div class='container text-center'>
        
        <h1>Edit This Show</h1>
        <div class='details'>* Required fields</div>

        <form method='POST' action='/ucshow/{{ $show->id }}'>

            {{ method_field('put') }}
            {{ csrf_field() }}

            <div class='form-group row'>
                <label for='city' class='col-sm-2 col-form-label'>City Where You Want to Play *</label>
                <div class='col-sm-5'>
                    <input type='text' class ='form-control' name='city' id='city' value='{{ old("city", $show->city) }}'>
                </div>
            </div>

            <div class='form-group row'>
                <label for='tier' class='col-sm-2 col-form-label'>* What Tier of Importance is this Show?</label>
                <div class='col-sm-5'>
                    <select class ='form-control' name='tier' id='tier' value='{{ old("tier", $show->tier) }}'>
                        <option value= 1 >1 (most important)</option>
                        <option value= 2 >2</option>
                        <option value= 3 >3 (least important)</option>
                    </select>
                </div>                
            </div>

            @include('modules.date')

            <input type='submit' value='Save Changes' class='btn btn-primary btn-small'>
        </form>
    </div>
@endsection