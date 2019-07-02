@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-around mb-4">
{{--    <div><a href="{{ route('constituency_list', app()->getLocale()) }}" class="btn btn-success">Creeaza</a></div>--}}
        <div><a href="/{{app()->getLocale()}}/candidate/create" class="btn btn-warning">Adauga</a></div>
{{--        <div><a href="" class="btn btn-danger">Sterge</a></div>--}}
    </div>
</div>
<div class="ml-5">
    @if (count($candidates) > 0)
        @foreach ($candidates as $candidate)
        <div>
            <div class="mt-1">
                <a href="/{{app()->getlocale()}}/candidate/{{$candidate->id}}">
                    {{$candidate->name}}
                </a>
            </div>
        </div>
        @endforeach
        
    @endif
</div>
@endsection
