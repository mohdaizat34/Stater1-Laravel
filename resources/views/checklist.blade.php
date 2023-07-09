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
                    <form id="myForm">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Task</th>
                                    <th>Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Task 1</td>
                                    <td>
                                        <input type="checkbox" name="task1" value="Task 1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Task 2</td>
                                    <td>
                                        <input type="checkbox" name="task2" value="Task 2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Task 3</td>
                                    <td>
                                        <input type="checkbox" name="task3" value="Task 3">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-success" type="submit">Save</button>
                    </form>
                
                    <script>
                        document.getElementById('myForm').addEventListener('submit', function(e) {
                            e.preventDefault(); // Prevent form submission
                
                            var form = e.target;
                            var checkboxes = form.querySelectorAll('input[type="checkbox"]');
                
                            // Save the state of each checkbox
                            checkboxes.forEach(function(checkbox) {
                                localStorage.setItem(checkbox.name, checkbox.checked);
                            });
                
                            // Optional: Provide feedback to the user
                            alert('Checkbox states saved successfully!');
                        });
                
                        // Restore checkbox states on page load
                        window.addEventListener('load', function() {
                            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
                
                            checkboxes.forEach(function(checkbox) {
                                var savedState = localStorage.getItem(checkbox.name);
                                if (savedState === 'true') {
                                    checkbox.checked = true;
                                }
                            });
                        });
                    </script>
                </div>
                
                
            </div>
        </div>
    </div>
</div>


@endsection