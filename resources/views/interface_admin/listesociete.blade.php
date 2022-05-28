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
                <th>NIF societe</th>
                <th>RCCM societe</th>
                <th>Photo societe</th>
                <th>Note societe</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($societes  as $key=> $societe)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/storage/file/{{$societe->photo_socite}}" alt="image" />
                        </td>

                        <td class="py-1">
                            <img src="/storage/file/{{$societe->logo_socite}}" alt="image" />
                        </td>
                    <td> {{$societe->raison_social}}</td>
                    <td> {{$societe->adresse_societe}}</td>
                    <td> {{$societe->numero_societe}}</td>
                    <td> {{$societe->email_societe}}</td>
                    <td> {{$societe->nif_societe}}</td>
                    <td> {{$societe->rccm_societe}}</td>
                    <td> {{$societe->note_societe}}</td>

                    <td>
                        @if($societe->status == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>
                        <!--
                        <button class="btn btn-outline-primary" onclick="window.location ='{{url('/edit_produit/'.$produit->id)}}'">Modifier</button>
                        <button class="btn btn-outline-danger"><a href="{{url('/supprimerproduit/'.$produit->id)}}" id="delete">Supprimer</button>
                            -->
                        @if($societe->status == 1)

                        <button class="btn btn-outline-warning" onclick="window.location ='{{url('/desactiver_societe/'.$societe->id)}}'">Désactiver</button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location ='{{url('/activer_societe/'.$societe->id)}}'">Activer</button>

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
