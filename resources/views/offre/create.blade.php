@extends('layouts.base-entreprise')

@section('content')
<div class="container mt-4 d-flex justify-content-center">
  <table style="width: 800px; background-color: white; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
    <tr>
      <td style="padding: 20px;">
        <h4>Ajouter une offre d'emploi</h4>

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
        <form action="{{ route('offre.store') }}" method="POST">
          @csrf

          <div class="form-group">
            <label for="entreprise_id">Entreprise</label>
            <select name="entreprise_id" id="entreprise_id" class="form-control" required>
              <option value="">-- Sélectionner une entreprise --</option>
              @foreach($entreprises as $entreprise)
                <option value="{{ $entreprise->id }}" {{ old('entreprise_id') == $entreprise->id ? 'selected' : '' }}>
                  {{ $entreprise->nom }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="form-group mt-3">
            <label for="titre">Titre de l'offre</label>
            <input type="text" name="titre" id="titre" class="form-control" value="{{ old('titre') }}" required>
          </div>

          <div class="form-group mt-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
          </div>

          <button type="submit" class="btn btn-success mt-3">Enregistrer</button>
          <a href="{{ route('offre.index') }}" class="btn btn-secondary mt-3">Annuler</a>
        </form>
      </td>
    </tr>
  </table>
</div>


@endsection
