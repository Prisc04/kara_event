@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tableau fréquence radio</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.creer_FrequenceRadio')}}">Créer les fréquences radio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">liste des fréquences radio</li>
                    </ol>
                </nav>
                <div class="table-responsive">
                    <table class="table table-striped" id="table_id">

                        <thead>
                            <th>Order #</th>
                            <th>Photo radio</th>
                            <th>Nom radio</th>
                            <th>Adresse radio</th>
                            <th>Contact radio</th>
                            <th>Localisation radio</th>
                            <th>Status radio</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>

                            @foreach ($frequence_radios  as $key=> $frequence_radio)
                            <tr>
                                <td>{{$key +1}}</td>

                                <td class="py-1">
                                    <img src="/upload/radio/{{$frequence_radio->photo_radio}}" />
                                </td>

                                <td> {{$frequence_radio->nom_radio}}</td>

                                <td> {{$frequence_radio-> adresse_radio}} </td>

                                <td> {{$frequence_radio-> contact_radio}} </td>

                                <td> {{$frequence_radio-> localisation_radio}} </td>

                                <td>
                                    @if($frequence_radio->status_radio == 1)

                                    <label class="badge badge-success">Activé</label>

                                    @else

                                    <label class="badge badge-danger">Desactivé</label>

                                    @endif

                                </td>

                                <td>

                                    <button class="btn btn-outline-primary"> <a href="{{route('admin.FrequenceRadioOne',$frequence_radio->id)}}">Modifier</a></button>
                                    <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_FrequenceRadio',$frequence_radio->id)}}" id="delete">Supprimer</a></button>

                                    @if($frequence_radio->status_radio == 1)

                                    <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_FrequenceRadio',$frequence_radio->id)}}">Désactiver</a></button>

                                    @else

                                    <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_FrequenceRadio',$frequence_radio->id)}}">Activer</a></button>

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
