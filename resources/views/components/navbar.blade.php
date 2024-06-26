<nav class="bg-blue-500 shadow-lg">
    @csrf
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-white">Home</a>
            
            <div class="flex space-x-5">
                
                <a href="{{url()->current()}}" class="text-white hover:text-gray-300">Contact</a>
                <a href="{{url()->current()}}" class="text-white hover:text-gray-300">About</a>
                
                @guest <!-- If the user is not authenticated -->
                    @if (in_array(request()->route()->getName(), ['home', 'contact', 'about'])) <!-- If on home, contact, or about page -->
                        <a href="{{ route('register') }}" class="text-white hover:text-gray-300">Register</a>
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-300">Login</a>
                    @endif
                @else
                    <div class="relative">
                        <button id="drop-down-btn" class="text-white hover:text-gray-300 focus:outline-none">
                            Hi, {{ Auth::user()->username }}
                        </button>
                        <ul id="drop-down-menu" class="absolute right-0 hidden bg-white shadow-md rounded-md py-1 mt-2">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="text-gray-800 px-4 py-2 block w-full text-left">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>

@if(session('success'))
<div id="successAlert" class="fixed top-15 left-1/2 transform -translate-x-1/2 bg-green-500 text-white py-3 px-6 w-80 rounded-md">
    <p class="text-lg text-center">{{ session('success') }}</p>
</div>
@endif

<script src="{{asset('js/dropdown.js')}}" defer></script>
<script src="{{asset('js/alert.js')}}" defer></script>




