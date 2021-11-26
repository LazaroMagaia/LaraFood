
@extends('adminlte::page')

@section('title',"Detalhes do {$plan->name}")
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{route('plans.show',$plan->url)}}">
        {{$plan->name}}</a></li>
</ol>
    <h1>Detalhes do {{$plan->name}}</h1>
    
@stop

@section('content')
    <div class="card">
        @include('admin.includes.alerts')
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong>{{$plan->name}}
                </li>
                <li>
                    <strong>Url:</strong>{{$plan->url}}
                </li>
                <li>
                    <strong>preço:</strong>MZN {{number_format($plan->price,2,',','.')}}
                </li>
                <li>
                    <strong>Descrição:</strong>{{$plan->description}}
                </li>
            </ul>
            <form action="{{route('plans.destroy',$plan->id)}}" method="POST">
                @method("DELETE")
                @csrf
                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i>
                    Remover o {{$plan->name}}</button>
            </form>
        </div>
    </div>
@endsection