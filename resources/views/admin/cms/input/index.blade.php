@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Types</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($inputs as $input)
                            <div class="col-md-9">
                                {{ $input->input_type }}
                            </div>
                        
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
