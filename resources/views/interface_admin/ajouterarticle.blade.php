@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les articless</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les articles</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_article'))
                            <div class="alert alert-success">
                                    {{Session::get('status_article')}}
                            </div>
                    @endif

                         @if(count($errors)> 0)

                           <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)

                                    <li>{{$error}}</li>

                                    @endforeach
                                </ul>
                           </div>


                        @endif

                <form  method="POST" action="{{route('admin.store_article')}}" enctype="multipart/form-data">

                    @csrf

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
                                <input type="file" name="photo_article" id="image" required autocomplete="photo_article" autofocus " class="form-control p_input @error('photo_article') is-invalid @enderror" name="photo_article" value="{{ old('photo_article') }}" required autocomplete="photo_article" autofocus " rows="6">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Nom article</label>
                        <input type="text" class="form-control p_input @error('nom_article') is-invalid @enderror" name="nom_article" value="{{ old('nom_article') }}" required autocomplete="nom_article" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName1">Type article</label>
                        <select class="form-control p_input @error('type_article_id') is-invalid @enderror" name="type_article_id" value="{{ old('type_article_id') }}" required autocomplete="type_article_id" autofocus>
                            <option selected>selectionnez le type article</option>
                            @foreach ($typearticles  as $typearticle)
                            <option value="{{$typearticle->id}}">{{$typearticle->libelle_type_article}}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleTextarea1">Description article</label>
                    <textarea class="form-control  p_input @error('desciption_article') is-invalid @enderror" name="desciption_article" value="{{ old('desciption_article') }}" required autocomplete="desciption_article" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputName1">Prix article</label>
                        <input type="number" class="form-control p_input @error('prix_article') is-invalid @enderror" name="prix_article" value="{{ old('prix_article') }}" required autocomplete="prix_article" autofocus>
                    </div>

                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










