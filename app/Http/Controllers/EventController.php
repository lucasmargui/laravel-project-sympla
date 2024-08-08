<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

use App\Models\User;

class EventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(){

        $search = request('search');

        if($search){
            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        }else{
            $events = Event::all();
        }

        return view('welcome',['events' => $events, 'search'=> $search]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request)
    {


        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'city' => 'required|string|max:255',
            'private' => 'required|boolean',
            'description' => 'nullable|string',
            'items' => 'nullable|array',
            'items.*' => 'string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    
        try {
     
            $event = new Event();
            $event->title = $validatedData['title'];
            $event->date = $validatedData['date'];
            $event->city = $validatedData['city'];
            $event->private = $validatedData['private'];
            $event->description = $validatedData['description'];
            $event->items = json_encode($validatedData['items']);
    
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $requestImage = $request->file('image');
                $extension = $requestImage->extension();
                $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
                $requestImage->move(public_path('img/events'), $imageName);
    
                $event->image = $imageName;
            } else {
                $event->image = 'default_image.jpg';
            }

            $user = auth()->user();
            $event->user_id = $user->id;
    
            $event->save();
            return redirect('/')->with('msg', 'Evento criado com sucesso!');
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => 'Erro ao criar evento.'  . $e->getMessage() ] );
        }
    }
    
    

    public function show($id){
        $event = Event::findOrFail($id);


        $eventOwner = User::where('id', $event->user_id)->first()->toArray();
        
        return view('events.show', ['event' => $event, 'eventOwner' => $eventOwner]);
    }

    public function dashboard(){
        $user = auth()->user();
        $events = $user->events;

        $eventsAsParticipant = $user->eventsAsParticipant;

        return view('events.dashboard', ['events' => $events, 'eventsasparticipant' => $eventsAsParticipant]);
    }

    public function destroy($id){ 

        Event::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg','Evento excluído com sucesso!');

    }

    public function edit($id){

        $user = auth()->user();

        $event = Event::findOrFail($id);

        if($user->id != $event->user_id){
            return redirect('/dashboard');
        }

        return view('events.edit', ['event' => $event]);
     }

     public function update(Request $request){

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->file('image');
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/events'), $imageName);

            $data['image'] = $imageName;
        } else {
            $data['image'] = 'default_image.jpg';
        }

        Event::findOrFail($request->id)->update($data);

        return redirect('/dashboard')->with('msg','Editado com sucesso!');
     }


     public function joinEvent($id){
        $user = auth()->user();

        $user->eventsAsParticipant()->attach($id);

        $event = Event::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Sua presença esta confirmada no evento !'. $event->title);

     }


}
