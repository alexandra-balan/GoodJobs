@extends('base')
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifica CV</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br/>
                @endif
                <form method="post" action="{{ route('candidates.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nume :</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}"/>

                        <label for="education" class="col-form-label col-form-label-lg">Educatie :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="education"> {{$user->education}}
                        </textarea>

                        <label for="city">Oras :</label>
                        <input type="text" class="form-control" name="city" value="{{$user->city}}"/>

                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>

                        <label for="phone_number">Numar de telefon :</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$user->phone_number}}"/>


                        <label for="last_job" class="col-form-label col-form-label-lg">Experienta :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="last_job"> {{$user->last_job}}
                        </textarea>


                        <label for="spoken_languages">Limbi straine:</label>
                        <input type="text" class="form-control" name="spoken_languages" value="{{$user->spoken_languages}}"/>


                        <label for="skills" class="col-form-label col-form-label-lg">Competente :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="skills"> {{$user->skills}}
                        </textarea>


                        <label for="details" class="col-form-label col-form-label-lg">Despre mine :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="details"> {{$user->details}}
                        </textarea>

                    </div>


                    <button type="submit" class="btn btn-primary">Salvează modificările</button>
                </form>
            </div>
        </div>
    </div>
@endsection
