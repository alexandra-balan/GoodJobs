@extends('base')
@extends('layouts.app')
@section('main')

    <div class="row">

        <div class="col-sm-12">
            <h2 class="display-3">Detalii</h2>

            <h1 class="display-6">{{$name}}</h1>

            <span class="badge badge-secondary ">
                <h5>
                    Oras
                </h5>
            </span>
            <p class="lead"> {{$company->company_city}}
            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Email
                </h5>
            </span>
            <p class="lead"> {{$company->email}}
            </p>
            <span class="badge badge-secondary ">
                <h5>
                    Descriere
                </h5>
            </span>
            <p class="lead"> {{$company->description}}
            </p>



            <br> <br>
            @if(Auth::user()->role == 'Companie')

                <form method="get" action="{{route('companies.edit', $company->id)}}">
                    <a href="{{ route('companies.edit',$company->id)}}" class="btn btn-primary">Modifică datele
                    </a>
                </form>
            @endif
        </div>
    </div>
@endsection
