@extends('adminlte::page')

@section('title',"Editar {$detail->name}")
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item "><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.show',$plan->url)}}">{{$plan->name}}</a></li>
    <li class="breadcrumb-item"><a href="{{route('plan.details.index',$plan->url)}}"></li>
    <li class="breadcrumb-item active"><a href="{{route('plan.details.edit',[$plan->url,$detail->id])}}">
    editar detalhes</a></li>
</ol>
    <h1>Editar detalhe {{$detail->name}}</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{route('plan.details.update',[$plan->url,$detail->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name" 
                    value="{{$detail->name ?? old('name')}}">
                </div><!--form-group-->

                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Editar</button>
                </div><!--form-group-->
            </form>
        </div>
    </div>
@endsection