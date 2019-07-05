@extends('layouts.app')

@section('content')
<div class="container box">
    <h3 align="center">Live search in laravel using AJAX</h3><br/>
    <div class="panel panel-default">
        <div class="panel-heading">Search Customer Data</div>
        <div class="panel-body">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data"/>
            </div>
            <div class="table-responsive">
                <h3 align="center">Total Data : <span id="total_records"></span></h3>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <script>
        $(document).ready(function () {

            fetch_customer_data();

            function fetch_customer_data(query = '') {
                $.ajax({
                    url: "{{ url(app()->getLocale().'/live_search/action') }}",
                    method: 'GET',
                    data: {query: query},
                    dataType: 'json',
                    success: function ($output) {
                        $('tbody').html($output);
                    }
                })
            }

            $(document).on('keyup', '#search', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection
