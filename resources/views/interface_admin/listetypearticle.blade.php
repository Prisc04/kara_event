@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau type article</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_typearticle')}}">Créer les types articles</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des types articles</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Libelle type article</th>
                <th>Description type article</th>
                <th>Status type article</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($type_articles  as $key=> $type_article)
                <tr>
                    <td>{{$key +1}}</td>

                    <td> {{$type_article->libelle_type_article}}</td>
                    <td> {{$type_article->description_type_article }} </td>

                    <td>
                        @if($type_article->status_type_article == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.typearticleOne',$type_article->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_typearticle',$type_article->id)}}" id="delete">Supprimer</a></button>

                        @if($type_article->status_type_article == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_typearticle',$type_article->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_typearticle',$type_article->id)}}">Activer</a></button>

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
