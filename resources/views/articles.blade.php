@extends('layouts.app')


@section('content')


    @auth
        Welkom {{Auth::user()->name}}
        <ul class="style1">
            @foreach($articles as $article)
                <li class="first">
                    <h3>
                        <a href="{{route('articles.show',$article)}}">
                            {{$article->title}}
                        </a>
                    </h3>
                    <p><a href="#">{{$article->excerpt}}</a></p>
                </li>
            @endforeach
        </ul>
    @endauth
    @guest
        Welkom
        Registreer of log in om verder te gaan
    @endguest


@endsection
