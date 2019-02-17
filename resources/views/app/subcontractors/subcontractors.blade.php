@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <h2>Allvállalkozók</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <ul class="list-group list-group-striped">
                @foreach ($subcontractors as $subcontractor)
                    @if (!$subcontractor->archived_at)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">{{ $subcontractor->name }}</div>
                                <div class="col-md-2">{{ $subcontractor->phone }}</div>
                                <div class="col-md-3">{{ $subcontractor->email }}</div>
                                <div class="col-md-2 ml-auto mt-2 mt-md-0">
                                    <a class="btn btn-primary btn-sm btn-block" role="button" href="/subcontractor/{{ $subcontractor->id }}/edit">
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
