@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau societe</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_societe')}}">Créer société</a></li>
              <li class="breadcrumb-item active" aria-current="page">Liste société</li>
            </ol>
          </nav>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <th>Order #</th>
                    <th>Logo societe</th>
                    <th>Raison sociale</th>
                    <th>Adresse societe</th>
                    <th>Téléphone societe</th>
                    <th>Email societe</th>
                    <th>type societe</th>
                    <th>NIF societe</th>
                    <th>RCCM societe</th>
                    <th>Photo societe</th>
                    <th>Note societe</th>
                    <th>Status societe</th>
                    <th>Actions</th>
                </thead>

                    <tbody>

                        @foreach ($societes  as $key=> $societe)
                        <tr>
                            <td>{{$key +1}}</td>
                                <td class="py-1">
                                    <img src="/storage/file/{{$societe->logo_societe}}" alt="image" />
                                </td>
                            <td> {{$societe->raison_social}}</td>
                            <td> {{$societe->adresse_societe}}</td>
                            <td> {{$societe->numero_societe}}</td>
                            <td> {{$societe->email_societe}}</td>
                            <td> {{$societe->type_societe->nom_type_societe}}</td>
                            <td> {{$societe->nif_societe}}</td>
                            <td> {{$societe->rccm_societe}}</td>

                            <td class="py-1">
                                <img src="/storage/file/{{$societe->photo_societe}}" alt="image" />
                            </td>

                            <td> {{$societe->note_societe}}</td>

                            <td>
                                @if($societe->status_societe == 1)

                                <label class="badge badge-success">Activé</label>

                                @else

                                <label class="badge badge-danger">Desactivé</label>

                                @endif

                            </td>

                            <td>

                                <button class="btn btn-outline-primary"> <a href="{{route('admin.societeOne',$societe->id)}}">Modifier</a></button>
                                <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_societe',$societe->id)}}" id="delete">Supprimer</a></button>

                                @if($societe->status_societe == 1)

                                <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_societe',$societe->id)}}">Désactiver</a></button>

                                @else

                                <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_societe',$societe->id)}}">Activer</a></button>

                                @endif

                            </td>
                        @endforeach

                    </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

@endsection
