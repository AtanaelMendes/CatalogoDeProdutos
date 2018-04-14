@extends('layouts.app')
@section('title', 'Listagem de produtos')
@section('content')
<div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6">
          <h1>Produto {{$produto->titulo}}</h1>
          <ul>
            <li>Referência: {{$produto->referencia}}</li>
            <li>Preço: R${{number_format($produto->preco,2,',','.')}}</li>
            <li>Adicionado em: {{date("d/m/y",strtotime($produto->created_at))}}</li>
          </ul>
          <p>{{$produto->descricao}}</p>
        </div>
        @if(file_exists("./img/produtos/" . md5($produto->id) . ".jpg"))
        <div class="col-md-6 col-sm-6 col-lg-6">
          <div class="img-fluid">
            <img src="{{asset("img/produtos/" . md5($produto->id) . ".jpg")}}" class="img-fluid img-thumbnail">
              <!-- {{Html::image(asset("img/produtos/" . md5($produto->id) . ".jpg"))}} -->
          </div>
        </div>
        @endif
</div>
  <a href="javascript:history.go(-1)" class="btn btn-outline-dark">Voltar</a>
@endsection
