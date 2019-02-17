@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Teherautók</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <ul class="list-group list-group-striped">
                @foreach ($trucks as $truck)
                    @if (!$truck->archived_at)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">{{ $truck->plate }}</div>
                                <div class="col-md-4 mt-2 mt-md-0 ml-auto">
                                    <a class="btn btn-secondary btn-sm btn-block disabled" role="button" href="/truck/{{ $truck->id }}">
                                        Részletek
                                    </a>
                                </div>
                                <div class="col-md-4 mt-2 mt-md-0">
                                    <a class="btn btn-primary btn-sm btn-block" role="button" href="/truck/{{ $truck->id }}/edit">
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
