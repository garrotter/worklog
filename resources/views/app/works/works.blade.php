@extends ('layouts.master')

@section ('content')
                {{--  Main  --}}
                {{--  Main header  --}}
                <div class="row">
                    <div class="col-sm-9 col-lg-10 col-xl-8">
                        <div class="row">
                            {{--  Date's name  --}}
                            <div class="col-12">
                                @php $link = "$_SERVER[REQUEST_URI]"; @endphp
                                @if (!($link == '/works/notbilled') && !($link == '/works/drafts'))
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <h2>
                                                <a href="/works?selected_date={{ $prev_date = date('Y-m-d', strtotime($day .' -1 day')) }}">
                                                    <i class="fa fa-caret-left" aria-hidden="true"></i>
                                                </a>
                                            </h2>
                                        </div>
                                        <div class="col-8">
                                            <h2>
                                                <span id="daysname"></span>i munkák
                                                <script type="text/javascript">
                                                    var day = '<?php echo $day; ?>';
                                                </script>
                                            </h2>
                                        </div>
                                        <div class="col-2 text-center">
                                            <h2>
                                                <a href="/works?selected_date={{ $prev_date = date('Y-m-d', strtotime($day .' +1 day')) }}">
                                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                                </a>
                                            </h2>
                                        </div>
                                    </div>
                                @elseif ($link == '/works/notbilled' && $works->isEmpty())
                                    <h2>
                                        Minden elvégzett munka ki van számlázva!
                                    </h2>
                                @elseif ($link == '/works/drafts')
                                    @if ($works->isEmpty())
                                        <h2>
                                            Nincs függő munka
                                        </h2>
                                    @else
                                        <h2>
                                            Függőben lévő munkák
                                        </h2>
                                    @endif
                                @else
                                    <h2>Nincs számlázva:</h2>
                                @endif
                            </div>
                            {{--  /Date's name  --}}
                        </div>
                        {{-- Notes --}}
                        @if (isset($notes) && !$notes->isEmpty())
                            <div class="row">
                                <div class="col-10 ml-auto mr-auto alert alert-info" role="alert">
                                    @foreach ($notes as $note)
                                        <div class="row">
                                            <div class="col-md-9">{!! $note->note !!}</div>
                                            <div class="col-md-3">
                                                <a class="btn btn-info btn-sm btn-block" role="button" href="/notes/{{ $note->id }}/edit">
                                                    Szerkesztés
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        {{-- /Notes --}}
                    </div>
                    {{--  Date picker  --}}
                    <div class="col-sm-3 col-lg-2">
                        <form action="/works" method="GET">
                            <div class="form-group">
                                <label for="selected_date"><small>Dátum:</small></label>
                                <input type="text" class="form-control flatpickr fp-date" id="selected_date" name="selected_date">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning btn-sm btn-block">Ugrás</button>
                            </div>
                        </form>
                    </div>
                    {{--  /Date picker  --}}
                </div>
                {{--  /Main header  --}}
                {{--  Main content  --}}
                <div class="row">
                    <main class="col-12">
                            {{--  Not billed or works  --}}
                        @if (($works->isEmpty() && $link == '/works/notbilled') || ($works->isEmpty() && $link == '/works/drafts'))
                            {{--  No works on selected day  --}}
                        @elseif ($works->isEmpty())
                            <h2>Sajnos nincs munka!</h2>
                        @else
                        {{--  Works listed on selected day  --}}
                            @foreach ($works as $work)
                                <div class="row">
                                    <div class="col-lg-12 col-xl-10">
                                        <div class="card">
                                            {{--  Card header  --}}
                                            <div class="card-header">
                                                <div class="row">
                                                    <h4 class="col-sm-8 col-md-9">
                                                        <a href="/work/{{ $work->id }}">
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
                                                        <div class="card-text mb-3 mb-md-0">
                                                            {!! $work->description !!}
                                                        </div>
                                                    </div>
                                                    {{--  /description  --}}
                                                    {{--  contact & order number & trucks & workers & subcontractors  --}}
                                                    <div class="col-md-6">
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
                                                            <div class="row mb-3">
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
                                                </div>
                                            </div>
                                            <div class="card-footer">
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-100 mb-3"></div>
                            @endforeach
                        @endif
                    </main>
                </div>
                {{--  /Main content  --}}
            {{--  /Main  --}}
@endsection
