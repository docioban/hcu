@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-around mb-4">
        <div><a href="/{{app()->getLocale()}}/candidate/{{$candidate->id}}/edit" class="btn btn-warning">Editeaza</a></div>
        {!!Form::open(['action' => ['CandidateController@destroy', app()->getLocale(), $candidate->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
        {!!Form::close()!!}
    </div>
<div class="ml-5">
    <b>Nume: </b>{{$candidate->name}}<br>
    <b>Constituency: </b>{{\App\LanguageConstituencies::where('language_id', \App\Language::where('name', app()->getLocale())->first()->id)->where('constituency_id', $candidate->constituency_id)->first()->name}}<br>
    <b>Party: </b>{{\App\Party::find($candidate->party_id)->name}}<br>
    <b>Locatia: </b>{{$candidate->location}}<br>
    <b>Civil_status: </b>{{$candidate->civil_status}}<br>
    <b>Function: </b>{{$candidate->function}}<br>
    <b>Date: </b>{{$candidate->date}}<br>
    <b>Studies: </b>{{$candidate->studies}}<br>
</div>
@endsection
