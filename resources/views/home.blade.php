@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <br>
                <a href="<?= url('csv_file'); ?>">Click Here to Export/Import bulk list of products in CSV File</a>
                <br>
                <a href="<?= url('products'); ?>">Click Here to see product list in table</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
