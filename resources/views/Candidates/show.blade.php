@extends('base')
@extends('layouts.app')
@section('main')

    <div class="row">

        <div class="col-sm-12">
            <h2 class="display-3">CV - {{$name}}</h2>


            <span class="badge  badge-secondary ">
                <h5> Numar de telefon
                </h5>
            </span>
            <p class="mb-2 h4 font-weight-bold"> {{$candidate->phone_number}}
            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Oras
                </h5>
            </span>
            <p class="mb-2 h4 font-weight-bold"> {{$candidate->city}}
            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Email
                </h5>
            </span>
            <p class="mb-2 h4 font-weight-bold"> {{$candidate->email}}
            </p>
            <span class="badge badge-secondary">
                <h5>
                    Educatie
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> {{$candidate->education}}
            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Experienta
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> {{$candidate->last_job}}
            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Limbi straine
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> {{$candidate->spoken_languages}}
            </p>

            <span class="badge badge-secondary ">
                <h5>
                    Competente
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line""> {{$candidate->skills}}
            </p>

            <span class="badge badge-secondary ">
                <h5>
                    Despre mine
                </h5>
            </span>
            <p class="mb-1 h4 font-weight-bold" style="white-space: pre-line"> {{$candidate->details}}
            </p>


            <br> <br>
            @if(Auth::user()->role == 'Candidat')
                <form method="get" action="{{route('candidates.edit', $candidate->id)}}">
                    <a href="{{ route('candidates.edit',$candidate->id)}}" class="btn btn-primary">Modifică datele
                    </a>
                </form>
            @endif
        </div>
    </div>
@endsection
