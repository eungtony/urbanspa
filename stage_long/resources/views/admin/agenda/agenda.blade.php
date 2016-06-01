@extends('app')

@section('content')

    <div class="container" style="padding-top:50px;">

        @include('flash')

        <a href="{{url('/admin')}}" class="btn btn-primary">Retourner en arrière</a>

        @include('admin.agenda.form')

    </div>

@endsection