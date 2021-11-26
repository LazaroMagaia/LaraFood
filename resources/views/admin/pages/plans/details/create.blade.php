@extends('adminlte::page')

@section('title','Cadastrar novo plano')
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('plan.details.index',$plan->url)}}"></li>
    <li class="breadcrumb-item active"><a href="{{route('plan.details.create',$plan->url)}}">
    criar detalhes</a></li>
</ol>
    <h1>Cadastrar novo detalhe para o {{$plan->name}}</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{route('plan.details.store',$plan->url)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div><!--form-group-->

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">criar</button>
                </div><!--form-group-->
            </form>
        </div>
    </div>
@endsection