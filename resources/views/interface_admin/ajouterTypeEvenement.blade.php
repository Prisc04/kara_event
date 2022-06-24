@extends('master')

@section('title')
    Kara-Event| Dashboard
@endsection

@section('content')


    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Créer les types évènement</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Tableau de bord</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Créer les types évènement</li>
                    </ol>
                  </nav>

                    @if(Session::has('status_type_event'))
                            <div class="alert alert-success">
                                    {{Session::get('status_type_event')}}
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

                <form  method="POST" action="{{route('admin.store_TypeEvenement')}}" enctype="multipart/form-data">

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
                        <label for="exampleInputName1">Nom type event</label>
                        <input type="text" class="form-control p_input @error('nom_type_event') is-invalid @enderror" name="nom_type_event" value="{{ old('nom_type_event') }}" required autocomplete="nom_type_event" autofocus>
                    </div>


                    <div class="form-group">
                        <label for="exampleTextarea1">Description type event</label>
                        <textarea class="form-control  p_input @error('description_type_event') is-invalid @enderror" name="description_type_event" value="{{ old('description_type_event') }}" required autocomplete="description_type_event" autofocus " id="exampleTextarea1" rows="4"></textarea>
                    </div>

                      <button type="submit" class ="btn btn-primary">Ajouter</button>
                </form>
             </div>
        </div>
    </div>

 @endsection










