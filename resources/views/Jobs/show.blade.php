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

{{--            <p> {{$job->name}}</p>--}}
            <div class="list-group">
                <a href="#"
                   class="list-group-item list-group-item-action flex-column align-items-center list-group-item-dark">
                    <div class="w-100 justify-content-between">
                        <h4 class="mb-2"></h4>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">{{$job->name ?? 'N/A'}}</small>
                                </span>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">Categorie: {{$job->category ?? 'N/A'}}</small>
                                </span>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">Nivel: {{$job->job_level ?? 'N/A'}}</small>
                                </span>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h4">Oras: {{$job->city ?? 'N/A'}}</small>
                                </span>
                    </div>
                    <blockquote>
                        <br> <br>

                        <h3>Descriere: </h3>
                        <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line">
                            {{$job->description}}
                        </p>
                        <br> <br>
                        <h3>Cerinte: </h3>
                        <p class=" h4 font-weight-bold" style="white-space: pre-line">
                            {{$job->requirements}}
                        </p>
                        <br> <br>

                        <h3> Responsabilitati</h3>
                        <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line">
                            {{$job->responsibilities}}
                        </p>
                        <br> <br>

                        <h3> Alte detalii</h3>
                        <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line">
                            {{$job->details}}
                        </p>

                    </blockquote>

                    <br>
                    <span class="badge badge-pill badge-secondary">
                                <small class="h4">{{$job->company->name}}</small>
                            </span>
                    <span class="badge badge-pill badge-secondary">
                                <small class="h4">Valabil pana la: {{$job->expiration_date}}</small>
                            </span>

                </a>

            </div>
            <br>
            <br>

        </div>
    </div>


    @if(Auth::user()->role == 'Candidat')
        <a href="{{route('createCandidateJob', $job->id)}}" class="btn btn-primary"><h3>Aplica</h3></a>
    @endif
    @if(Auth::user()->role == 'Companie')
        <a href="{{route('showCandidates', $job->id)}}" class="btn btn-primary"><h5>Vezi aplicantii</h5></a>
    @endif


    <div>
    </div>
@endsection
