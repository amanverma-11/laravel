<h1>Our First Page</h1>

<a href="{{route('about')}}">About</a>
<a href="{{route('post')}}">Post</a>

{{-- Blade Template - template engine for PHP that helps us write PHP code easily and effectively --}}
<br/><br>
{{ "Writing simple text in PHP using Blade Template" }}

<br/>
{{-- -Use only one curly braces when writiing HTML or JS with a double ! mark at the start and end--}}
{!! "<h1>Writing an HTML headline</h1>" !!} 

<br>
@php
$user = ['Aman', 'Abhishek', 'Ayushman'];
@endphp

{{-- {{$user}} --}}

<ul>

    @foreach ($user as $u)
        <li>{{$u}}</li>
    @endforeach
</ul>