@extends('layouts.base')

@section('content')
<h1 style="text-align:center; margin-bottom: 30px;">Candidatures envoyées</h1>

@if(session('success'))
    <div style="max-width: 600px; margin: 0 auto 20px auto; background: #d4edda; color: #155724; padding: 15px; border-radius: 10px;">
        {{ session('success') }}
    </div>
@endif

@forelse ($candidatures as $candidature)
    <div style="
        background-color: white; 
        max-width: 700px; 
        margin: 0 auto 20px auto; 
        padding: 20px; 
        border-radius: 12px; 
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        ">
        <h3 style="margin-top: 0;">
            Offre : {{ $candidature->offre->titre ?? 'Offre supprimée' }}
        </h3>
        <p><strong>Candidat :</strong> {{ $candidature->candidat->nom ?? 'Nom inconnu' }}</p>
        <p><strong>Statut :</strong> {{ ucfirst(str_replace('_', ' ', $candidature->statut)) }}</p>
        <p><strong>CV :</strong> <a href="{{ $candidature->cv }}" target="_blank" style="color: #3490dc;">Voir le CV</a></p>
        <p><strong>Lettre de motivation :</strong></p>
        <p style="white-space: pre-line;">{{ $candidature->lettre_motivation }}</p>

        <div style="margin-top: 15px;">
            <a href="{{ route('candidature.edit', $candidature) }}" style="
                background-color: #ffc107; 
                color: black; 
                padding: 8px 18px; 
                border-radius: 8px; 
                text-decoration: none;
                font-weight: 600;
                margin-right: 10px;
                ">
                Modifier
            </a>
            <form action="{{ route('candidature.delete', $candidature) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" style="
                    background-color: #e3342f; 
                    color: white; 
                    padding: 8px 18px; 
                    border: none; 
                    border-radius: 8px; 
                    cursor: pointer;
                    font-weight: 600;
                    ">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
@empty
    <p style="text-align:center;">Aucune candidature envoyées.</p>
@endforelse

<div style="max-width: 700px; margin: 0 auto;">
    {{ $candidatures->links() }}
</div>
@endsection
