
@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier type societe</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listetypesociete')}}">Liste type societe</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les types societes</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updatetypesociete', $type_societe->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Libelle type societe</label>
                    <input type="text" class="form-control p_input @error('libelle_type_societe') is-invalid @enderror" name="libelle_type_societe" value="{{$type_societe->libelle_type_societe}}" required autocomplete="libelle_type_societe" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Nom type societe</label>
                    <input type="text" class="form-control p_input @error('nom_type_societe') is-invalid @enderror" name="nom_type_societe" value="{{$type_societe->nom_type_societe}}" required autocomplete="nom_type_societe" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





