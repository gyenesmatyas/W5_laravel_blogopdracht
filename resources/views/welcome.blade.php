@extends('layouts.app')
@section('content')
                @auth
                    Welkom {{Auth::user()->name}}

                @endauth
                @guest
                    Welkom
                    Registreer of log in om verder te gaan
                    @endguest
@endsection
