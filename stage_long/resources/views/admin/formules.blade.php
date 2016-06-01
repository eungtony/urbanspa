@extends('app')

@section('content')

    <div class="container" style="padding-top:60px;">

        <a href="{{url('/admin')}}" class="btn btn-primary">Retourner en arrière</a>

        @include('flash')

        @include('admin.form')

    </div>

    @endsection

