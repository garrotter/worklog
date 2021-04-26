@extends ('layouts.master')

@section ('content')

    <div class="row">
        <div class="col-12 col-xl-10">
            <h2>Megrendelő cégek</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-xl-10">
            <ul class="list-group">
                    @foreach ($companies as $company)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-9">
                                    {{ $company->name }}
                                </div>
                                <div class="col-md-3 mt-2 mt-md-0 btn-group" role="group"">
                                    <a class="btn btn-secondary btn-sm col-md-4" role="button" href="/company/{{ $company->id }}">
                                        Részletek
                                    </a>
                                    <a class="btn btn-primary btn-sm col-md-4" role="button" href="/company/{{ $company->id }}/edit">
                                        Szerkesztés
                                    </a>
                                    <button class="btn btn-danger btn-sm col-md-4" data-toggle="modal" data-target="#deleteModal">
                                        Törlés
                                    </button>
                                </div>
                            </div>
                        </li>
                    @endforeach
            </ul>
        </div>
    </div>

@endsection
