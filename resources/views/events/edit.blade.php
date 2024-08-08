@extends('layouts.main')

@section('content')


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div id="event-create-container" class="col-md-6 offset-md-3">

                <h1>Editando o evento {{ $event->title }}</h1>
                
                <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="image">Imagem do Evento:</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                        <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview"> 
                    </div>
                    <div class="form-group">
                        <label for="title">Evento: </label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
                    </div>

                    <div class="form-group">
                        <label for="date">Data do evento: </label>
                        <input type="date" class="form-control" id="date" name="date"  value="{{ $event->date->format('Y-m-d') }}">
                    </div>

                    <div class="form-group">
                        <label for="city">Cidade: </label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}">
                    </div>
                    <div class="form-group">
                        <label for="private">O evento é privado: </label>
                        <select name="private" id="private" class="form-control">
                            <option value="0">Não</option>
                            <option value="1" {{ $event->private == 1 ? 'selected' : '' }}>Sim</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição: </label>
                        <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="items">Adicione itens de infraestrutura: </label>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Palco"> Palco
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Cerveja grátis"> Cerveja grátis
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="items[]" value="Brindes"> Brindes
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Criar evento">
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
