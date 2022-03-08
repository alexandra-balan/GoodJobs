@extends('base')
@extends('layouts.app')
@section('main')
    <div>@if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row justify-content-between align-content-center">
        <div class="col-sm-12">

            <div class="list-group">
                <a href="#"
                   class="list-group-item list-group-item-action flex-column align-items-start list-group-item-dark">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"></h5>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h6">Categorie: {{$article->category}}</small>
                                </span>
                    </div>
                    <p class="mb-1 h4 font-weight-bold">
                        {{$article->content}}
                    </p>
                    <br>
                    <span class="badge badge-pill badge-secondary">
                                <small class="h6">{{$article->company->name}}</small>
                            </span>

                </a>

            </div>
            <br>
            <br>

        </div>
    </div>




    <div>
    </div>
@endsection
