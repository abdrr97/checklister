<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css" crossorigin="anonymous">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="c-app">

    @include('partials.sidebar')

    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed">
            <button class="c-header-toggler c-class-toggler mfs-3" type="button" data-target="#sidebar"
                data-class="c-sidebar-lg-show" responsive="true">
                <svg class="c-icon c-icon-lg">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
                </svg>
            </button>
            <ul class="c-header-nav ml-auto mr-4">
                <li class="c-header-nav-item d-md-down-none mx-2">
                    <a href="{{ route('consultation') }}" class="c-header-nav-link">
                        {{ __('Get Consultation') }}
                    </a>
                </li>
                <li class="c-header-nav-item d-md-down-none mx-2">
                    <a href="{{ route('welcome') }}" class="c-header-nav-link">
                        <svg class="c-icon mfe-2">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-settings') }}">
                            </use>
                        </svg>
                    </a>
                </li>
                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">

                        <svg class="c-icon mfe-2">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}">
                            </use>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <strong>Account</strong>
                        </div>
                        <a class="dropdown-item" href="#">
                            <strong>{{ auth()->user()->name }}</strong>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <svg class="c-icon mfe-2">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}">
                                </use>
                            </svg>
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </header>
        <div class="c-body">
            <main class="c-main">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"
        integrity="sha512-yUNtg0k40IvRQNR20bJ4oH6QeQ/mgs9Lsa6V+3qxTj58u2r+JiAYOhOW0o+ijuMmqCtCEg7LZRA+T4t84/ayVA=="
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>

    @yield('scripts')

    <script>
        const sidebar = document.querySelector('#sidebar')
        const buttonToggler = document.querySelector('#sidebar_button_toggler')
        
        document.addEventListener('DOMContentLoaded', () =>{
            localStorage.getItem('checklister_sidebar') === 'on' 
                ? sidebar.classList.remove('c-sidebar-minimized') 
                : sidebar.classList.add('c-sidebar-minimized')  
        })
    
        buttonToggler.addEventListener('mouseup',function (e) {
            let switcher = sidebar.classList.contains('c-sidebar-minimized') ? 'on' : 'off'
            localStorage.setItem('checklister_sidebar',switcher)
        })
    </script>
</body>

</html>