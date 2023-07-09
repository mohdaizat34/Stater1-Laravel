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
                                <th scope="col">Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Remark</th>
                                <th scope="col" hidden>Venue</th>
                                <th scope="col" hidden>desc</th>
                            </tr>

                        </thead> 
                        <tbody>
                            @foreach ($statusapproval as $statusapproval)
                                <tr>
                                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                                        <td >{{ $statusapproval->event_id }}</td>
                                        <td >{{ $statusapproval->event_name }}</td>
                                        <td >{{ $statusapproval->event_director }}</td>
                                        <td >{{ $statusapproval->event_date }}</td>
                                    
                                    
                                
                                    @if  (auth()->user()->role == "admin")
                                    
                            
                                        <td>  
                                            @if ($statusapproval->event_status == "approve") 
                                                <b><label style="color:rgb(0, 168, 14);">Approved &nbsp;</label></b> <br> 
                                            @elseif ($statusapproval->event_status == "reject") 
                                                <b><label style="color:rgb(255, 9, 9);">Rejected &nbsp;</label></b> <br>
                                            @else 
                                            <b><label style="color:rgb(241, 169, 0);">Pending &nbsp;</label></b> <br>
                                            @endif
                                        </td>

                                        <td> {{ $statusapproval->event_remark }} </td>



                                    @elseif (auth()->user()->role == "hepa")
                                        
                                        <form class="form" method="POST" action="update_status{{ $statusapproval->event_id }}">
                                            @csrf
                                            <td>  
                                                @if ($statusapproval->event_status == "approve") 
                                                    <b><label style="color:rgb(0, 168, 14);">Approved &nbsp;</label></b> <br> 
                                                @elseif ($statusapproval->event_status == "reject") 
                                                    <b><label style="color:rgb(255, 9, 9);">Rejected &nbsp;</label></b> <br>
                                                @else 
                                                    <select name="status" id="status">
                                                        <option value="approve" >Approve</option>
                                                        <option value="reject">Reject</option>
                                                    </select> 
                                                @endif
                                            </td>

                                            <td>
                                                @if ($statusapproval->event_status == "approve" || $statusapproval->event_status == "reject" )   
                                                    {{ $statusapproval->event_remark }}
                                                @else 
                                                    <input type="text" id="remark" class="form-control" name="remark" placeholder="(Optional)"> <br> 
                                                    <button class="btn btn-success" id="view_button" >Submit</button> 
                                                @endif                                      
            
                                            </td>

                                        </form>         
                                    @endif 
                                </tr>
                             @endforeach
                        </tbody>    

                        
                        
                        

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

        //document.getElementById("labelvenue").innerHTML = data[4];
    });

</script>

@endsection