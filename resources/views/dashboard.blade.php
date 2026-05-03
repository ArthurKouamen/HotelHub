@if (Auth::user()->role === 'admin')
    @include('admin.dashboard')
@else
    @include('client.dashboard')
@endif  
