@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Director</th>
                                <th scope="col">Pictorial Report Link</th>
                                <th scope="col" hidden>Date</th>
                                <th scope="col" hidden>Venue</th>
                                <th scope="col" hidden>desc</th>
                                <th scope="col" width="24%">Action</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach ($picreport as $picreport)
                                <tr>
                                    {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                    <td >{{ $picreport->event_id }}</td>
                                    <td >{{ $picreport->event_name }}</td>
                                    <td >{{ $picreport->event_director }}</td>
                                    @if ( $picreport->event_link == "") 
                                        <td> No link </td>
                                    @else 
                                        <td><a href={{ $picreport->event_link }}>Link</td>
                                    @endif 
                                    
                                    <td hidden>{{ $picreport->event_venue }}</td>
                                    <td hidden>{{ $picreport->event_date }}</td>
                                    <td hidden>{{ $picreport->event_desc }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="view_button btn btn-primary btn-sm" id="view_button" style="margin-right:10px;" >View</button>
                                                @if  (auth()->user()->role == "admin")
                                                    <a href = {{ url('edit_link/'.$picreport->event_id) }}> <button class="btn btn-secondary btn-sm" style="margin-right:10px;"> Edit Link </button>
                                                @endif
                                        </div>         
                                        
                                    </td>

                                </tr>
        
                             @endforeach
                        </tbody>    

                        
                        
                        
                        <div class="modal fade" id="viewcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="exampleModalLabel">View Event</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <b><label class = "labelid">Event ID: &nbsp;</label></b> <br> 
                                        <a id = "labelid">  &nbsp;</a> <br><br> 

                                        <b><label class = "labelname">Event Name: &nbsp;</label></b> <br> 
                                        <a id = "labelname"> &nbsp;</a> <br><br> 

                                        <label class = "labelDirector">Event Director: &nbsp;</label> <br> 
                                        <a id = "labeldirector">  &nbsp; </a><br><br> 

                                        <label class = "labelvenue">Event Venue: &nbsp;</label> <br> 
                                        <a id = "labelvenue">  &nbsp; </a><br><br> 

                                        <label class = "labeldate">Event Date: &nbsp;</label> <br> 
                                        <a id = "labeldate">  &nbsp;</a> <br><br> 

                                        <label class = "labeldate">Event Description: &nbsp;</label> <br> 
                                        <a id = "labeldesc">  &nbsp; </a> <br><br> 

                                        <label class = "labeldate">Event Pictorial Report Link: &nbsp;</label> <br> 
                                        <a id = "labellink">  &nbsp; </a> <br><br> 

                

                                        {{-- <label class = "labelstatus" id="status" style="font-size: 20px;">Status</label> --}}
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>

                         <!-- 1. Event Name, 2. Event Date, 3. Venue, 4. Event Description  5.PP name, 6. Lecturer involved    -->

                        {{-- <form class="form" method="POST" action="{{ route('submitevent') }}">
                            @csrf
                            
                            <label> Event Name </label>
                            <input type="text" class="form-control" name="name">  <br><br><br>

                            <label> Event Director </label>
                            <input type="text" class="form-control" name="name">  <br><br>
                        
                            <label> Event Date </label>
                            <input type="date"class="form-control"  id="eventDate" name="eventDate">  <br><br><br> 

                            <label> Event Venue </label>
                            <input type="text" class="form-control" name="name">  <br><br><br>

                            <label> Event Description </label>
                            <textarea id="w3review" class="form-control" name="w3review" rows="4" cols="50"></textarea> <br><br><br>
                                <button type="submit" > woi </button> 
                        </form> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('.view_button').on('click', function(){
        
        $('#viewcomp').modal('show');

        $tr =$(this).closest('tr');
        var data= $tr.children("td").map(function(){
          return $(this).text();
        }).get();

       // alert(data[0]); 
        document.getElementById("labelid").innerHTML = data[0];
        document.getElementById("labelname").innerHTML = data[1];
        document.getElementById("labeldirector").innerHTML = data[2];
        document.getElementById("labelvenue").innerHTML = data[3];
        document.getElementById("labeldate").innerHTML = data[4];
        document.getElementById("labeldesc").innerHTML = data[5];
        document.getElementById("labellink").innerHTML = data[6];

        //document.getElementById("labelvenue").innerHTML = data[4];
    });

</script>

@endsection
