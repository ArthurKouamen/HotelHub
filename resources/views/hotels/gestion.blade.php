@extends('layouts.admin') {{-- On appelle le squelette --}}

@section('title', 'Gestion des Hôtels')

@section('admin-content') {{-- On injecte le contenu ici --}}
    <div class="admin-topbar">
        <h2>Gestion des Hôtels</h2>
        <a href="{{ route('hotels.create') }}" class="btn-add">+ Ajouter un hôtel</a>
    </div>

    <section class="admin-table-section">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Ville</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->city }}</td>
                    <td>Actif</td>
                    <td>
                        <div class="action-btns">
                            <a href="#" class="btn-icon edit"><i class="fas fa-edit"></i></a>
                            <a href="#" class="btn-icon delete"><i class="fas fa-trash"></i></a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection