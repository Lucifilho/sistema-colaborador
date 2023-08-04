@extends('layouts.main')
@section('content')


<div class="chiaperini">

            
    <livewire:pessoa /> 


    @if(count($pessoas)==0 && $search)

    <span class="msg">Nenhum filme encontrado com {{$search}}</span>

    @elseif(count($pessoas)==0)

    <span class="msg">Nenhum filme registrado ainda</span>

    @endif

    <div class="navigation">

    {{$pessoas -> links()}}

    </div>

</div>

@endsection
