@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau gym</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_Gym')}}">Créer les gyms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des gyms</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped">

                        <thead>
                            <th>Order #</th>
                            <th>Nom gym</th>
                            <th>Photo gym</th>
                            <th>Localisation gym</th>
                            <th>Adresse gym</th>
                            <th>Status gym</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($gyms  as $key=> $gym)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$gym->nom_gym}}</td>

                                <td class="py-1">
                                    <img src="/upload/gym/{{$gym->photo_gym}}" />
                                </td>

                                <td> {{$gym-> localisation_gym}} </td>

                                <td> {{$gym-> adresse_gym}} </td>


                                <td>
                                    @if($gym->status_gym == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.GymOne',$gym->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_Gym',$gym->id)}}" id="delete">Supprimer</a></button>

                                    @if($gym->status_gym == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_Gym',$gym->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_Gym',$gym->id)}}">Activer</a></button>

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
