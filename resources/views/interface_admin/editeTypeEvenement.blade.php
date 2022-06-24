
@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Modifier type évènement</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{route('admin.listeTypeEvenement')}}">Liste type évènement</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Modifier les types évènement</li>
                </ol>
              </nav>

            <form  method="POST" action="{{route('admin.update_TypeEvenement', $type_evenement->id)}}" enctype="multipart/form-data">

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
                    <label for="exampleInputName1"> Nom type évènement</label>
                    <input type="text" class="form-control p_input @error('nom_type_event') is-invalid @enderror" name="nom_type_event" value="{{$type_evenement->nom_type_event}}" required autocomplete="nom_type_event" autofocus>
                </div>

                <div class="form-group">
                    <label for="exampleInputName1"> Description type évènement</label>
                    <input type="text" class="form-control p_input @error('description_type_event') is-invalid @enderror" name="description_type_event" value="{{$type_evenement->description_type_event}}" required autocomplete="description_type_event" autofocus>
                </div>


                  <button type="submit" class ="btn btn-primary">Modifier</button>
            </form>
         </div>
    </div>
</div>


@endsection





