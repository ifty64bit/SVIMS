<div class="container-fluid">
    <div class="row align-items-center px-2 px-md-5 py-4 bg-primary">
        <div class="col col-md-2">
            @guest
                <a href="/" class="btn btn-success">Home</a>
            @endguest
            @if(Auth::check())
                @if(Auth::user()->role=='admin')
                    <a href="/dashboard" class="btn btn-success">Home</a>
                @elseif (Auth::user()->role=='user')
                    <a href="/portal" class="btn btn-success">Home</a>
                @endif
            @endif
        </div>
    
        <div class="col-12 col-md-8 text-center">
            <h3>Smart Vehicle Information Managment System</h3>
        </div>
    
        <div class="col col-md-2 text-right">
            @guest
                <a href="{{route('login')}}" class="btn btn-success">Login</a>
            @endguest
            @auth
                <a href="{{route('logout')}}" class="btn btn-danger">Logout</a>
            @endauth
        </div>
    </div>
</div>