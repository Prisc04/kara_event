@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau hotel</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_hotel')}}">Créer les hotels</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste des hotels</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped" id="table_id">
            <thead>
                <th>Order #</th>
                <th>Photo hotel</th>
                <th>Nom hotel</th>
                <th>Adresse hotel</th>
                <th>Contact hotel</th>
                <th>Description hotel</th>
                <th>Email hotel</th>
                <th>Whatsapp hotel</th>
                <th>Localisation hotel</th>
                <th>Site hotel</th>
                <th>Status hotel</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($hotels  as $key=> $hotel)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/storage/files/{{$hotel->photo_hotel}}" />
                        </td>
                    <td> {{$hotel->nom_hotel}}</td>
                    <td> {{$hotel->adresse_hotel}}</td>
                    <td> {{$hotel->contact_hotel}}</td>
                    <td>  {{substr($hotel->description_hotel, 0, 15)}}...</td>
                    <td> {{$hotel->email_hotel}}</td>
                    <td> {{$hotel->whatsapp_hotel}}</td>
                    <td> {{$hotel->localisation_hotel }} </td>
                    <td> {{$hotel->site_hotel }} </td>

                    <td>
                        @if($hotel->status_hotel == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

                        @endif

                    </td>

                    <td>

                        <button class="btn btn-outline-primary"> <a href="{{route('admin.hotelOne',$hotel->id)}}">Modifier</a></button>
                        <button class="btn btn-outline-danger"><a href="{{route('admin.supprimer_hotel',$hotel->id)}}" id="delete">Supprimer</a></button>

                        @if($hotel->status_hotel == 1)

                        <button class="btn btn-outline-warning" onclick="window.location"> <a href="{{route('admin.desactiver_hotel',$hotel->id)}}">Désactiver</a></button>

                        @else

                        <button class="btn btn-outline-success" onclick="window.location"> <a href="{{route('admin.activer_hotel',$hotel->id)}}">Activer</a></button>

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
