@extends('layouts.app')

@section('content')
    <div class="mb-5"><h3 align='center'>Indicati tabelul in care doriti sa introduceti modificari</h3></div>
    <div class="d-flex justify-content-around">
{{--    <div><a href="{{ route('constituency_list', app()->getLocale()) }}" class="btn btn-primary">Circumscriptii</a></div>--}}
        <div><a href="/{{app()->getLocale()}}/candidate" class="btn btn-primary">Candidati</a></div>
        <div><a href="/{{app()->getLocale()}}/locality" class="btn btn-primary">Localitati</a></div>
    </div>
@endsection
