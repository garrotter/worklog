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
                                                    // var day = '<?php echo $day; ?>';
                                                    var day = '{{ $day }}';
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
                                @endif
                            </div>
                            {{--  /Date's name  --}}
                        </div>
                        {{-- Notes --}}
                        @if (isset($notes) && !$notes->isEmpty())
                            <div class="row">
                                <div class="col-10 mx-auto alert alert-info" role="alert">
                                    @foreach ($notes as $note)
                                        @include('app.notes.noteCard')
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
                    <main class="col-lg-12 col-xl-10">
                        <h2>{{ $message }}</h2>
                        @include('app.works.workslist')
                    </main>
                </div>
                {{--  /Main content  --}}
            {{--  /Main  --}}
@endsection
