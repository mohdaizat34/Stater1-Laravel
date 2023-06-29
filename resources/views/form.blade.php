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
                    <table class="table">
                       <a href = '/event'> <button class = "btn btn-danger"> Back </button> <br><br> </a> 
                
                

                         <!-- 1. Event Name, 2. Event Date, 3. Venue, 4. Event Description  5.PP name, 6. Lecturer involved    -->

                        <form class="form" method="POST" action="{{ route('submitevent') }}">
                            @csrf
                            
                            <label> Event Name </label>
                            <input type="text" class="form-control" name="name">  <br><br><br>

                            <label> Event Director </label>
                            <input type="text" class="form-control" name="director">  <br><br>
                        
                            <label> Event Date </label>
                            <input type="date"class="form-control"  id="eventDate" name="date">  <br><br><br> 

                            <label> Event Venue </label>
                            <input type="text" class="form-control" name="venue">  <br><br><br>

                            <label> Event Description </label>
                            <textarea id="event_desc" class="form-control" name="desc" rows="4" cols="50"></textarea> <br><br><br>
                            
                            <button type="submit" class="btn btn-success" > Submit </button> 
                        </form> 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection