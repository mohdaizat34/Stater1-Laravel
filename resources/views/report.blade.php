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
                                <th scope="col" hidden>Date</th>
                                <th scope="col" hidden>Venue</th>
                                <th scope="col" hidden>Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($report as $item)
                                <tr>
                                    <td>{{ $item->event_id }}</td>
                                    <td>{{ $item->event_name }}</td>
                                    <td>{{ $item->event_director }}</td>
                                    <td hidden>{{ $item->event_venue }}</td>
                                    <td hidden>{{ $item->event_date }}</td>
                                    <td hidden>{{ $item->event_desc }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href={{ $item->event_post_link }}><button class="btn btn-secondary btn-sm" id="" style="margin-right:10px;">View Report</button>
                                            @if (auth()->user()->role == "admin")
                                                <a href="{{ url('edit_report_link/'.$item->event_id) }}"> <button class="btn btn-success btn-sm" style="margin-right:10px;"> Add Link </button> </a>
                                            @endif  
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewcomp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                    <b><label class="labelid">Event ID: &nbsp;</label></b><br>
                    <a id="labelid"> &nbsp;</a><br><br>

                    <b><label class="labelname">Event Name: &nbsp;</label></b><br>
                    <a id="labelname"> &nbsp;</a><br><br>

                    <label class="labelDirector">Event Director: &nbsp;</label><br>
                    <a id="labeldirector"> &nbsp; </a><br><br>

                    <label class="labelvenue">Event Venue: &nbsp;</label><br>
                    <a id="labelvenue"> &nbsp; </a><br><br>

                    <label class="labeldate">Event Date: &nbsp;</label><br>
                    <a id="labeldate"> &nbsp;</a><br><br>

                    <label class="labeldate">Event Description: &nbsp;</label><br>
                    <a id="labeldesc"> &nbsp; </a><br><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.view_button').on('click', function () {
            $('#viewcomp').modal('show');

            var $tr = $(this).closest('tr');
            var data = $tr.find("td").map(function () {
                return $(this).text();
            }).get();

            document.getElementById("labelid").innerHTML = data[0];
            document.getElementById("labelname").innerHTML = data[1];
            document.getElementById("labeldirector").innerHTML = data[2];
            document.getElementById("labelvenue").innerHTML = data[3];
            document.getElementById("labeldate").innerHTML = data[4];
            document.getElementById("labeldesc").innerHTML = data[5];
        });

        // Print function
        $('#printButton').on('click', function () {
            window.print();
        });
    });
</script>

@endsection
