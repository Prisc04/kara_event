@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau article</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_article')}}">Créer les articles</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des articles</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Photo article</th>
                <th>Libelle article</th>
                <th>Nom article</th>
                <th>Description article</th>
                <th>Prix article</th>
                <th>Status article</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($articles  as $key=> $article)
                <tr>
                    <td>{{$key +1}}</td>

                    <td class="py-1">
                        <img src="/storage/file/{{$article->photo_article}}" alt="image" />
                    </td>
                    <td> {{$article->libelle_article}}</td>
                    <td> {{$article->nom_article}}</td>
                    <td> {{$article->desciption_article }} </td>
                    <td> {{$article->prix_article}}</td>

                    <td>
                        @if($article->status_article == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.articleOne',$article->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_article',$article->id)}}" id="delete">Supprimer</a></button>

                        @if($article->status_article == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_article',$article->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_article',$article->id)}}">Activer</a></button>

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
