@extends('layauts.template')


@section('content')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Administrateurs</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchorders"
                                    class="form-control search-orders" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                        </form>

                    </div><!--//col-->

                    <div class="col-auto">
                        <a class="btn app-btn-secondary" href="{{ route('administrateur.create') }}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Ajouter un administrateur
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (Session::get('success_msg'))
        <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif

    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            <div class="table-responsive">
                <table class="table app-table-hover mb-0 text-left">
                    <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Nom</th>
                            <th class="cell">Email</th>
                            <th class="cell"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admins as $admin)
                            <tr>
                                <td class="cell">{{ $admin->id }}</td>
                                <td class="cell">{{ $admin->name }}</td>
                                <td class="cell">{{ $admin->email }}</td>
                                <td class="cell"><a class="btn-sm app-btn-secondary" href="{{ route('administrateur.edit', $admin->id) }}">Editer</a>
                                  				<a href="#" class="btn-sm app-btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteadmin{{$admin->id}}"> Supprimer </a>

                                </td>
                            </tr>

         <!--------------------------- Modal ---------------------------------------->
                            <div class="modal fade" id="deleteadmin{{$admin->id}}" tabindex="-1" aria-labelledby="deleteadminLabel{{$admin->id}}"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteadmin{{$admin->id}}">Confirmer la suppression</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous vraiment supprimer l'administrateur <strong>{{ $admin->name }}</strong> !
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
                                            
											<!-- Formulaire de suppression -->
											<a class="btn btn-outline-danger" href="{{route('administrateur.delete', $admin->id)}}">Retirer</a>
										</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
          <!--------------------------- FIN Modal ---------------------------------------->

       
                        @empty
                            <tr>
                                <td class="cell" colspan="2">Aucun administrateur ajouté</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!--//app-pagination-->
    <nav class="app-pagination">
        {{ $admins->links() }}
    </nav><!--//app-pagination-->
@endsection
