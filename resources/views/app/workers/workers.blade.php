@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <h2>Dolgozók</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
            <ul class="list-group list-group-striped">
                @foreach ($workers as $worker)
                    @if (!$worker->archived_at)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">{{ $worker->name }}</div>
                                <div class="col-md-2">{{ $worker->phone }}</div>
                                <div class="col-md-3">{{ $worker->email }}</div>
                                <div class="col-md-2 mt-2 mt-md-0">
                                    <a class="btn btn-secondary btn-sm btn-block disabled" role="button" href="/worker/{{ $worker->id }}">
                                        Részletek
                                    </a>
                                </div>
                                <div class="col-md-2 mt-2 mt-md-0">
                                    <a class="btn btn-primary btn-sm btn-block" role="button" href="/worker/{{ $worker->id }}/edit">
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
