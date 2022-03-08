@extends('base')
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Adauga un articol</h1>
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
                <form method="post" action="{{ route('articles.store') }}">
                    @csrf
                    <div class="form-group">

                        <p class="text-secondary h4">Articol :</p>
                        <textarea class="form-control" name="content" rows="6">{{{old('content') }}}</textarea>

                        <label for="category">Categorie :</label>
                        <select class="form-control" name="category">
                            <option value="" selected disabled hidden>Alege aici</option>
                            <option value="Tech">Tech</option>
                            <option value="HR">HR</option>
                            <option value="News">Noutati</option>
                        </select>

                    </div>


                    <button type="submit" class="btn btn-primary">Salvează datele</button>
                </form>
            </div>
        </div>
    </div>
@endsection
