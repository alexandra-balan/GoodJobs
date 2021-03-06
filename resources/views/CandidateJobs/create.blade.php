@extends('base')
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="container">
            <h1 class="display-3"></h1>
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

                {{--                <div class="jumbotron">--}}
                {{--                    <p class="lead">{{$question->question}}</p>--}}
                {{--                    <hr class="my-4">--}}
                {{--                    <p>{{$question->subject->subject}}</p>--}}
                {{--                    <span class="badge badge-pill badge-secondary">--}}
                {{--                        Punctaj maxim: {{$question->max_points}}--}}
                {{--                    </span>--}}
                {{--                </div>--}}

                <div class="list-group">
                    <a href="#"
                       class="list-group-item list-group-item-action flex-column align-items-start list-group-item-dark">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1"></h5>
                            <span class="badge badge-pill badge-secondary">
                                <small class="h6">Oras: {{$job->city ?? 'N/A'}}</small>
                                </span>
                        </div>
                        <p class="mb-1 h4 font-weight-bold">
                            {{$job->description}}
                        </p>
                        <br>
                        <span class="badge badge-pill badge-secondary">
                                <small class="h6">{{$question->subject->subject}}</small>
                            </span>

                    </a>

                </div>
                <br>
                <br>
                <form method="post" action="{{ route('storeStudentAnswer', ['questionId' => $questionId]) }}">
                    @csrf


                    <div class="form-group">
                        <p class="text-secondary h4">Adaug?? r??spunsul t??u:</p>
                        <textarea class="form-control" name="answer" rows="6">{{old('answer')}}</textarea>
                    </div>

                    {{--                        <label for="class">Subject :</label>--}}
                    {{--                        <select class="form-control" name="subject">--}}
                    {{--                            <option value="" selected disabled hidden>Choose here</option>--}}
                    {{--                            @foreach($subjects as $subject)--}}
                    {{--                                <option value="{{$subject['subject']}} ">{{$subject['subject']}} </option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}


                    <button type="submit" class="btn btn-primary">Salveaz?? datele</button>
                </form>
            </div>
        </div>
    </div>
@endsection
