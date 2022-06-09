
@extends('master')

@section('title')
Kara-Event| Dashboard
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier article</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listearticle')}}">Liste article</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les articles</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updatearticle', $article->id)}}" enctype="multipart/form-data">

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
                        <label for="">Photo article </label>
                        <div>
                            <input type="file" name="photo_canton" id="image" required autocomplete="photo_canton" autofocus " class="form-control p_input @error('photo_canton') is-invalid @enderror" name="photo_canton" value="{{ old('photo_canton') }}" required autocomplete="photo_canton" autofocus " rows="6">
                        </div>
                    </div>
                </div>

               <div class="form-group">
                        <label for="exampleInputName1">Type article</label>
                        <select class="form-control p_input @error('type_article_id') is-invalid @enderror" name="type_article_id" value="{{ old('type_article_id') }}" required autocomplete="type_article_id" autofocus>
                            @foreach ($typearticles  as $typearticle)
                            <option value="{{$typearticle->id}}">{{$typearticle->libelle_type_article}}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Nom article</label>
                    <input type="text" class="form-control p_input @error('nom_article') is-invalid @enderror" name="nom_article" value="{{$article->nom_article}}" required autocomplete="nom_article" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Description article</label>
                    <input class="form-control  p_input @error('desciption_article') is-invalid @enderror" name="desciption_article" value="{{ $article->desciption_article }}" required autocomplete="desciption_article" autofocus " id="exampleTextarea1" rows="4">
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Prix article</label>
                    <input class="form-control  p_input @error('prix_article') is-invalid @enderror" name="prix_article" value="{{ $article->prix_article }}" required autocomplete="prix_article" autofocus " id="exampleTextarea1" rows="4">
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





