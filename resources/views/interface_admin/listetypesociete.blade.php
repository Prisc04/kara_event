@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau type societe</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_typesociete')}}">Créer les types societe</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des types societe</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Libelle type societe</th>
                <th>Nom type societe</th>
                <th>Status type societe</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($type_societes  as $key=> $type_societe)
                <tr>
                    <td>{{$key +1}}</td>

                    <td> {{$type_societe->libelle_type_societe}}</td>
                    <td> {{$type_societe->nom_type_societe }} </td>

                    <td>
                        @if($type_societe->status_type_societe == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.typesocieteOne',$type_societe->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_typesociete',$type_societe->id)}}" id="delete">Supprimer</a></button>

                        @if($type_societe->status_type_societe == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_typesociete',$type_societe->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_typesociete',$type_societe->id)}}">Activer</a></button>

                        @endif

                    </td>

                </tr>

                  @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
