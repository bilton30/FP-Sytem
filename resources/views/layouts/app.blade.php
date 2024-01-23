<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @inertiaHead
  </head>
  <body>
    <form id="logout" action="{{ route('logout') }}" method="post">
      @csrf
  </form>
    @inertia
  </body>
  <script type="text/javascript">
    @auth
            window.Permissions = {!! json_encode(Auth::user()->allPermissions, true) !!};
            window.Roles = {!! json_encode(Auth::user()->getRoleNames(), true) !!};
            window.User = {!! json_encode(Auth::user(), true) !!};
        @else
            window.Permissions = [];
            window.User =[];
            window.Roles = [];
        @endauth
</script>
</html>