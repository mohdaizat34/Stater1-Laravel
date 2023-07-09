@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{-- <a class="btn btn-success" href="{{ route('book.create') }}"> Create New</a> --}}
                </div>

                <div class="card-body">
                    <a href="/picreport">
                        <button class="btn btn-danger">Back</button>
                    </a>
                    <br><br>
                        <form class="form" method="POST" action="{{ url('update_link/'.$event->event_id) }}">
                            @csrf
                            @method('PUT')
                            <label>Link</label>
                            <input type="text" class="form-control" name="link" value = {{$event->event_link}}> <br><br>

                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
