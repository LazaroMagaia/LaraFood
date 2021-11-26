@extends('adminlte::page')

@section('title','Cadastrar novo plano')
    
@section('content_header')
    <h1>Cadastrar</h1>
    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            @include('admin.includes.alerts')
            <form action="{{route('plans.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" name="name" class="form-control" id="name"
                     placeholder="Nome" value="{{$plan->name ?? old('name')}}">
                </div><!--form-group-->
                <div class="form-group">
                    <label for="price">Preço:</label>
                    <input type="text" name="price" class="form-control" id="price" 
                    placeholder="preço" value="{{$plan->price ?? old('price')}}">
                </div><!--form-group-->
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" class="form-control" id="description"
                     placeholder="Descrição" value="{{$plan->description ?? old('description')}}">
                </div><!--form-group-->
                <div class="form-group">
                    <button type="submit" class="btn btn-dark">Enviar</button>
                </div><!--form-group-->
            </form>
        </div>
    </div>
@endsection