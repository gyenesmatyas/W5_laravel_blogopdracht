@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')

    @auth
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div id="wrapper">
                            <div id="page" class="container">
                                <h1 class="heading has-text-weight-bold is-size-4">Blogpost maken</h1>
                            </div>

                            <form method='POST' action="{{ route('articles.index') }}">

                                @csrf

                                <div class="field">
                                    <label class="label" for="title">Title</label>
                                    <div class="control">
                                        <input
                                            class="input @error('title') is-danger @enderror"
                                            type="text"
                                            name="title"
                                            id="title"
                                            value="{{old('title')}}"
                                        >
                                        @error('title')
                                        <p class="help is-danger">
                                            {{ $errors->first('title') }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="excerpt">Excerpt</label>
                                    <div class="control">
                                    <textarea
                                        class="textarea @error('excerpt') is-danger @enderror"
                                        name="excerpt"
                                        id="excerpt"
                                    >
                                        {{old('excerpt')}}
                                    </textarea>

                                        @error('excerpt')
                                        <p class="help is-danger">
                                            {{ $errors->first('excerpt') }}
                                        </p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="field">
                                    <label class="label" for="body">body</label>
                                    <div class="control">
                                    <textarea
                                        class="textarea @error('body') is-danger @enderror"
                                        name="body"
                                        id="body"
                                    >
                                        {{old('body')}}
                                    </textarea>

                                        @error('body')
                                        <p class="help is-danger">
                                            {{ $errors->first('body') }}
                                        </p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label" for="tags">Tags</label>
                                        <div class="select is-multiple control">
                                            <select
                                                name="tags[]"
                                                multiple
                                            >
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                                @endforeach

                                            </select>

                                            @error('tags')
                                            <p class="help is-danger">
                                                {{ $message }}
                                            </p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field is-grouped">
                                        <div class="control">
                                            <button class="button is-link">Submit</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
    @guest
        Log je in om een artikel aan te maken
    @endguest


@endsection
