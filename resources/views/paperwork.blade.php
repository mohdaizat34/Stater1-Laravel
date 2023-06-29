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
                            <label> Event Name </label>
                            <p class="font-weight-bold">{{$data['name']}} </p>

                            <label> Event Director </label>
                          
                        
                            <label> Event Date </label>
                         

                            <label> Event Venue </label>
                      

                            <label> Event Description </label>

                   
                            
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection