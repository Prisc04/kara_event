
@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier type station</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeTypeStation')}}">Liste type station</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les types stations</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.updateTypeStation', $type_station->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Libelle</label>
                    <input type="text" class="form-control p_input @error('libelle') is-invalid @enderror" name="libelle" value="{{$type_station->libelle}}" required autocomplete="libelle" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





