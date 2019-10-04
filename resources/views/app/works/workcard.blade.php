{{--  Work card  --}}
<div class="card">
    {{--  Card header  --}}
        <div class="card-header">
            <div class="row">
                <h4 class="col-sm-8 col-md-9">
                    <a href="/works/{{ $work->id }}">
                        {{ $work->customer->name }}
                    </a>
                </h4>
                <div class="col-sm-4 col-md-3 text-left text-sm-right">
                    <small>Dátum:</small>
                    {{ $work->date }}
                </div>
            </div>
        </div>
    {{--  /Card header  --}}
    {{--  Card body  --}}
    <div class="card-body">
        <div class="row alert alert-secondary">
            {{--  address  --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-3">
                        <small>Cím:</small>
                    </div>
                    <div class="col-9">
                        <strong>{{ $work->address }}</strong>
                    </div>
                </div>
            </div>
            {{--  /address  --}}
            {{--  time & need  --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <p>
                                    <small>Kiállás:</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <strong>
                                        @if ( !($work->time == NULL) )
                                            {{ Carbon\Carbon::parse($work->time)->format('H:i') }}
                                        @endif
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <div class="col-6">
                                <p>
                                    <small>Igény:</small>
                                </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <strong>{{ $work->need }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{--  /time & /nedd  --}}
        </div>
        <div class="row">
            {{--  description  --}}
            <div class="col-md-6">
                <div class="card-text mb-3">
                    {!! $work->description !!}
                </div>
            </div>
            {{--  /description--}}
            {{--  contact & order number & trucks & workers & subcontractors  --}}
            <div class="col-md-6 ml-auto">
                <div class="row mb-3">
                    <div class="col-sm-3 col-md-5">
                        <small>Megrendelésszám:</small>
                    </div>
                    <div class="col-sm-9 col-md-7">
                        {{ $work->order_number }}
                    </div>
                </div>
                @if ($work->contacts->isEmpty())
                    @else
                        <div class="row mb-3">
                            <div class="col-sm-3 col-md-5">
                                <p><small>Kapcsolat:</small></p>
                            </div>
                            <div class="col-sm-9 col-md-7">
                                @foreach ($work->contacts as $contact)
                                    <li class="list-group-item"><strong><small>
                                        {{ $contact->name }} - {{ $contact->phone }}
                                    </small></strong></li>
                                @endforeach
                            </div>
                        </div>
                @endif
                @if ($work->trucks->isEmpty())
                @else
                    <div class="row">
                        <div class="col-sm-3 col-md-5">
                            <p>
                                <small>Rendszám:</small>
                            </p>
                        </div>
                        <div class="col-sm-9 col-md-7">
                            <ul class="list-group">
                                @foreach ($work->trucks as $truck)
                                    <li class="list-group-item"><strong><small>
                                        {{ $truck->plate }}
                                    </small></strong></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-sm-3 col-md-5">
                        <p>
                            <small>Munkát végzők:</small>
                        </p>
                    </div>
                    <div class="col-sm-9 col-md-7">
                        <ul class="list-group">
                            @foreach ($work->workers as $worker)
                                <li class="list-group-item"><strong><small>
                                    {{ $worker->name }}
                                </small></strong></li>
                            @endforeach
                            @foreach ($work->subcontractors as $subcontractor)
                                <li class="list-group-item"><strong><small>
                                    {{ $subcontractor->name }}
                                </small></strong></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{--  /order number & /trucks & /workers & /subcontractors  --}}
        </div>
    </div>
    {{--  /Card body  --}}
    {{--  Card body  --}}
    <div class="card-body">
        {{--  comment  --}}
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-3 col-md-5">
                        <small>Ár, megjegyzés:</small>
                    </div>
                    <div class="col-sm-9 col-md-7">
                        {{ $work->comment }}
                    </div>
                </div>
            </div>
            {{--  /comment  --}}
            {{--  worksheet  --}}
            <div class="col-md-6">
                <div class="row">
                    <div class="col-sm-3 col-md-5">
                        <p>
                            <small>Munkalap:</small>
                        </p>
                    </div>
                    <div class="col-sm-9 col-md-7">
                        <p>
                            @if ( !($work->started_time == NULL) && !($work->ended_time == NULL) )
                                {{ Carbon\Carbon::parse($work->started_time)->format('H:i') }} -
                                {{ Carbon\Carbon::parse($work->ended_time)->format('H:i') }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        {{--  /worksheet  --}}
    </div>
    {{--  /Card body  --}}
    {{--  Card footer  --}}
    <div class="card-footer">
        {{--  buttons  --}}
        @if (Request::is('work/*'))
            <div class="row">
                <div class="col-md-6 text-center mb-3 mb-md-0">
                    <a href="/work/{{ $work->id }}/edit" class="btn btn-primary btn-md btn-block">
                        Szerkesztés
                    </a>
                </div>
                <div class="col-md-6 text-center">
                    @if (!$work->billed_at)
                        <form action="/work/{{ $work->id }}/billing" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-md btn-block">
                                Számlázva
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <a href="/work/{{ $work->id }}/edit" class="btn btn-primary btn-md btn-block">
                        Szerkesztés
                    </a>
                </div>
                <div class="col-md-4 text-center mb-3 mb-md-0">
                    <a href="/work/{{ $work->id }}" class="btn btn-secondary btn-md btn-block">
                        Részletek
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    @if (!$work->billed_at)
                        <form action="/work/{{ $work->id }}/billing" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-md btn-block">
                                Számlázva
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endif
        {{--  /buttons  --}}
    </div>
    {{--  /Card footer  --}}
</div>
{{--  /Work card  --}}