@extends('base')
@extends('layouts.app')
@section('main')

    <div>@if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h1 class="display-3">Aplicarile mele</h1>

            <br>
            <br>

            <div class="container">
                <form method="GET" action="{{route('jobs.index')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-row justify-content-lg-start">
                        <span style="margin-left: 1em;"></span>
                        <select class="form-control col-sm-3" name="filter">
                            <option value="">--Filtrează--</option>

                            <option value="Categorie1">Categorie1</option>
                            <option value="Categorie2">Categorie1</option>

                        </select>
                        <span style="margin-left: 3em;"></span>
                        {{--                        <select class="form-control col-sm-3" name="sorter">--}}
                        {{--                            <option value="">--Sortează--</option>--}}
                        {{--                            <option value="descScor">Cel mai mare punctaj</option>--}}
                        {{--                            <option value="ascScor">Cel mai mic punctaj</option>--}}
                        {{--                        </select>--}}
                        <span style="margin-left: 2em;"></span>
                        <button type="submit" class="btn btn-primary">Filtreaza</button>

                    </div>
                </form>
                <br>
                <div class="row">
                    @foreach($jobs as $jobCandidate)

                        <div class="col-sm-4">
                            <div class="card-deck">
                                <div class="card border-black mb-3 bg-info text-white" style="max-width: 20rem;">
                                    <div class="card-header">
                                        {{$jobCandidate->job->name}}
                                    </div>

                                    <div class="card-body" style="height: 7rem;">

                                        <p class="card-text"
                                           style="
                                           display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                            -webkit-box-orient: vertical;
                                            overflow:hidden;
                                            text-overflow: ellipsis;
                                          ">
                                            <b>{{ $jobCandidate->job->description }}</b>
                                        </p>
                                    </div>


                                    <div class="card-footer text-muted ">
                                        <span class="badge badge-pill badge-secondary">
                                             {{$jobCandidate->job->company->name}}
                                        </span>
                                        <span class="badge badge-pill badge-secondary">
                                           {{$jobCandidate->seen ? 'Vizualizat' : 'Nevizualizat'}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <br> <br>
{{--    {!!  $jobs->appends(['sorter' => $sorter, 'filter' => $filter])->render() !!}--}}
    <br>
    <div>
    </div>
@endsection
