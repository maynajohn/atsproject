@extends('layouts.base-entreprise')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-sm p-4" style="width: 800px; background-color: #fff;">
        <h1 class="mb-4 text-center">Ajouter un poste</h1>

        <form action="{{ route('entreprise.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                @error('nom') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="secteur_activite" class="form-label">Secteur d'activité</label>
                <input type="text" name="secteur_activite" id="secteur_activite" class="form-control" value="{{ old('secteur_activite') }}" required>
                @error('secteur_activite') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                @error('description') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="site_web" class="form-label">Site web</label>
                <input type="url" name="site_web" id="site_web" class="form-control" value="{{ old('site_web') }}">
                @error('site_web') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse') }}">
                @error('adresse') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                @error('logo') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="taille" class="form-label">Taille (nombre d'employés)</label>
                <input type="number" name="taille" id="taille" class="form-control" value="{{ old('taille') }}">
                @error('taille') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Ajouter</button>
                <a href="{{ route('entreprise.index') }}" class="btn btn-secondary">Annuler</a>
            </div>
        </form>
    </div>
</div>
@endsection
