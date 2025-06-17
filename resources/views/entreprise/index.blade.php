@extends('layouts.base-entreprise')

@section('content')
<h1 style="color: aliceblue">Espace entreprise</h1>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Liste des offres</h4>
        <a href="{{ route('entreprise.create') }}" class="btn btn-primary">+ Ajouter une offre</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Email</th>
                        <th>Site Web</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($entreprises as $entreprise)
                    <tr>
                        <td>{{ $entreprise->nom }}</td>
                        <td>{{ $entreprise->adresse }}</td>
                        <td>{{ $entreprise->email }}</td>
                        <td>{{ $entreprise->site_web }}</td>
                        <td>
                            <a href="{{ route('entreprise.edit', $entreprise) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('entreprise.destroy', $entreprise) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Confirmer la suppression ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted py-4">
                            Aucune offre enregistrée.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $entreprises->links() }}
            </div>
        </div>
    </div>
</div>



@endsection