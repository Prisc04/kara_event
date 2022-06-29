
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier guichet</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeGuichet')}}">Liste de guichet</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les guichets</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateGuichet', $guichet_automatique->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom guichet</label>
                    <input type="text" class="form-control p_input @error('nom_guichet') is-invalid @enderror" name="nom_guichet" value="{{$guichet_automatique->nom_guichet}}" required autocomplete="nom_guichet" autofocus>
                </div>

                <div class="form-group">
                    <div class='col-md-6'>
                        <label for="">Photo guichet</label>
                        <div>
                            <input type="file" name="photo_guichet" id="image" required autocomplete="photo_guichet" autofocus " class="form-control p_input @error('photo_guichet') is-invalid @enderror" name="photo_guichet" value="{{ old('photo_guichet') }}" required autocomplete="photo_guichet" autofocus " rows="6">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Description guichet</label>
                    <input type="text" class="form-control p_input @error('description_guichet') is-invalid @enderror" name="description_guichet" value="{{$guichet_automatique->description_guichet}}" required autocomplete="description_guichet" autofocus>
                </div>


                <div class="form-group">
                    <label for="exampleInputName1"> Localisation guichet</label>
                    <input type="text" class="form-control p_input @error('localisation_guichet') is-invalid @enderror" name="localisation_guichet" value="{{$guichet_automatique->localisation_guichet}}" required autocomplete="localisation_guichet" autofocus>
                </div>


                <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





