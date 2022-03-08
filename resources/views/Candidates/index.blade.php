@extends('base')
@extends('layouts.app')
@section('main')
    <div>@if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif</div>
    <div class="row">
        <div class="col-sm-12">

            <h1 class="display-3">Candidati</h1>

            <form method="GET" action="{{route('candidates.index')}}" class="row">
                {{ csrf_field() }}
                <div class="form-group col-sm-3">

                    <select class="form-control" name="filter">
                        <option value="" selected disabled hidden>Alege aici</option>
                        <option value="AscendentNume">A-Z</option>
                        <option value="DescendentNume">Z-A</option>
                    </select>
                </div>
                <button type="submit" onsubmit="sorting()" class="btn btn-primary">Sortează</button>
            </form>
            <br>
            <table class="table table-hover">
                <thead>
                <tr class="table-primary">
                    <td>Nume</td>
                    <td colspan=4></td>
                </tr>
                </thead>
                <tbody>
                <div class="container">


                    @foreach($students as $student)
                        @if(Auth::user()->role == 'Candidat')
                            <tr class="table-active">
                                <td>{{$student->name}} </td>

                                @if(Auth::user()->id == $student->user_id)
                                    <td>
                                        <a href="{{ route('showCandidate')}}" class="btn btn-primary">Vezi CV</a>
                                    </td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        @endif
                        @if(Auth::user()->role == 'Companie' || Auth::user()->role == 'Administrator')
                            <tr class="table-active">
                                <td>{{$student->name}} </td>

                                <td>
                                    @if(isset($jobId))
                                        <a href="{{ route('cvCandidate2',['id' => $student->id,'jobId' => $jobId])}}" class="btn btn-primary">Vezi
                                            CV</a>
                                    @else
                                    <a href="{{ route('cvCandidate',$student->id)}}" class="btn btn-primary">Vezi
                                        CV</a>
                                    @endif
                                </td>
                            </tr>

                        @endif

                    @endforeach
                </div>

                </tbody>
            </table>

            {!! $students->appends(['filter' => $filter])->render() !!}
            <div>
            </div>
@endsection
