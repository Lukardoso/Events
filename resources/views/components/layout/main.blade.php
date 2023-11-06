<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Events' }}</title>
    <link rel="stylesheet" href="/css/styles.css">
    
</head>
<body>
    <div class="wrapper">

        <header id="nav-bar">
            <h1 id="logo" style="color: var(--accent-clr); font-size: 1.5rem">EVENTS</h1>            

           
            <!-- <ul id="menu">
                <a href="#"><li>Item</li></a>
                <a href="#"><li>Item</li></a>
                <a href="#"><li>Item</li></a>
                <a href="#"><li>Item</li></a>                
            </ul> -->

            <div id="hamburger">
                <svg width="30px" height="30px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#343434" stroke="#343434"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>hamburger</title> <desc>Created with Sketch Beta.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" sketch:type="MSPage"> <g id="Icon-Set-Filled" sketch:type="MSLayerGroup" transform="translate(-212.000000, -888.000000)" fill="#343434"> <path d="M230,904 L214,904 C212.896,904 212,904.896 212,906 C212,907.104 212.896,908 214,908 L230,908 C231.104,908 232,907.104 232,906 C232,904.896 231.104,904 230,904 L230,904 Z M230,896 L214,896 C212.896,896 212,896.896 212,898 C212,899.104 212.896,900 214,900 L230,900 C231.104,900 232,899.104 232,898 C232,896.896 231.104,896 230,896 L230,896 Z M214,892 L230,892 C231.104,892 232,891.104 232,890 C232,888.896 231.104,888 230,888 L214,888 C212.896,888 212,888.896 212,890 C212,891.104 212.896,892 214,892 L214,892 Z" id="hamburger" sketch:type="MSShapeGroup"> </path> </g> </g> </g>
                </svg>
            </div>
        </header>

        <main>
            {{ $slot }}
        </main>

        <footer>
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