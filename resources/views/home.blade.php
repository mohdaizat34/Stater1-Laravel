@extends('layouts.app')

@section('style')
    
@endsection

@section('script')

@endsection

@section('content')
<div class="col-lg-8">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h5 class="m-0">Dashboard</h5>
        </div>
        <div class="card-body">
            <h6 class="card-title">You have logged in! <br> Welcome {{ auth()->user()->name }} </h6> <br><br><br>
            @if  (auth()->user()->role == "admin")
                <label> You're the secretary for PKP. </label> 
                <p class="card-text">
                    On the side bar, you can choose several options. You can <b>add/edit/delete</b>  paperwork for the event! 
                </p>
            @elseif (auth()->user()->role == "hepa")
                <label> You're HEPA/Advisor for PKP. </label> 
                <p class="card-text">
                    On the side bar, you can choose several options. You can <b>approve or reject</b>  paperwork for the event! 
                </p>
            @else    
                <label> You're a member of PKP. </label> 
                <p class="card-text">
                    On the side bar, you can choose several options. You can <b>view</b>  paperwork related for the event! 
                </p>
            @endif 
            {{-- <a href="#" class="btn btn-primary float-right">Go Example</a> --}}
        </div>
    </div>
</div>
@endsection
{{-- {{ $userdata->name }} --}}