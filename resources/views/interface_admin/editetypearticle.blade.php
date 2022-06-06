
@extends('master')

@section('title')
Kara-Event| Dashboard
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier type article</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listetypearticle')}}">Liste type article</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les types articles</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updatetypearticle', $type_article->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Libelle type article</label>
                    <input type="text" class="form-control p_input @error('libelle_type_article') is-invalid @enderror" name="libelle_type_article" value="{{$type_article->libelle_type_article}}" required autocomplete="libelle_type_article" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Description type article</label>
                    <input type="text" class="form-control p_input @error('description_type_article') is-invalid @enderror" name="description_type_article" value="{{$type_article->description_type_article}}" required autocomplete="description_type_article" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





