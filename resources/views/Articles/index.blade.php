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

            <h1 class="display-3">Articole</h1>

            <br>
            <br>

            <div class="container">
                <form method="GET" action="{{route('articles.index')}}">
                    {{ csrf_field() }}
                    <div class="form-group form-row justify-content-lg-start">
                        <span style="margin-left: 1em;"></span>
                        <select class="form-control col-sm-3" name="filter">
                            <option value="">--Filtrează--</option>

                            <option value="Tech">Tech</option>
                            <option value="HR">HR</option>
                            <option value="News">Noutati</option>

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
                    @foreach($questions as $question)
                        <div class="col-sm-4">
                            <div class="card-deck">
                                <div class="card border-info mb-3" style="max-width: 20rem;">
                                    <div class="card-header">
                                        {{$question->category}}
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
                                            <b>{{ $question->content }}</b>
                                        </p>
                                    </div>


                                    <div class="card-footer text-muted ">
                                        <a href="{{route('articles.show', $question->id)}}" class="card-link">Citește
                                            mai mult</a>

                                        <span class="badge badge-pill badge-secondary">Companie
                                            : {{$question->company->name}}
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
    {!!  $questions->appends(['sorter' => $sorter, 'filter' => $filter])->render() !!}
    <br>
    @if(Auth::user()->role == 'Companie')
        <td>
            <a href="{{ route('articles.create')}}" class="btn btn-primary">Adaugă un articol</a>
        </td>
    @endif
    <div>
    </div>
@endsection
