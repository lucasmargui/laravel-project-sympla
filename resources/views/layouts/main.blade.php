<x-app-layout>
    <div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        @if(session('msg'))
        <p class="msg">{{ session('msg') }}</p>
        @endif 
        @yield('content')
    </div>
</x-app-layout>
