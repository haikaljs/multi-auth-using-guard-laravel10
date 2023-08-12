<a href="{{ route('home') }}">Home</a>

    @if(Auth::guard('web')->user())
            @if (Auth::guard('web')->user()->role == 1)
            <a href="{{ route('dashboard-admin') }}">Dashboard</a> -
            <a href="{{ route('settings') }}">Settings</a> -       
            @endif
            @if (Auth::guard('web')->user()->role == 2)
            <a href="{{ route('dashboard-user') }}">Dashboard</a> -
            @endif
            <a href="{{ route('logout') }}">Logout</a>
    @endif
  

    @if (!Auth::guard('web')->user())
        <a href="{{ route('login') }}">Login</a> -
        <a href="{{ route('register') }}">Registration</a> 
    @endif
 
   
