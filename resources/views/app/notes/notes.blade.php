@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <h2>Jegyzetek</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="row mb-4">
                <div class="col-md-6">
                    <a class="btn btn-warning btn-sm btn-block" role="button" href="/allnotes">
                        Összes jegyzet
                    </a>
                </div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <a class="btn btn-success btn-sm btn-block" role="button" href="/note/new">
                        Új jegyzet
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-12 mx-auto">
            <ul class="list-group list-group-striped">
                @foreach ($notes as $note)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-md-3">{{ $note->date }}</div>
                            <div class="col-md-7">{!! $note->note !!}</div>
                            <div class="col-md-2  mt-2 mt-md-0">
                                <a class="btn btn-primary btn-sm btn-block" role="button" href="/note/{{ $note->id }}/edit">
                                    Szerkesztés
                                </a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection