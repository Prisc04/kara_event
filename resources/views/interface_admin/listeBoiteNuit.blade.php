@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau Boite nuit</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_BoiteNuit')}}">Créer les boites de nuit</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des boites de nuit</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <th>Order #</th>
                            <th>Nom boite nuit</th>
                            <th>Photo boite nuit</th>
                            <th>Localisation boite nuit</th>
                            <th>Adresse boite nuit</th>
                            <th>Status boite nuit</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($boite_nuits  as $key=> $boite_nuit)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$boite_nuit->nom_boite_nuit}}</td>

                                <td class="py-1">
                                    <img src="/upload/boite_nuit/{{$boite_nuit->photo_boite_nuit}}" />
                                </td>

                                <td> {{$boite_nuit-> localisation_boite_nuit}} </td>

                                <td> {{$boite_nuit-> adresse_boite_nuit}} </td>

                                <td>
                                    @if($boite_nuit->status_boite_nuit == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.BoiteNuitOne',$boite_nuit->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_BoiteNuit',$boite_nuit->id)}}" id="delete">Supprimer</a></button>

                                    @if($boite_nuit->status_boite_nuit == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_BoiteNuit',$boite_nuit->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_BoiteNuit',$boite_nuit->id)}}">Activer</a></button>

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
