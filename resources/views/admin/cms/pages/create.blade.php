@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pages</div>

                <div class="card-body">
                    <form action="/pages" method="POST">
                        @csrf
                        <div class="form-group row">
                          <label for="slug" class="col-sm-2 col-form-label">Slug:</label>
                          <div class="col-sm-2">
                            <input type="text" name="slug" class="form-control" id="name" required>
                          </div>
                          <label for="name" class="col-sm-2 col-form-label">Page Name:</label>
                          <div class="col-sm-6">
                            <input type="text" name="name" class="form-control" id="name" required>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Page</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
