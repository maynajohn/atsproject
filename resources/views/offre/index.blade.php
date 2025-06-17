@extends('layouts.base-entreprise')

@section('content')
<div class="container mt-4">
    <h4 style="color:aliceblue" class="mb-4">Mes offres d'emploi</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($offres->isEmpty())
        <p class="text-center text-muted">Aucune offre d'emploi publiée.</p>
    @else
        <div class="row">
            @foreach($offres as $offre)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $offre->titre }}</h5>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $offre->entreprise->nom }}</h6>
                            <p class="card-text flex-grow-1">{{ Str::limit($offre->description, 120) }}</p>
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <a href="{{ route('offre.edit', $offre->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                                <form action="{{ route('offre.destroy', $offre->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-muted small">
                            Publiée le {{ $offre->created_at->format('d/m/Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>


@endsection
