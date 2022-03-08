@extends('base')
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Modifica datele</h1>
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
                <form method="post" action="{{ route('companies.update', $user->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="name">Nume :</label>
                        <input type="text" class="form-control" name="name" value="{{$user->name}}"/>

                        <label for="description" class="col-form-label col-form-label-lg">Descriere :</label>
                        <textarea class="form-control" rows="3"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 86px;"
                                  name="description"> {{$user->description}}
                        </textarea>

                        <label for="company_city">Oras :</label>
                        <input type="text" class="form-control" name="company_city" value="{{$user->company_city}}"/>

                        <label for="email">Email :</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}"/>


                    </div>


                    <button type="submit" class="btn btn-primary">Salvează modificările</button>
                </form>
            </div>
        </div>
    </div>
@endsection
