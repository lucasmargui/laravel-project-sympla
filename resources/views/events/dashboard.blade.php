@extends('layouts.main')

@section('content')
<div class="py-12" id="dashboard">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="col-md-10 offset-md-1 dashboard-title-container">
                    <h1>Meus Eventos</h1>
                </div>
                <div class="col-md-10 offset-md-1 dashboard-events-container">
                    @if (count($events) > 0)
                    <table class="table" id="table-events">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Participantes</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $event)
                            <tr>
                                <td scropt="row">{{ $loop->index + 1 }}</td>
                                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                                <td>{{ count($event->users)  }}</td>
                                <td>
                                    <a href="/events/edit/{{ $event->id }}" class="btn btn-primary"><ion-icon name="create-outline"></ion-icon>Editar</a> 
                                    
                                    <form action="/events/{{ $event->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar </button>
                                    </form>
                                    
                                
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Você ainda não tem eventos, <a href="/events/create">criar evento</a></p>
                    @endif
                </div>
                <div class="col-md-10 offset-md-1 dashboard-title-container">
                    <h1>Participando</h1>
                </div>
                <div class="col-md-10 offset-md-1 dashboard-events-container">
                    @if(count($eventsasparticipant) > 0)
                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Participantes</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($eventsasparticipant as $event)
                            <tr>
                                <td scropt="row">{{ $loop->index + 1 }}</td>
                                <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                                <td>{{ count($event->users)  }}</td>
                                <td>
                                    <form action="/events/leave/{{ $event->id }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" class="btn btn-danger delete-btn">
                                            <ion-icon name="trash-outline"></ion-icon>Sair do Evento
                                        </button>

                                    </form>

                                  
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Você ainda não está participando de nenhum evento, <a href="/"> veja todos os eventos </a>
                    @endif
                </div>
            </div>
        </div>
</div>

@endsection