@extends('layouts.base')

@section('content')
<h1 style="text-align:center; margin-bottom: 30px; color:aliceblue">Offres d'emploi publiées</h1>

@foreach ($offres as $offre)
    <div style="
        background-color: white; 
        max-width: 900px; 
        margin: 0 auto 20px auto; 
        padding: 20px; 
        border-radius: 12px; 
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        display: flex;
        justify-content: space-between;
        align-items: center;
        ">
        <div>
            <h3 style="margin-top: 0;">{{ $offre->titre }}</h3>
            <p>{{ $offre->description }}</p>
        </div>
        <div>
        <a href="{{ route('candidature.create', ['offre' => $offre->id]) }}" 
        style="background-color: #1d5c8f; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600;">
        Postuler
        </a>

        </div>
    </div>
@endforeach

<div style="max-width: 600px; margin: 0 auto;">
    {{ $offres->links() }}
</div>


@endsection
