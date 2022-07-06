
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier service</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeService')}}">Liste service</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les services</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateService', $service->id)}}" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                @endif

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo service</label>
                        <div>
                            <input type="file" name="photo_service" id="image" required autocomplete="photo_service" autofocus " class="form-control p_input @error('photo_service') is-invalid @enderror" name="photo_service" value="{{ old('photo_service') }}" required autocomplete="photo_service" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Nom service</label>
                    <input type="text" class="form-control p_input @error('nom_service') is-invalid @enderror" name="nom_service" value="{{$service->nom_service}}" required autocomplete="nom_service" autofocus>
                </div>

                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





