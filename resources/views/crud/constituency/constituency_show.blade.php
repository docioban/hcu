@extends('layouts.app')

@section('content')
<div class="mb-5" align="center">
    {{$constituency->name}}
</div>
<div class="d-flex justify-content-around">
    <div>
        <p class="mb-5">Localitatile circumscriptiei date :</p>
        @foreach ($localities as $locality)
            <div>{{ $locality->name }}</div>
        @endforeach
    </div>
    <div>
        <p class="mb-5">Candidatii circumscriptiei date :</p>
        @foreach ($candidates as $candidate)
            <div>{{ $candidate->name }}</div>
        @endforeach
    </div>
</div>
@endsection
