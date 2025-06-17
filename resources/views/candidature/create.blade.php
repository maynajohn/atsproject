@extends('layouts.base')

@section('content')
<h1 style="text-align:center; margin-bottom: 30px;">Postuler à l'offre : {{ $offre->titre }}</h1>

@if ($errors->any())
    <div style="max-width: 600px; margin: 0 auto 20px auto; background: #f8d7da; color: #721c24; padding: 15px; border-radius: 10px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('candidature.store', ['offre' => $offre->id]) }}" method="POST" enctype="multipart/form-data">    @csrf

    <input type="hidden" name="offre_emploi_id" value="{{ $offre->id }}">
    <input type="hidden" name="candidat_id" value="{{ auth()->user()->candidat->id ?? '' }}"> <!-- adapte selon ton auth -->

    <div style="margin-bottom: 15px;">
        <label for="cv" style="display:block; font-weight: 600; margin-bottom: 5px;">Votre CV (PDF ou DOC)</label>
        <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx" required style="width: 100%; padding: 8px;">
    </div>

    <div style="margin-bottom: 15px;">
        <label for="lettre_motivation" style="display:block; font-weight: 600; margin-bottom: 5px;">Lettre de motivation</label>
        <textarea name="lettre_motivation" id="lettre_motivation" rows="6" required style="width: 100%; padding: 8px;">{{ old('lettre_motivation') }}</textarea>
    </div>

    <button type="submit" style="
        background-color: #38c172; 
        color: white; 
        padding: 10px 20px; 
        border: none; 
        border-radius: 10px; 
        font-weight: 600; 
        cursor: pointer;
        ">
        Envoyer la candidature
    </button>
</form>
@endsection
