@extends('layouts.app')

@section('content')
    <div class="mb-5"><h3 align='center'>Indicati tabelul in care doriti sa introduceti modificari</h3></div>
    <div class="d-flex justify-content-around">
        <div><a href="/{{ app()->getLocale() }}/constituency" class="btn btn-primary">Circumscriptii</a></div>
        <div><a href="" class="btn btn-primary">Candidati</a></div>
        <div><a href="" class="btn btn-primary">Localitati</a></div>
    </div>
@endsection
