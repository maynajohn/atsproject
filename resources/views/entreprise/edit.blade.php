@extends('layouts.base-entreprise')

@section('content')
<div class="container">
    <h1>Modifier l'entreprise</h1>

    <form action="{{ route('entreprise.update', $entreprise) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $entreprise->nom) }}" required>
            @error('nom') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="secteur_activite" class="form-label">Secteur d'activité</label>
            <input type="text" name="secteur_activite" id="secteur_activite" class="form-control" value="{{ old('secteur_activite', $entreprise->secteur_activite) }}" required>
            @error('secteur_activite') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $entreprise->description) }}</textarea>
            @error('description') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="site_web" class="form-label">Site web</label>
            <input type="url" name="site_web" id="site_web" class="form-control" value="{{ old('site_web', $entreprise->site_web) }}">
            @error('site_web') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $entreprise->adresse) }}">
            @error('adresse') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" name="logo" id="logo" class="form-control">
            @if($entreprise->logo)
                <img src="{{ asset('storage/' . $entreprise->logo) }}" alt="Logo" width="100" class="mt-2">
            @endif
            @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="taille" class="form-label">Taille (nombre d'employés)</label>
            <input type="number" name="taille" id="taille" class="form-control" value="{{ old('taille', $entreprise->taille) }}">
            @error('taille') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
        <a href="{{ route('entreprise.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
