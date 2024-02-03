<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Events' }}</title>
    <link rel="stylesheet" href="/css/layout.css">
    <link rel="stylesheet" href="/css/utils.css">
    <link rel="stylesheet" href="/css/profile.css">
    <script src="/js/popups.js" defer></script>    
</head>
<body>
    <div class="wrapper bg-main-clr main-font padding-mid">

        <header id="nav-bar" class="flex-row space-between align-center margin-bottom-large ">
            <a href="{{ route('events.index') }}">
                <h1 id="logo" style="color: var(--accent-clr); font-size: 1.5rem">EVENTS</h1>  
            </a>          
           
            <ul id="menu" class="flex-row gap-large list-style-none">
                <a href="#"><li>Item A</li></a>
                <a href="#"><li>Item B</li></a>
                <a href="#"><li>Item C</li></a>
                <a href="#"><li>Item D</li></a>                
            </ul>

            <!-- <div id="hamburger">
                <svg width="30px" height="30px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#343434" stroke="#343434"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>hamburger</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-212.000000, -888.000000)" fill="#343434"> <path d="M230,904 L214,904 C212.896,904 212,904.896 212,906 C212,907.104 212.896,908 214,908 L230,908 C231.104,908 232,907.104 232,906 C232,904.896 231.104,904 230,904 L230,904 Z M230,896 L214,896 C212.896,896 212,896.896 212,898 C212,899.104 212.896,900 214,900 L230,900 C231.104,900 232,899.104 232,898 C232,896.896 231.104,896 230,896 L230,896 Z M214,892 L230,892 C231.104,892 232,891.104 232,890 C232,888.896 231.104,888 230,888 L214,888 C212.896,888 212,888.896 212,890 C212,891.104 212.896,892 214,892 L214,892 Z" id="hamburger" sketch:type="MSShapeGroup"> </path> </g> </g> </g>
                </svg>
            </div> -->            

            @auth
                <div id="profile">
                    <p>{{ Auth::user()->name }}</p>
                    <svg width="15px" height="15px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M5.70711 9.71069C5.31658 10.1012 5.31658 10.7344 5.70711 11.1249L10.5993 16.0123C11.3805 16.7927 12.6463 16.7924 13.4271 16.0117L18.3174 11.1213C18.708 10.7308 18.708 10.0976 18.3174 9.70708C17.9269 9.31655 17.2937 9.31655 16.9032 9.70708L12.7176 13.8927C12.3271 14.2833 11.6939 14.2832 11.3034 13.8927L7.12132 9.71069C6.7308 9.32016 6.09763 9.32016 5.70711 9.71069Z" fill="#0F0F0F"></path> </g></svg>

                    <div id="profile-popup">
                        <a href="{{ route('profile.edit') }}">
                            <p>Perfil</p>
                        </a>

                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <p onclick="event.preventDefault();
                                                this.closest('form').submit();"
                            >Logout</p>
                        </form>
                    </div>
                </div>
            @endauth

            @guest
                <div id="profile">
                    <a href="{{ route('login') }}">Login</a>                    
                    <a href="{{ route('register') }}">Register</a>                    
                </div>
            @endguest
            
        </header>     
       
        <main class="full-view gap-mid">           
            <div class="flex-column gap-mid">
                {{ $slot }}
            </div>
        </main>

        <footer class="grid-autofit padding-mid gap-mid">
            <div id="about" class="flex-textbox">
                <h2>Sobre:</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Asperiores, esse!</p>
            </div>
            <div id="contact" class="flex-textbox">
                <h2>Contato:</h2>
                <p>Email: lucas.lannes123@gmail.com</p>
                <p>Telefone: (33) 99978-2780</p>
            </div>
            <p class="copyright">Lucas Lannes &copy; 2023</p>
        </footer>

    </div>
</body>
</html>