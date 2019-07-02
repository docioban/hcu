@extends('layouts.app')

@section('content')
    {{ Form::open(['action' => array('CandidateController@update', app()->getLocale(), $candidate), 'method' => 'PUT']) }}
    <div class="container">
        <div class="row">
            <div class='col-sm-6'>

                {{Form::label('name', 'Name')}}
                {{Form::text('name', $candidate->name, ['class' => 'form-control'])}}

                <div class="form-group">
                    <label>Constituency</label>
                    <select class="form-control" name="constituency_id">
                        @foreach($constituencies as $constituency)
                            @if ($constituency->id == $candidate->constituency_id)
                                <option value="{{$constituency->constituency_id}}" selected>{{$constituency->name}}</option>
                            @else
                                <option value="{{$constituency->constituency_id}}">{{$constituency->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Party</label>
                    <select class="form-control" name="party_id">
                        @foreach($parties as $party)
                            @if ($party->id == $candidate->party_id)
                                <option value="{{$party->id}}" selected>{{$party->name}}</option>
                            @else
                                <option value="{{$party->id}}">{{$party->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                {{Form::label('location', 'Location')}}
                {{Form::text('location', $candidate->location, ['class' => 'form-control'])}}

                {{Form::label('civil_status', 'Civil status')}}
                {{Form::text('civil_status', $candidate->civil_status, ['class' => 'form-control'])}}

                {{Form::label('function', 'Function')}}
                {{Form::text('function', $candidate->function, ['class' => 'form-control'])}}



                <div class="form-group">
                    <label>Data nasterii</label>
                    <input name="date" type="text" value={{$candidate->date}} class="form-control" placeholder="YYYY-MM-DD" autocomplete="off" >
                </div>


                {{Form::label('studies', 'Studies')}}
                {{Form::text('studies', $candidate->studies, ['class' => 'form-control'])}}

                <br><br>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            </div>
        </div>
    </div>
    {{ Form::close() }}
@endsection
