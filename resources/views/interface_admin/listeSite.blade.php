@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau site touristique</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_Site')}}">Créer les site touristique</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des sites touristiques</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo site</th>
                <th>Nom site</th>
                <th>Description site</th>
                <th>Locatisation site</th>
                <th>Status site</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($site_touristiques  as $key=> $site_touristique)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/upload/site/{{$site_touristique->photo_site}}" />
                        </td>
                    <td> {{$site_touristique->nom_site}}</td>
                    <td>  {{substr($site_touristique->description_site, 0, 15)}}...</td>
                    <td> {{$site_touristique->localisation_site}} </td>
                    <td>
                        @if($site_touristique->status_site == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.SiteOne',$site_touristique->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Site',$site_touristique->id)}}" id="delete">Supprimer</a></button>

                        @if($site_touristique->status_site == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Site',$site_touristique->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Site',$site_touristique->id)}}">Activer</a></button>

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
