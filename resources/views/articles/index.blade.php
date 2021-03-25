@extends('layouts.app')
@section('content')


    @auth
        <div id="wrapper">
            <div id="page" class="container">
                @forelse($articles as $article)
                    <div class="content">
                        <div cass="title">
                            <h2>
                                <a href="{{$article->path()}}">
                                    {{$article->title}}
                                </a>
                            </h2>
                        </div>

                        <p>
                            <img src="public/images/banner.jpg" alt="">
                        </p>
                        {!! ! $article->excerpt !!}
                    </div>
                @empty
                    <p>No relevant articles yet bro</p>
                @endforelse
            </div>
        </div>
    @endauth
    @guest
        Log je in om de artikels te bekijken
    @endguest

@endsection
