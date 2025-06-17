@extends('layouts.base-entreprise')

@section('content')
    <div class="container">
        <h1>Nouvelle candidature</h1>

        <form action="{{ route('candidature.store') }}" method="POST">
            @csrf
            <!-- Exemple de champs (à adapter à ton modèle) -->
            <div class="mb-3">
                <label for="candidat_id" class="form-label">Candidat</label>
                <input type="text" name="candidat_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="offre_id" class="form-label">Offre</label>
                <input type="text" name="offre_id" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
        </form>
    </div>
@endsection
