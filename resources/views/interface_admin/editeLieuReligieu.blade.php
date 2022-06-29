
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier lieu réligieux</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeLieuReligieu')}}">Liste lieu réligieux</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les lieux réligieux</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateLieuReligieu', $lieu_religieu->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom lieu religieux</label>
                    <input type="text" class="form-control p_input @error('nom_lieu_religieux') is-invalid @enderror" name="nom_lieu_religieux" value="{{$lieu_religieu->nom_lieu_religieux}}" required autocomplete="nom_lieu_religieux" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo lieu religieux</label>
                        <div>
                            <input type="file" name="photo_lieu_religieux" id="image" required autocomplete="photo_lieu_religieux" autofocus " class="form-control p_input @error('photo_lieu_religieux') is-invalid @enderror" name="photo_lieu_religieux" value="{{ old('photo_lieu_religieux') }}" required autocomplete="photo_lieu_religieux" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Adresse lieu religieux</label>
                    <input type="text" class="form-control p_input @error('adresse_lieu_religieux') is-invalid @enderror" name="adresse_lieu_religieux" value="{{$lieu_religieu->adresse_lieu_religieux}}" required autocomplete="adresse_lieu_religieux" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Localisation lieu_religieux</label>
                    <input type="text" class="form-control p_input @error('localisation_lieu_religieux') is-invalid @enderror" name="localisation_lieu_religieux" value="{{$lieu_religieu->localisation_lieu_religieux}}" required autocomplete="localisation_lieu_religieux" autofocus>
                </div>



                <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





