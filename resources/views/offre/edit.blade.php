@extends('layouts.base-entreprise')

@section('content')
<div class="container mt-4" style="max-width: 800px;">
    <h4>Modifier l'offre d'emploi</h4>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreur(s) :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire --}}
    <form action="{{ route('offre.update', $offre->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mt-3">
            <label for="entreprise_id">Entreprise</label>
            <select name="entreprise_id" id="entreprise_id" class="form-control" required>
                <option value="">-- Sélectionner une entreprise --</option>
                @foreach($entreprises as $entreprise)
                    <option value="{{ $entreprise->id }}" {{ (old('entreprise_id', $offre->entreprise_id) == $entreprise->id) ? 'selected' : '' }}>
                        {{ $entreprise->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3">
            <label for="titre">Titre de l'offre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre', $offre->titre) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $offre->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Mettre à jour</button>
        <a href="{{ route('offre.index') }}" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>

@endsection