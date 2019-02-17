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
                        @if (!$company->archived_at)
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-8">
                                        {{ $company->name }}
                                    </div>
                                    <div class="col-md-2 mt-2 mt-md-0">
                                        <a class="btn btn-secondary btn-sm btn-block" role="button" href="/company/{{ $company->id }}">
                                            Részletek
                                        </a>
                                    </div>
                                    <div class="col-md-2 mt-2 mt-md-0">
                                        <a class="btn btn-primary btn-sm btn-block" role="button" href="/company/{{ $company->id }}/edit">
                                            Szerkesztés
                                        </a>
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
            </ul>
        </div>
    </div>

@endsection