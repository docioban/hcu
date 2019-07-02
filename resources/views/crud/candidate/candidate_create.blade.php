@extends('layouts.app')

@section('content')
{{--    {!! Form::open(['url' => '/']) !!}--}}
{{--    {!! Form::text('name', '', ['placeholder' => 'Name']) !!}--}}
{{--    {!! Form::submit('Register') !!}--}}
{{--    {!! Form::close() !!}--}}


    {{ Form::open(['action' => array('CandidateController@store', app()->getLocale()), 'method' => 'POST']) }}
<div class="container">
    <div class="row">
        <div class='col-sm-6'>

            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}

            <div class="form-group">
                <label>Example select</label>
                <select class="form-control">
                    @foreach($constituencies as $constituency)
                        <option value="{{$constituency->constituency_id}}">{{$constituency->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Example select</label>
                <select class="form-control">
                    @foreach($parties as $party)
                        <option value="{{$party->id}}">{{$party->name}}</option>
                    @endforeach
                </select>
            </div>

            {{Form::label('location', 'Location')}}
            {{Form::text('location', '', ['class' => 'form-control', 'placeholder' => 'Location'])}}

            {{Form::label('civil_status', 'Civil status')}}
            {{Form::text('civil_status', '', ['class' => 'form-control', 'placeholder' => 'Civil status'])}}

            {{Form::label('function', 'Function')}}
            {{Form::text('function', '', ['class' => 'form-control', 'placeholder' => 'Function'])}}



            <div class="form-group">
                <label>date</label>
                <input type="text" id="datetime" readonly>
            </div>
            {{Form::label('studies', 'Studies')}}
            {{Form::text('studies', '', ['class' => 'form-control', 'placeholder' => 'Studies'])}}

            <br><br>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
        <script>
            $("#datetime").datetimepicker({
                format: 'yyyy-mm-dd hh:ii'
            });
        </script>
    </div>
</div>
    {{ Form::close() }}
@endsection
