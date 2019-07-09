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
                    data: JSON.parse('{"hello": "world", "data": [ 1, 2, 3 ] }'),
                    dataType: 'json',
                    success: function (output) {

                    }
                })
            }


            dbParam = JSON.stringify(obj);
            xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                myObj = JSON.parse(this.responseText);
                txt += "<tbody border='1'>"
                for (x in myObj) {
                    txt += "<tr><td>" + myObj[x].name + "</td></tr>";
                }
                txt += "</tbody>"
                document.getElementById("demo").innerHTML = txt;
            }
            xmlhttp.open("POST", "json_demo_db_post.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("x=" + dbParam);





            $(document).on('keyup', '#search', function () {
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
    </script>
@endsection
