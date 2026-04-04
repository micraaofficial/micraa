<nav style="background:#0b4d23;height:60px;display:flex;align-items:center;justify-content:space-between;padding:0 30px;">

<!-- LOGO -->
<a href="/" style="display:flex;align-items:center;">
    <img src="{{ asset('images/logo.svg') }}" style="height:38px;">
</a>

<!-- SEARCH BAR (CENTER) -->
<div style="flex:1;display:flex;justify-content:center;">
    <form method="GET" action="{{ route('search') }}" style="display:flex;width:400px;">

        <input
            type="text"
            name="query"
            placeholder="Search Micro Services..."
            value="{{ request('query') }}"
            style="flex:1;padding:10px;border:none;border-radius:20px 0 0 20px;outline:none;"
        >

        <button type="submit"
            style="background:#22c55e;border:none;padding:10px 15px;border-radius:0 20px 20px 0;color:white;cursor:pointer;">
            🔍
        </button>

    </form>
</div>

<!-- RIGHT SIDE USER -->
<div style="display:flex;align-items:center;gap:15px;">

<!-- USER NAME -->
<span style="color:white;font-weight:600;">
    {{ Auth::user()->name }}
</span>

<!-- PROFILE PHOTO -->
<div style="width:38px;height:38px;border-radius:50%;background:white;display:flex;align-items:center;justify-content:center;overflow:hidden;font-weight:bold;color:black;">

@if(Auth::user()->avatar)
    <img src="{{ asset('storage/'.Auth::user()->avatar) }}" style="width:100%;height:100%;object-fit:cover;">
@else
    {{ strtoupper(substr(Auth::user()->name,0,1)) }}
@endif

</div>

<!-- LOGOUT -->
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button style="background:#ef4444;border:none;color:white;padding:7px 14px;border-radius:6px;cursor:pointer;">
        Log Out
    </button>
</form>

</div>

</nav>
