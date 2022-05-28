@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau canton</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creercanton')}}">Créer les canton</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste canton</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Photo canton</th>
                <th>Nom canton</th>
                <th>Description canton</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($cantons  as $key=> $canton)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/storage/file/{{$canton->photo_canton}}" alt="image" />
                        </td>
                    <td> {{$canton->nom_canton}}</td>
                    <td> {{$canton->description_canton }} </td>

                    <td>
                        @if($canton->status == 1)

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
                        @if($canton->status == 1)

                        <button class="btn btn-outline-warning" onclick="window.location ='{{url('/desactiver_canton/'.$canton->id)}}'">Désactiver</button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location ='{{url('/activer_canton/'.$canton->id)}}'">Activer</button>

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
