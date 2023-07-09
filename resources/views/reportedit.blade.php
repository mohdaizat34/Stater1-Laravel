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
                    <a href="/report">
                        <button class="btn btn-danger">Back</button>
                    </a>
                    <br><br>
                        <form class="form" method="POST" action="{{ url('update_report_link/'.$event->event_id) }}">
                            @csrf
                            @method('PUT')
                            <label>Link</label>
                            <input type="text" class="form-control" name="post_link" value = {{$event->event_post_link}}> <br><br>

                            <p> Recommended for you to use this link to create direct download URL from GDrive for user to print easier:<p> 
                            <a href="https://sites.google.com/site/gdocs2direct/">https://sites.google.com/site/gdocs2direct/</a><br><br> 
                            <button type="submit" class="btn btn-success">Update</button>
                        </form>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
