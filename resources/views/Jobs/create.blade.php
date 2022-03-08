@extends('base')
@extends('layouts.app')
@section('main')
    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Adauga un job</h1>
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
                <form method="post" action="{{ route('jobs.store') }}">
                    @csrf
                    <div class="form-group">

                        <label for="name">Nume</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}"/>

                        <label for="category">Categorie :</label>
                        <select class="form-control" name="category">
                            <option value="" selected disabled hidden>Alege aici</option>
                            <option value="Achizitii">Achizitii-logistica</option>
                            <option value="Politica">Stiinte politice</option>
                            <option value="Design">Arhitectura-design</option>
                            <option value="Banci">Banci</option>
                            <option value="Contabilitate">Contabilitate-finante</option>
                            <option value="ClientService">Client service</option>
                            <option value="IT">IT</option>
                            <option value="Juridic">Juridic</option>
                            <option value="Telecom">Telecomunicatii</option>
                            <option value="HR">Resurse umane</option>
                        </select>

                        <label for="description">Descriere</label>
                        <textarea class="form-control" name="description" rows="6">{{{old('description') }}}</textarea>

                        <label for="requirements">Cerinte</label>
                        <textarea class="form-control" name="requirements" rows="6">{{{old('requirements') }}}</textarea>

                        <label for="responsibilities">Responsabilitati</label>
                        <textarea class="form-control" name="responsibilities" rows="6">{{{old('responsibilities') }}}</textarea>

                        <label for="job_city">Oras</label>
                        <input type="text" class="form-control" name="job_city" value="{{old('job_city')}}"/>

                        <label for="expiration_date">Data </label>
                        <input type="date" class="form-control" name="expiration_date" value="{{old('expiration_date')}}"/>

                        <label for="job_level">Nivel :</label>
                        <select class="form-control" name="job_level">
                        <option value="" selected disabled hidden>Alege aici</option>
                        <option value="Junior">Junior</option>
                        <option value="Middle">Middle</option>
                        <option value="Senior">Senior</option>
                        </select>
                    </div>

                    <label for="details">Alte detalii</label>
                    <textarea class="form-control" name="details" rows="6">{{{old('details') }}}</textarea>



                    <button type="submit" class="btn btn-primary">Salvează datele</button>
                </form>
            </div>
        </div>
    </div>
@endsection
