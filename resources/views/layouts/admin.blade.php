<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">
        <div class="topbar">
            <div class="menu-icon d-flex align-items-center justify-content-center" onclick="toggleSidebar()"
                id="menu-icon">
                <?xml version="1.0" encoding="UTF-8"?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="25" height="25">
                    <g id="Layer_4" data-name="Layer 4" fill="#fff">
                        <path
                            d="M12,0A12,12,0,1,0,24,12,12,12,0,0,0,12,0Zm0,23A11,11,0,1,1,23,12,11.0125,11.0125,0,0,1,12,23Z" />
                        <path
                            d="M7,14.5H6A1.5017,1.5017,0,0,0,4.5,16v1A1.5017,1.5017,0,0,0,6,18.5H7A1.5017,1.5017,0,0,0,8.5,17V16A1.5017,1.5017,0,0,0,7,14.5ZM7.5,17a.5006.5006,0,0,1-.5.5H6a.5006.5006,0,0,1-.5-.5V16a.5006.5006,0,0,1,.5-.5H7a.5006.5006,0,0,1,.5.5Z" />
                        <path
                            d="M18,14.5H11A1.5017,1.5017,0,0,0,9.5,16v1A1.5017,1.5017,0,0,0,11,18.5h7A1.5017,1.5017,0,0,0,19.5,17V16A1.5017,1.5017,0,0,0,18,14.5Zm.5,2.5a.5006.5006,0,0,1-.5.5H11a.5006.5006,0,0,1-.5-.5V16a.5006.5006,0,0,1,.5-.5h7a.5006.5006,0,0,1,.5.5Z" />
                        <path
                            d="M7,10H6a1.5017,1.5017,0,0,0-1.5,1.5v1A1.5017,1.5017,0,0,0,6,14H7a1.5017,1.5017,0,0,0,1.5-1.5v-1A1.5017,1.5017,0,0,0,7,10Zm.5,2.5A.5006.5006,0,0,1,7,13H6a.5006.5006,0,0,1-.5-.5v-1A.5006.5006,0,0,1,6,11H7a.5006.5006,0,0,1,.5.5Z" />
                        <path
                            d="M18,10H11a1.5017,1.5017,0,0,0-1.5,1.5v1A1.5017,1.5017,0,0,0,11,14h7a1.5017,1.5017,0,0,0,1.5-1.5v-1A1.5017,1.5017,0,0,0,18,10Zm.5,2.5a.5006.5006,0,0,1-.5.5H11a.5006.5006,0,0,1-.5-.5v-1A.5006.5006,0,0,1,11,11h7a.5006.5006,0,0,1,.5.5Z" />
                        <path
                            d="M7,5.5H6A1.5017,1.5017,0,0,0,4.5,7V8A1.5017,1.5017,0,0,0,6,9.5H7A1.5017,1.5017,0,0,0,8.5,8V7A1.5017,1.5017,0,0,0,7,5.5ZM7.5,8a.5006.5006,0,0,1-.5.5H6A.5006.5006,0,0,1,5.5,8V7A.5006.5006,0,0,1,6,6.5H7a.5006.5006,0,0,1,.5.5Z" />
                        <path
                            d="M18,5.5H11A1.5017,1.5017,0,0,0,9.5,7V8A1.5017,1.5017,0,0,0,11,9.5h7A1.5017,1.5017,0,0,0,19.5,8V7A1.5017,1.5017,0,0,0,18,5.5ZM18.5,8a.5006.5006,0,0,1-.5.5H11a.5006.5006,0,0,1-.5-.5V7a.5006.5006,0,0,1,.5-.5h7a.5006.5006,0,0,1,.5.5Z" />
                    </g>
                </svg>
            </div>
            <div class="logo_aziendale_left position-absolute" id="logo_aziendale_left">
                <img src="https://macformazione.it/wp-content/uploads/2023/11/Logo-Bianco-Blu-400x126.png" alt="">
            </div>
            <div class="logo_aziendale_right position-absolute" id="logo_aziendale_right">
                <img src="https://macformazione.it/wp-content/uploads/2023/11/Logo-Bianco-Blu-400x126.png" alt="">
            </div>
        </div>
        <div class="sidebar" id="sidebar">
            <a class="d-flex align-items-center justify-content-between" href="/">
                Vai al Sito
                <svg class="my_svg_icon" id="Layer_1" height="20" viewBox="0 0 512 512" width="20"
                    xmlns="http://www.w3.org/2000/svg" data-name="Layer 1">
                    <path
                        d="m477.084 345.746h-442.519a50.348 50.348 0 0 1 -34.565-13.715v46.035a20.592 20.592 0 0 0 20.593 20.592h470.814a20.592 20.592 0 0 0 20.593-20.592v-46.377a50.36 50.36 0 0 1 -34.916 14.057zm-204.852 33.614h-32.464a8 8 0 0 1 0-16h32.464a8 8 0 1 1 0 16z" />
                    <path
                        d="m379.769 487.177h-16.56c-54.785 0-54.785-26.194-54.785-37.379v-35.14h-104.848v35.142c0 11.185 0 37.379-54.785 37.379h-16.56a8 8 0 0 0 0 16h247.538a8 8 0 0 0 0-16z" />
                    <path
                        d="m34.565 329.746h442.519a34.551 34.551 0 0 0 34.551-34.5l.35-239.6a20.6 20.6 0 0 0 -20.594-20.625h-42.943v258.879a8 8 0 0 1 -16 0v-218.3h-351.904v218.3a8 8 0 0 1 -16 0v-258.881h-43.935a20.6 20.6 0 0 0 -20.594 20.595v239.586a34.551 34.551 0 0 0 34.55 34.546zm379.587-36.321c0 .16-.015.316-.024.473a7.989 7.989 0 0 1 -15.952 0h-.024v-56.833a1.116 1.116 0 0 0 -1.114-1.115h-104.407a1.116 1.116 0 0 0 -1.114 1.115v56.835h-.024a7.989 7.989 0 0 1 -15.952 0c-.009-.157-.024-.313-.024-.473v-56.36a17.134 17.134 0 0 1 17.114-17.115h104.407a17.134 17.134 0 0 1 17.114 17.115zm-315.312-179.34a16.789 16.789 0 0 1 16.77-16.769h281.772a16.789 16.789 0 0 1 16.77 16.769v69.761a16.788 16.788 0 0 1 -16.77 16.769h-281.772a16.788 16.788 0 0 1 -16.77-16.769zm0 122.98a17.134 17.134 0 0 1 17.114-17.115h104.407a17.134 17.134 0 0 1 17.114 17.115v56.36c0 .16-.015.316-.024.473a7.989 7.989 0 0 1 -15.952 0h-.024v-56.833a1.115 1.115 0 0 0 -1.114-1.115h-104.407a1.116 1.116 0 0 0 -1.114 1.115v56.835h-.024a7.989 7.989 0 0 1 -15.952 0c-.009-.157-.024-.313-.024-.473z" />
                    <path
                        d="m432.448 35.019v-.905a25.319 25.319 0 0 0 -25.291-25.291h-301.322a25.32 25.32 0 0 0 -25.291 25.291v25.486h351.9zm-307.15 0a9.267 9.267 0 1 1 .238-2.061 9.291 9.291 0 0 1 -.236 2.061zm27.221 0a9.271 9.271 0 1 1 .237-2.061 9.292 9.292 0 0 1 -.237 2.061zm27.22 0a9.267 9.267 0 1 1 .238-2.061 9.291 9.291 0 0 1 -.238 2.061zm234.026 0a8 8 0 0 1 -7.722 5.939h-93.329a8 8 0 0 1 0-16h93.329a7.974 7.974 0 0 1 7.722 10.061z" />
                    <path
                        d="m115.61 113.316h281.772a.77.77 0 0 1 .77.77v69.761a.769.769 0 0 1 -.769.769h-281.773a.77.77 0 0 1 -.77-.77v-69.76a.77.77 0 0 1 .77-.77z" />
                </svg>
            </a>
    
            <a class="d-flex align-items-center justify-content-between" href="{{ url('admin/dashboard') }}">
                Dashboard
                <svg class="my_svg_icon" id="Capa_1" enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512"
                    width="20" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <g>
                            <path
                                d="m180 312h-120c-33.084 0-60 26.916-60 60v80c0 33.084 26.916 60 60 60h120c33.084 0 60-26.916 60-60v-80c0-33.084-26.916-60-60-60zm20 140c0 11.028-8.972 20-20 20h-120c-11.028 0-20-8.972-20-20v-80c0-11.028 8.972-20 20-20h120c11.028 0 20 8.972 20 20zm252-452h-120c-33.084 0-60 26.916-60 60v80c0 33.084 26.916 60 60 60h120c33.084 0 60-26.916 60-60v-80c0-33.084-26.916-60-60-60zm20 140c0 11.028-8.972 20-20 20h-120c-11.028 0-20-8.972-20-20v-80c0-11.028 8.972-20 20-20h120c11.028 0 20 8.972 20 20zm-20 92h-120c-33.084 0-60 26.916-60 60v160c0 33.084 26.916 60 60 60h120c33.084 0 60-26.916 60-60v-160c0-33.084-26.916-60-60-60zm20 220c0 11.028-8.972 20-20 20h-120c-11.028 0-20-8.972-20-20v-160c0-11.028 8.972-20 20-20h120c11.028 0 20 8.972 20 20zm-292-452h-120c-33.084 0-60 26.916-60 60v160c0 33.084 26.916 60 60 60h120c33.084 0 60-26.916 60-60v-160c0-33.084-26.916-60-60-60zm20 220c0 11.028-8.972 20-20 20h-120c-11.028 0-20-8.972-20-20v-160c0-11.028 8.972-20 20-20h120c11.028 0 20 8.972 20 20z" />
                        </g>
                    </g>
                </svg>
            </a>
    
            <a class="d-flex align-items-center justify-content-between" href="{{ route('admin.agency.index') }}">
                Le mie Aziende
                <svg class="my_svg_icon" id="Layer_1" enable-background="new 0 0 510 510" height="20" viewBox="0 0 510 510"
                    width="20" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <path
                            d="m330 145.571v-141.142l-330 115.5v385.643h510v-360h-180zm-300 330v-334.357l270-94.5v98.858h-120v330h-150zm255 0v-120h120v120c-10.188 0-103.847 0-120 0zm195 0h-45v-150h-180v150h-45v-300h270z" />
                        <path d="m60 175.571h75v30h-75z" />
                        <path d="m60 235.571h75v30h-75z" />
                        <path d="m60 295.571h75v30h-75z" />
                        <path d="m60 355.571h75v30h-75z" />
                        <path d="m60 415.571h75v30h-75z" />
                        <path d="m240 265.571h90v30h-90z" />
                        <path d="m360 265.571h90v30h-90z" />
                        <path d="m240 205.571h90v30h-90z" />
                        <path d="m360 205.571h90v30h-90z" />
                    </g>
                </svg>
            </a>
    
            <a class="d-flex align-items-center justify-content-between" href="{{ url('profile') }}">
                Profilo
                <svg class="my_svg_icon" id="svg8" height="20" viewBox="0 0 32 32" width="20"
                    xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg">
                    <g id="layer1" transform="translate(-33.022 -30.617)">
                        <path id="path213415"
                            d="m49.026 31.615c-8.272 0-15 6.728-15 15s6.728 15 15 15 15-6.728 15-15-6.728-15-15-15zm0 2c7.191 0 12.998 5.809 12.998 13 0 2.797-.887 5.378-2.383 7.496-.306-1.556-1.468-2.974-3.256-4.004-2.098-1.209-4.728-1.816-7.359-1.816s-5.27.607-7.367 1.816c-1.788 1.03-2.945 2.447-3.25 4.002-1.496-2.118-2.383-4.698-2.383-7.494 0-7.192 5.808-13 13-13zm0 2.555c-2.884 0-5.25 2.356-5.25 5.24s2.366 5.242 5.25 5.242 5.24-2.358 5.24-5.242-2.357-5.24-5.24-5.24z" />
                    </g>
                </svg>
            </a>
    
            <a class="d-flex align-items-center justify-content-between" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
                <svg class="my_svg_icon" id="Layer_1" enable-background="new 0 0 512 512" height="20" viewBox="0 0 512 512"
                    width="20" xmlns="http://www.w3.org/2000/svg">
                    <g>
                        <g>
                            <g id="XMLID_1_">
                                <path
                                    d="m418 152.6c54 78.1 44.4 183.6-22.8 250.8-37.4 37.2-86.8 57.7-139.3 57.7-56.6 0-108.6-23.2-146.5-65.3-29.8-33.2-47.5-76-49.9-120.6-2.4-44.2 9.6-86.5 34.5-122.5 4.4-6.4 11.4-10.4 19.1-11.1.8-.1 1.5-.1 2.3-.1 6.8 0 13.3 2.7 18.2 7.6 8.8 8.8 10.1 22.6 3 32.8-16.9 24.2-25.8 52.7-25.8 82.6 0 38.8 15.1 75.2 42.6 102.6 56.6 56.6 148.8 56.6 205.4 0 24.1-24.2 39-56.3 41.9-90.4 2.8-33.7-6.2-67.5-25.3-95.1-7-10.2-5.7-23.9 3.1-32.7 5.4-5.4 12.8-8.1 20.4-7.4 7.7.7 14.7 4.7 19.1 11.1z" />
                                <path
                                    d="m281.5 78.1v155.1c0 15.1-11.5 27.3-25.7 27.3s-25.7-12.3-25.7-27.3v-155c0-15.1 11.5-27.3 25.7-27.3 14.2-.1 25.7 12.1 25.7 27.2z" />
                            </g>
                        </g>
                    </g>
                </svg>
            </a>
            <!-- Aggiungi altri link o contenuti qui -->
        </div>
        <div class="content" id="main-content">
            <div class="scrollable-content">
                    @if ($errors->any())
                    <div class="container p-5">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif
                @yield('content')
            </div>
        </div>
        <script>
            function toggleSidebar() {
                const sidebar = document.getElementById('sidebar');
                const menuIcon = document.getElementById('menu-icon');
                const content = document.getElementById('main-content');
                const logoAziendale_left = document.getElementById('logo_aziendale_left');
                const logoAziendale_right = document.getElementById('logo_aziendale_right');
                if (sidebar.style.left === "-190px") {
                    logoAziendale_left.style.left = "5px";
                    logoAziendale_right.style.right = "-190px";
                    sidebar.style.left = "0px";
                    content.style.marginLeft = "250px";
                    menuIcon.style.marginLeft = "260px";
                    menuIcon.classList.add('rotazione_menu_icon')
                    menuIcon.classList.remove('rotazione_menu_icon_inversa')
                } else {
                    sidebar.style.left = "-190px";
                    logoAziendale_left.style.left = "-190px";
                    logoAziendale_right.style.display = "block";
                    logoAziendale_right.style.right = "5px";
                    content.style.marginLeft = "60px";
                    menuIcon.style.marginLeft = "17.5px";
                    menuIcon.classList.remove('rotazione_menu_icon')
                    menuIcon.classList.add('rotazione_menu_icon_inversa')
                }
            }
        </script>
    </div>
</body>

</html>
