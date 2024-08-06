@extends('layouts.main')

@section('title','Simpla Events')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="image">Imagem do Evento:</label>
        <input type="file" id="image" name="image" class="from-control-file"> 
    </div>
    <div class="form-group">
        <label for="title">Evento: </label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
    </div>
    <div class="form-group">
        <label for="city">Cidade: </label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Nome da cidade">
    </div>
    <div class="form-group">
        <label for="private">O evento é privado: </label>
        <select name="private" id="private">
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
    </div>
    <div class="form-group">
        <label for="description">Descrição: </label>
        <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar evento">
    </form>
</div>

@endsection
