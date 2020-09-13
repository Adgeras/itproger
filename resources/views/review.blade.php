@extends('layouts.app')
@section('title', 'Atsiliepimai')
@section('content')
    <form action="/review/check" method="POST">
        @csrf
        <h1>Pranešimo įvedimo forma</h1><br>

        @if($errors ->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                     <li>{{ $error }}</li>
                                                  
                    @endforeach
                </ul>
            </div>
        @endif    

        <input type="email" name="email" id="email"
         placeholder="Įveskite e-pašto adresą" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Pranešimo tema" class="form-control"><br>
         <textarea placeholder="Įveskite pranešimą " name="message" id="message" cols="30" rows="10" class="form-control"></textarea><br>
        <button type="submit" class="btn btn-success">Išsiūsti</button>
        </form>

        <h1>Visi pranešimai</h1>
            @foreach ($reviews as $el)
                <div class="alert alert-warning">
                    <h3>{{ $el->subject }}</h3>
                    <b>{{ $el->email }}</b>
                    <p>{{ $el->message}}</p>
                </div>   
            @endforeach
@endsection