@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-around mb-4">
    <div><a href="/{{app()->getlocale()}}/constituency/create" class="btn btn-success">Creeaza</a></div>
</div>
<div class="ml-5">
    @if (count($constituencies) > 0)
        @foreach ($constituencies as $constituency)
        <div>
        <div class="mt-1"><a href="/{{app()->getlocale()}}/constituency/{{$constituency->id}}">{{$constituency->name}}</a></div>
        </div>
        @endforeach
        
    @endif
</div>
@endsection
