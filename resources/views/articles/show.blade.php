@extends('layouts.app')

@section('content')

    @auth
        <div id="wrapper">
            <div id="page" class="container">
                <div id="content">
                    <div class="title">
                        <h2>{{$article->title}}</h2>
                    </div>
                    <p><img src="public/images/banner.jpg" alt="" /> </p>
                    <p>{{$article->body}}</p>
                    <p>
                        @foreach ($article->tags as $tag)
                            <a href="{{route('articles.index',['tag'=>$tag->name])}}">{{$tag->name}}</a>
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    @endauth
    @guest
        Log je in om dit artikel te bekijken
    @endguest
@endsection
