@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-around mb-4">
    <div><a href="{{ route('constituency_list', app()->getLocale()) }}" class="btn btn-success">Creeaza</a></div>
        <div><a href="" class="btn btn-warning">Editeaza</a></div>
        <div><a href="" class="btn btn-danger">Sterge</a></div>
    </div>
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
