@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $page->name }}</div>

                <div class="card-body">
                    <form action="/pages/{{ $page->id }}/sections/{{ $section->id }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                          <label for="name" class="col-sm-3 col-form-label">Section Name:</label>
                          <div class="col-sm-7">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $section->name }}">
                          </div>
                          <div class="col-sm-2">
                            <input type="text" name="slug" class="form-control" id="slug" placeholder="slug">
                          </div>
                          <div class="col-sm-2">
                            <input type="text" name="order" class="form-control" id="name" placeholder="order" value="{{ $section->order }}">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Section</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
