@extends('layouts.main')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3 mt-5 p-4 shadow rounded bg-white">
    <h1 class="text-muted mb-4">Editando o evento: {{ $event->title }}</h1>
    
    <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group mb-3">
            <label for="image" class="form-label">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview mt-2 rounded" style="max-width: 100%; height: auto;"> 
        </div>
        
        <div class="form-group mb-3">
            <label for="title" class="form-label">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" style="border-radius: 8px; border-color: #ced4da;">
        </div>

        <div class="form-group mb-3">
            <label for="date" class="form-label">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}" style="border-radius: 8px; border-color: #ced4da;">
        </div>

        <div class="form-group mb-3">
            <label for="city" class="form-label">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}" style="border-radius: 8px; border-color: #ced4da;">
        </div>

        <div class="form-group mb-3">
            <label for="private" class="form-label">O evento é privado:</label>
            <select name="private" id="private" class="form-control" style="border-radius: 8px; border-color: #ced4da;">
                <option value="0">Não</option>
                <option value="1" {{ $event->private == 1 ? 'selected' : '' }}>Sim</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="description" class="form-label">Descrição:</label>
            <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?" style="border-radius: 8px; border-color: #ced4da;">{{ $event->description }}</textarea>
        </div>

        <div class="form-group mb-4">
            <label for="items" class="form-label">Adicione itens de infraestrutura:</label>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Cadeiras" id="item-cadeiras">
                <label for="item-cadeiras" class="form-check-label">Cadeiras</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Palco" id="item-palco">
                <label for="item-palco" class="form-check-label">Palco</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Cerveja grátis" id="item-cerveja">
                <label for="item-cerveja" class="form-check-label">Cerveja grátis</label>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" name="items[]" value="Brindes" id="item-brindes">
                <label for="item-brindes" class="form-check-label">Brindes</label>
            </div>
        </div>

        <input type="submit" class="btn btn-primary w-100" value="Atualizar evento">
    </form>
</div>

@endsection
