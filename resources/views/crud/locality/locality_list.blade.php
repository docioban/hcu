@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-around mb-4">
    <div><a href="/{{app()->getLocale()}}/locality/create" class="btn btn-warning">Adauga</a></div>
</div>
<div class="ml-5">
    @if (count($localities) > 0)
        @foreach ($localities as $locality)
        <div>
        <div class="mt-1"><a href="/{{app()->getlocale()}}/locality/{{$locality->id}}">{{$locality->name}}</a></div>
        </div>
        @endforeach
    @endif
    {{$localities->links()}}
</div>
@endsection
