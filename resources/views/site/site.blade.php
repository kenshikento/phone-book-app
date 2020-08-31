<!doctype html>
<html lang="en"  class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

    </head>
    <body>
        @if(view()->hasSection('content'))
            <div class="container mx-auto p-8">
                @yield('content')
            </div>
        @endif
    </body>
</html>
