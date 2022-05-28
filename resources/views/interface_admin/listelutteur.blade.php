@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection



@section('content')


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Tableau lutteur</h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('admin.creer_lutteur')}}">créer les lutteur lutte</a></li>
              <li class="breadcrumb-item active" aria-current="page">liste lutteur</li>
            </ol>
          </nav>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
                <th>Order #</th>
                <th>Photo lutteur</th>
                <th>Nom lutteur</th>
                <th>Prenom lutteur</th>
                <th>Status</th>
                <th>Actions</th>
            </thead>

            <tbody>

                @foreach ($lutteurs  as $key=> $lutteur)
                <tr>
                    <td>{{$key +1}}</td>

                        <td class="py-1">
                            <img src="/storage/file/{{$lutteur->photo_lutteur}}" alt="image" />
                        </td>
                    <td> {{$lutteur->nom_lutteur}}</td>
                    <td> {{$lutteur->prenom_lutteur}} </td>

                    <td>
                        @if($lutteur->status == 1)

                        <label class="badge badge-success">Activé</label>

                        @else

                        <label class="badge badge-danger">Desactivé</label>

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
