@extends('layouts.app')
@section('title', 'Listagem de produtos')
@section('content')
<h1>Produtos</h1>

  {{Form::open(['url'=>['produtos/buscar']])}}
    <div class="row">
      <div class="col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-xs-10 offset-xs-1 ">
        <div class="input-group">
          {{Form::text('busca', $busca,['class'=>'form-control','required','placeholder'=>'Buscar'])}}
          <span class="input-group-btn ">
            {{Form::submit('Buscar',['class'=>'btn btn-outline-dark'])}}
          </span>
        </div>
      </div>
    </div>
  {{Form::close()}}

  @if(Session::has('mensagem'))
    <div class='alert alert-success'>{{Session::get('mensagem')}}</div>
  @endif

  <div class='row' style="padding-top:50px">
    @foreach($produtos as $produto)
      <div class='col-md-3'>
        <h4>{{$produto->titulo}}</h4>
        @if(file_exists('./img/produtos/'.md5($produto->id).'.jpg'))
          <a href='{{url('produtos/'.$produto->id)}}'>
            <img src="{{asset('img/produtos/'. md5($produto->id).'.jpg')}}" class="img-fluid rounded" title="Trocar Foto">
          </a>
          @else
            <a href="{{url('produtos/'.$produto->id)}}>">
              {{$produto->titulo}}
            </a>
        @endif
        @if(Auth::check())
        <div style="padding-top:10px">
          {{Form::open(['route'=>['produtos.destroy',$produto->id],'method'=>'DELETE'])}}
            <a class='btn btn-outline-info' href="{{url('produtos/'.$produto->id.'/edit')}}">Editar</a>
          {{Form::submit('Excluir',['class'=>'btn btn-outline-danger'])}}
          {{Form::close()}}
        </div>
        @endif
      </div>
    @endforeach
  </div>
  <div style="padding-top:10px">
    {{$produtos->links()}}     
  </div>
  @endsection
