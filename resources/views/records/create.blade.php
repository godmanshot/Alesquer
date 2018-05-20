@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Новая запись</div>

                <div class="card-body">
                    
                    @include('records.form')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
