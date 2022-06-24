
@extends('master')

@section('title')

    Kara-Event| Dashboard

@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier les scores</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeScore')}}">Liste score</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les scores</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.store_Score')}}" enctype="multipart/form-data">

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
                    <label for="exampleTextarea1">Nom canton</label>
                    <input type="text" class="form-control  p_input @error('nom_canton') is-invalid @enderror" name="nom_canton" value="{{  old('nom_canton')}}" required autocomplete="nom_canton" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Point score</label>
                    <input type="text" class="form-control p_input @error('point_score') is-invalid @enderror" name="point_score" value="{{old('point_score')}}" required autocomplete="point_score" autofocus>
                </div>

                  <button type="submit" class ="btn btn-primary">Ajouter</button>
            </form>
         </div>
    </div>
</div>


@endsection





