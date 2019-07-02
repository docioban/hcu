@extends('layouts.app')

@section('content')
    {{ Form::open(['action' => array('CandidateController@store', app()->getLocale()), 'method' => 'POST']) }}
<div class="container">
    <div class="row">
        <div class='col-sm-6'>

            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}

            <div class="form-group">
                <label>Example select</label>
                <select class="form-control" name="constituency_id">
                    @foreach($constituencies as $constituency)
                        <option value="{{$constituency->constituency_id}}">{{$constituency->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Example select</label>
                <select class="form-control" name="party_id">
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
                <label>Data nasterii</label>
                <input name="date" type="text" class="form-control" placeholder="YYYY-MM-DD" autocomplete="off" >
            </div>


            {{Form::label('studies', 'Studies')}}
            {{Form::text('studies', '', ['class' => 'form-control', 'placeholder' => 'Studies'])}}

            <br><br>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        </div>
    </div>
</div>
    {{ Form::close() }}
@endsection
