<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRM IPRMEDIA - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">

                                <li>
                                    <a href="{{ route('lk') }}">Личный кабинет</a>
                                </li>

                                @role('admin')
                                <li>
                                    <a href="{{ route('administration/common') }}">Администрование</a>
                                </li>
                                @endrole

                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Выйти
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a class="btn btn-success" href="{{route('task/new')}}">Создать задачу</a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $('#iud-modal').on('show.bs.modal', function (event) {
        var element = $(event.relatedTarget);
        var id = element.data('id');
        var name = element.data('name');
        var url = element.data('url');
        var modal = $(this);

        modal.find('#iud-modal-form-id').val(id);
        modal.find('#iud-modal-form-name-edit').val(name);
        document.getElementById("iud-modal-form-add").action = '/administration/' + url + '/add'
        document.getElementById("iud-modal-form-edit").action = '/administration/' + url + '/edit/' + id;
        document.getElementById("iud-modal-form-delete").action = '/administration/' + url + '/delete/' + id;

        if (id > 0) {
            document.getElementById("iud-modal-button-add").style.display = "none";
            document.getElementById("iud-modal-form-name-add").style.display = "none";

            document.getElementById("iud-modal-button-edit").style.display = 'inline-block';
            document.getElementById("iud-modal-button-delete").style.display = 'inline-block';
            document.getElementById("iud-modal-form-name-edit").style.display = 'block';
        } else {
            document.getElementById("iud-modal-button-edit").style.display = "none";
            document.getElementById("iud-modal-button-delete").style.display = "none";
            document.getElementById("iud-modal-form-name-edit").style.display = "none";

            document.getElementById("iud-modal-button-add").style.display = 'inline-block';
            document.getElementById("iud-modal-form-name-add").style.display = 'block';
        }

    })
</script>
</body>
</html>
