@extends('layouts.layout')

@section('header')
    Dashboard
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    Hey! you are admin.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
