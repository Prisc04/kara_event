@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection


@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau type évènement</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_TypeEvenement')}}">Créer les types évènement</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des types évènement</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <th>Order #</th>
                            <th>Nom type évènement</th>
                            <th>Description type évènement</th>
                            <th>Status type évènement</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($type_evenements  as $key=> $type_evenement)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td> {{$type_evenement->nom_type_event}}</td>
                                <td> {{$type_evenement->description_type_event }} </td>

                                <td>
                                    @if($type_evenement->status_type_event == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.TypeEvenementOne',$type_evenement->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_TypeEvenement',$type_evenement->id)}}" id="delete">Supprimer</a></button>

                                    @if($type_evenement->status_type_event == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_TypeEvenement',$type_evenement->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_TypeEvenement',$type_evenement->id)}}">Activer</a></button>

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
