@extends('layouts.app')

@section('content')
{{ Form::open(['action' => ['ConstituencyController@update', app()->getLocale()], 'method' => 'PUT']) }}
<div class="mx-auto" align='center'>
    <table class="w-50 table">
        <tr>
            <th>{{Form::label('constituency_name', 'Nr. circumscriptiei :')}}</th> 
            <th>
                {{Form::text('constituency_name', '', ['placeholder' => 'Numarul'])}}
            </th>
        <tr>
            <th>{{Form::label('name_ro', 'Numele :')}}</th>
            <th>
                {{Form::text('name_ro', '', ['placeholder' => 'ro'])}}
            </th>
        <tr>
            <th>{{Form::label('name_ru', 'Numele ru :')}}</th> 
            <th>
                {{Form::text('name_ru', '', ['placeholder' => 'ru'])}}
            </th>
        <tr>
            <th>{{Form::label('voters', 'Nr. de alegatori :')}}</th>
            <th>
                {{Form::text('voters', '', ['placeholder' => '12345'])}}
            </th>
    </table>
    {{Form::submit('Creeaza', ['class' => 'btn btn-success mx-3 mt-3 mb-2'])}}
</div>
{{ Form::close() }}
<div align='center'>
    <a href="/{{app()->getLocale()}}/constituency" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
</div>
@endsection