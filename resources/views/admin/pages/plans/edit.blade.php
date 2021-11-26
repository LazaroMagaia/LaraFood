
@extends('adminlte::page')

@section('title',"Editar o {$plan->name}")
    
@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Painel de controle</a></li>
    <li class="breadcrumb-item"><a href="{{route('plans.index')}}">Planos</a></li>
    <li class="breadcrumb-item active"><a href="{{route('plans.edit',$plan->url)}}">Editar o 
        {{$plan->name}}</a></li>
</ol>
    <h1>Editar o {{$plan->name}}</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{route('plans.update',$plan->url)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name" 
                    value="{{$plan->name}}">
                </div><!--form-group-->
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text" name="price" class="form-control" id="price"
                    value="{{$plan->price}}">
                </div><!--form-group-->
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" class="form-control" id="description"
                    value="{{$plan->description}}">
                </div><!--form-group-->
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div><!--form-group-->
            </form>
        </div>
    </div>
@endsection