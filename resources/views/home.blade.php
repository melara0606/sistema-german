@if(auth::user()->cargo == 1 )
@include('partials/homeadmin')
@endif
@if(auth::user()->cargo == 2 )
@include('partials/homeuaci')
@endif


