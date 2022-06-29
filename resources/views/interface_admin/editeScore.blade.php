
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

            <form  method="POST" action="{{route('admin.updateScore', $score->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleTextarea1">Nom canton 1</label>
                    <input type="text" class="form-control  p_input @error('nom_canton1') is-invalid @enderror" name="nom_canton1" value="{{ $score->nom_canton1}}" required autocomplete="nom_canton1" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Point score 1</label>
                    <input type="text" class="form-control p_input @error('point_score1') is-invalid @enderror" name="point_score1" value="{{$score->point_score1}}" required autocomplete="point_score1" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleTextarea1">Nom canton 2</label>
                    <input type="text" class="form-control  p_input @error('nom_canton2') is-invalid @enderror" name="nom_canton2" value="{{ $score->nom_canton2}}" required autocomplete="nom_canton2" autofocus ">
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Point score 2</label>
                    <input type="text" class="form-control p_input @error('point_score2') is-invalid @enderror" name="point_score2" value="{{$score->point_score2}}" required autocomplete="point_score2" autofocus>
                </div>

                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





