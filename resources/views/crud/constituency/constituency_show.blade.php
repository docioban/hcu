@extends('layouts.app')

@section('content')
<div class="mb-5" align="center">
    <b>{{$constituency->name}}</b>
</div>
<div class="d-flex justify-content-around mb-4">
    <div><a href="/{{app()->getLocale()}}/constituency/{{$constituency->constituency_id}}/edit" class="btn btn-warning">Editeaza</a></div>
    <div><a href="" class="btn btn-danger">Sterge</a></div>
</div>
<div class="d-flex justify-content-around">
    <div>
        <p class="mb-5"><b>Localitatile circumscriptiei date :</b></p>
        @foreach ($localities as $locality)
            <div>{{ $locality->name }}</div>
        @endforeach
    </div>
    <div>
        <p class="mb-5"><b>Candidatii circumscriptiei date :</b></p>
        @foreach ($candidates as $candidate)
            <div>{{ $candidate->name }}</div>
        @endforeach
    </div>
</div>
<div align='center'>
    <a href="/{{app()->getLocale()}}/constituency" class="btn btn-primary mx-3 my-4">Pagina precedenta</a>
</div>
@endsection
