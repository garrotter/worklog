@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <h2>Jegyzetek</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 mx-auto">
                <form action="/notes" method="GET" class="mx-auto mb-4">
                    <div class="form-row mb-2">
                        <input type="text" class="col-md m-1 form-control flatpickr fp-date" name="startDate" id="startDate" value="
                            @if(!$startDate)
                                {{ now()->format('Y-m-01') }}
                            @else {{ $startDate }}
                            @endif"
                        >
                        <input type="text" class="col-md m-1 form-control flatpickr fp-date" name="endDate" id="endDate" value="
                            @if(!$endDate)
                                {{ now()->format('Y-m-d') }}
                            @else {{ $endDate }}
                            @endif"
                        >
                    </div>
                    <button type="submit" class="col btn btn-info btn-sm">Jegyzetek keresése</button>
                </form>
            <div class="row mb-4">
                <div class="col-md-6">
                    <a class="btn btn-warning btn-sm btn-block" role="button" href="/allnotes">
                        Összes jegyzet
                    </a>

                </div>
                <div class="col-md-6 mt-2 mt-md-0">
                    <a class="btn btn-success btn-sm btn-block" role="button" href="{{ route('notes.create') }}">
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
                            <div class="col-md-2  mt-2 mt-md-0 btn-group" role="group">
                                <a class="btn btn-primary btn-sm. col-md-6" role="button" href="{{ route('notes.edit', $note) }}">
                                    Szerkesztés
                                </a>
                                <button class="btn btn-danger btn-sm col-md-6" data-toggle="modal" data-target="#deleteModal">
                                    Törlés
                                </button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <x-deleteModal :modelName="'a jegyzetet'" :actionPath="route('notes.destroy', $note)"/>
@endsection
