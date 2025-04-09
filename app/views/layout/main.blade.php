@include('layout.header')
    <div class="container">
        <br>
        @if(Session::has('message'))
            <div class="alert alert-info text-center">
                {{ Session::get('message') }}
            </div>
        @endif
        @yield('main')
    </div>
@include('layout.footer')