<style>
    .dropdown-button:hover + .dropdown-menu,
    .dropdown-menu:hover,
    .dropdown-menu:focus-within,
    .dropdown-menu.show {
        display: block;
    }
    
    .dropdown-menu {
        display: none;
        position: absolute;
        top: calc(52% + 5px); /* Ajusta el valor de 5px según tus necesidades */
        right: 0;
        z-index: 1;
        width: 120px; /* Ajusta el ancho según tus necesidades */
    }
    
    .dropdown-menu a {
        white-space: nowrap;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
    }
</style>

<nav class="bg-gray-800 p-4 mb-2">
    <div class="container mx-auto flex items-center justify-between">
        <div class="relative">
            <button class="text-white font-bold text-xl flex items-center focus:outline-none dropdown-button">
              <?xml version="1.0" ?><svg height="40" version="1.1" width="40" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><g transform="translate(0 -1028.4)"><path d="m6.0625 14c1.4648 0.614 3.5685 1 5.9375 1s4.473-0.386 5.938-1h-11.876z" fill="#d35400" transform="translate(0 1028.4)"/><path d="m7 1033.4h10l1 9h-12z" fill="#d35400"/><path d="m8 1044.4c-2.2849 1.1-4.5727 2.2-6.856 3.4-0.89518 0.5-1.2293 1.6-1.144 2.6 0.041664 0.6-0.18109 1.4 0.44089 1.8 0.59091 0.3 1.2837 0.1 1.9252 0.2h20.736c0.769-0.1 0.973-0.9 0.898-1.5 0.014-1 0.068-2-0.658-2.7-0.591-0.6-1.435-0.9-2.157-1.3-1.728-0.8-3.457-1.7-5.185-2.5h-8z" fill="#e74c3c"/><rect fill="#95a5a6" height="5" width="6" x="9" y="1041.4"/><path d="m12 1028.4c-2.9626 0-5.418 2.7-5.9062 6.2-0.1135 0-0.2401-0.1-0.3438-0.1-0.5251 0.2-0.6545 1.2-0.3125 2.3 0.2007 0.6 0.5346 1.1 0.875 1.3 0.7763 3.1 3.015 5.3 5.6875 5.3 2.672 0 4.911-2.2 5.688-5.3 0.34-0.2 0.674-0.7 0.874-1.3 0.342-1.1 0.213-2.1-0.312-2.3-0.104 0-0.23 0.1-0.344 0.1-0.488-3.5-2.943-6.2-5.906-6.2z" fill="#bdc3c7"/><path d="m8 1044.4c0 2.1 1.7909 9 4 9 2.209 0 4-6.9 4-9z" fill="#ecf0f1"/><path d="m12 1028.4c-3.5875 0-7.1271 3.6-7 7-0.0515 2.2 0.9995 4.6 1.0381 6.8 1.0468-1.3 1.01-2.9 0.9674-4.5 0.2125-1.1 0.0104-2.7 0.9945-3.3 2.374-1.2 3.819-3.5 4.594-6h-0.594z" fill="#f39c12"/><path d="m-13-3.5c0 5.2467-4.701 9.5-10.5 9.5s-10.5-4.2533-10.5-9.5 4.701-9.5 10.5-9.5 10.5 4.2533 10.5 9.5z" fill="#ecf0f1" transform="translate(59.5 998.36)"/><path d="m-8 6.5c0 4.142-2.686 7.5-6 7.5s-6-3.358-6-7.5c0-4.1421 2.686-7.5 6-7.5s6 3.3579 6 7.5z" fill="#ecf0f1" transform="translate(59.5 998.36)"/><path d="m8 1044.4c0 1.4 1.7909 6 4 6 2.209 0 4-4.6 4-6z" fill="#95a5a6"/><path d="m-36.594 1023h10l1 10h-12z" fill="#2c3e50"/><path d="m-35.594 1034c-2.285 1.1-4.572 2.2-6.856 3.4-0.895 0.5-1.229 1.6-1.144 2.6 0.042 0.6-0.181 1.4 0.441 1.8 0.591 0.3 1.284 0.1 1.925 0.2h20.736c0.769-0.1 0.973-0.9 0.898-1.6 0.014-0.9 0.068-1.9-0.657-2.6-0.592-0.6-1.436-0.9-2.158-1.3-1.728-0.8-3.456-1.7-5.185-2.5h-8z" fill="#d35400"/><rect fill="#95a5a6" height="5" width="6" x="-34.594" y="1031"/><path d="m-31.594 1018c-2.962 0-5.418 2.6-5.906 6.2-0.113-0.1-0.24-0.1-0.344-0.1-0.525 0.2-0.654 1.2-0.312 2.3 0.2 0.6 0.534 1.1 0.875 1.3 0.776 3.1 3.015 5.3 5.687 5.3 2.673 0 4.911-2.2 5.688-5.3 0.34-0.2 0.674-0.7 0.875-1.3 0.342-1.1 0.212-2.1-0.313-2.3-0.103 0-0.23 0-0.344 0.1-0.488-3.6-2.943-6.2-5.906-6.2z" fill="#bdc3c7"/><path d="m-35.594 1034c0 2.1 1.791 9 4 9s4-6.9 4-9z" fill="#ecf0f1"/><path d="m-31.594 1018c-3.017 0-5.514 2.7-5.937 6.4 3.174-1.1 5.619-3.4 6.531-6.4h-0.594z" fill="#34495e"/><path d="m-31.531 1018c3.017 0 5.514 2.7 5.937 6.4-3.174-1.1-5.619-3.4-6.531-6.4h0.594z" fill="#2c3e50"/><path d="m-35.594 1034c0 1.4 1.791 6 4 6s4-4.6 4-6z" fill="#95a5a6"/><path d="m12 1028.4c3.587 0 7.127 3.6 7 7 0.051 2.2-0.999 4.6-1.038 6.8-1.047-1.3-1.01-2.9-0.968-4.5-0.212-1.1-0.01-2.7-0.994-3.3-2.374-1.2-3.819-3.5-4.594-6h0.594z" fill="#e67e22"/></g></svg>
                  
            </button>
            <div class="dropdown-menu bg-white p-2 mt-2 rounded-md shadow-lg">
                <a class="block px-4 py-2 text-gray-800" href="{{ route('logout') }}">Cerrar sesión</a>

            </div>
        </div>
        <div>
            <a class="text-white mr-4 {{ Request::is('dashboard') ? 'font-bold' : '' }}" href="{{ route('getDashboard') }}">Dashboard</a>
            <a class="text-white mr-4 {{ Request::is('logs') ? 'font-bold' : '' }}" href="{{ route('logs') }}">Logs</a>
            <a class="text-white mr-4 {{ Request::is('logs') ? 'font-bold' : '' }}" href="{{ route('getUsuarios') }}">Usuarios</a>
        </div>
    </div>
</nav>
@section('contenido')
@show