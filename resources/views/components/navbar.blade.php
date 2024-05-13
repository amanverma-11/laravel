<nav class="bg-white shadow">
    @csrf
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-800">Home</a>
            
            <!-- Right Side Links -->
            <div class="flex space-x-4">
                <!-- Add contact and about links -->
                <a href="{{url()->current()}}" class="text-gray-800 hover:text-lg">Contact</a>
                <a href="{{url()->current()}}" class="text-gray-800 hover:text-lg">About</a>
                
                <!-- Show login and register links based on conditions -->
                @guest <!-- If the user is not authenticated -->
                    @if (in_array(request()->route()->getName(), ['home', 'contact', 'about'])) <!-- If on home, contact, or about page -->
                        <a href="{{ route('register') }}" class="text-gray-800 hover:text-lg">Register</a>
                        <a href="{{ route('login') }}" class="text-gray-800 hover:text-lg">Login</a>
                    @endif
                @else
                        <div class="relative">
                            <button id="drop-down-btn" class="text-gray-800 hover:text-lg focus:outline-none">
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

