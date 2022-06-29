@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau lieu religieux</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_LieuReligieu')}}">Créer les lieu réligieux</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des lieux réligieux</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo lieux réligieux </th>
                <th>Nom lieux réligieux</th>
                <th>Adresse lieux réligieux</th>
                <th>Localisation lieux réligieux</th>
                <th>Status lieux réligieux</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($lieu_religieus  as $key=> $lieu_religieu)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/lieu_religieu/{{$lieu_religieu->photo_lieu_religieux}}" />
                        </td>
                    <td> {{$lieu_religieu->nom_lieu_religieux}}</td>
                    <td> {{$lieu_religieu->adresse_lieu_religieux}}</td>
                    <td> {{$lieu_religieu->localisation_lieu_religieux }} </td>
                    <td>
                        @if($lieu_religieu->status_lieu_religieux == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.LieuReligieuOne',$lieu_religieu->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_LieuReligieu',$lieu_religieu->id)}}" id="delete">Supprimer</a></button>

                        @if($lieu_religieu->status_lieu_religieux == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_LieuReligieu',$lieu_religieu->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_LieuReligieu',$lieu_religieu->id)}}">Activer</a></button>

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
