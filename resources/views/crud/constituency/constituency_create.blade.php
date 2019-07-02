@extends('layouts.app')

@section('content')
{{ Form::open(['action' => ['ConstituencyController@store', app()->getLocale()], 'method' => 'POST']) }}
<div class="mx-auto" align='center'>
    <table class="w-50 table">
        <tr>
            <th>{{Form::label('name', 'Numele :')}}</th>
            <th>
                {{Form::text('name', '', ['placeholder' => 'Numele circumscriptiei'])}}
            </th>
        <tr>
            <th>{{Form::label('slug', 'Slug-ul :')}}</th> 
            <th>
                {{Form::text('slug', '', ['placeholder' => 'circumscriptie-52'])}}
            </th>
        <tr>
            <th>{{Form::label('voters', 'Nr. de alegatori :')}}</th>
            <th>
                {{Form::text('voters', '', ['placeholder' => '99999'])}}
            </th>
    </table>
    {{Form::submit('Creeaza', ['class' => 'btn btn-success mx-3 mt-3 mb-2'])}}
</div>
{{ Form::close() }}
<div align='center'>
    <a href="/{{app()->getLocale()}}/constituency" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
</div>
@endsection