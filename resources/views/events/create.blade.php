@extends('layouts.main')

@section('content')


    <div id="event-create-container" class="col-md-6 offset-md-3 mt-5 p-4 shadow rounded bg-white">
        <h1 class="text-center mb-4">Crie o seu evento</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="image" class="form-label">Imagem do Evento:</label>
                <input type="file" id="image" name="image" class="form-control-file">
            </div>
            <div class="form-group mb-3">
                <label for="title" class="form-label">Evento: </label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento" required>
            </div>

            <div class="form-group mb-3">
                <label for="date" class="form-label">Data do evento: </label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="form-group mb-3">
                <label for="city" class="form-label">Cidade: </label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Nome da cidade" required>
            </div>
            
            <div class="form-group mb-3">
                <label for="private" class="form-label">O evento é privado: </label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            
            <div class="form-group mb-3">
                <label for="description" class="form-label">Descrição: </label>
                <textarea class="form-control" id="description" name="description" placeholder="O que vai acontecer no evento?" rows="4" required></textarea>
            </div>

            <div class="form-group mb-4">
                <label for="items" class="form-label">Adicione itens de infraestrutura:</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="items[]" value="Cadeiras" id="item1">
                    <label class="form-check-label" for="item1">Cadeiras</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="items[]" value="Palco" id="item2">
                    <label class="form-check-label" for="item2">Palco</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="items[]" value="Cerveja grátis" id="item3">
                    <label class="form-check-label" for="item3">Cerveja grátis</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="items[]" value="Brindes" id="item4">
                    <label class="form-check-label" for="item4">Brindes</label>
                </div>
            </div>

            <div class="d-grid">
                <input type="submit" class="btn btn-primary" value="Criar evento">
            </div>
        </form>
    </div>




@endsection
