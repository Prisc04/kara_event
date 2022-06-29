
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier site</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeSite')}}">Liste site</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les sites</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateSite', $site_touristique->id)}}" enctype="multipart/form-data">

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
                        <label for="">Photo site </label>
                        <div>
                            <input type="file" name="photo_site" id="image" required autocomplete="photo_site" autofocus " class="form-control p_input @error('photo_site') is-invalid @enderror" name="photo_site" value="{{ old('photo_site') }}" required autocomplete="photo_site" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Nom site</label>
                    <input type="text" class="form-control p_input @error('nom_site') is-invalid @enderror" name="nom_site" value="{{$site_touristique->nom_site}}" required autocomplete="nom_site" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description site</label>
                    <input class="form-control  p_input @error('description_site') is-invalid @enderror" name="description_site" value="{{ $site_touristique->description_site}}" required autocomplete="description_site" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Localisation site</label>
                    <input class="form-control  p_input @error('localisation_site') is-invalid @enderror" name="localisation_site" value="{{ $site_touristique->localisation_site}}" required autocomplete="localisation_site" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





