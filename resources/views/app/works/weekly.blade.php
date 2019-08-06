@extends ('layouts.master')

@section ('content')
    {{--  Main  --}}
    {{--  Main header  --}}
    <div class="row">
        <div class="col-lg-12 col-xl-10 mx-auto">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-2 text-center">
                            <h2>
                                <a href="/works/week?start_date={{ date('Y-m-d', strtotime($monday .' -1 week')) }}">
                                    <i class="fa fa-caret-left" aria-hidden="true"></i>
                                </a>
                            </h2>
                        </div>
                        <div class="col-8">
                            <h2>
                                {{ 'Hét: ' . $monday->format('W') }}
                            </h2>
                        </div>
                        <div class="col-2 text-center">
                            <h2>
                                <a href="/works/week?start_date={{ date('Y-m-d', strtotime($monday .' +1 week')) }}">
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  /Main header  --}}
    {{--  Main content  --}}
    <div class="row">
        <main class="col-lg-12 col-xl-10 mx-auto">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-sm">
                    <thead class="thead-dark">
                        <tr class="text-center">
                            <th>
                                <a href="/works?selected_date={{ $monday->format('Y-m-d') }}">
                                    Hétfő<br>
                                    {{ $monday->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th>
                                <a href="/works?selected_date={{ $tuesday->format('Y-m-d') }}">
                                    Kedd<br>
                                    {{ $tuesday->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th>
                                <a href="/works?selected_date={{ $wednesday->format('Y-m-d') }}">
                                    Szerda<br>
                                    {{ $wednesday->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th>
                                <a href="/works?selected_date={{ $thursday->format('Y-m-d') }}">
                                    Csütörtök<br>
                                    {{ $thursday->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th>
                                <a href="/works?selected_date={{ $friday->format('Y-m-d') }}">
                                    Péntek<br>
                                    {{ $friday->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="saturday">
                                <a href="/works?selected_date={{ $saturday->format('Y-m-d') }}">
                                    Szombat<br>
                                    {{ $saturday->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="sunday">
                                <a href="/works?selected_date={{ $sunday->format('Y-m-d') }}">
                                    Vasárnap<br>
                                    {{ $sunday->format('Y.m.d.') }}
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>                    
                        @for ($i = 0; $i < $maxWork; $i++)
                            <tr>
                                <td>
                                    @if (isset($worksMonday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksMonday[$i]->id }}">
                                                    {{ $worksMonday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksMonday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksMonday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksMonday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($worksTuesday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksTuesday[$i]->id }}">
                                                    {{ $worksTuesday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksTuesday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksTuesday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksTuesday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($worksWednesday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksWednesday[$i]->id }}">
                                                    {{ $worksWednesday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksWednesday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksWednesday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksWednesday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($worksThursday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksThursday[$i]->id }}">
                                                    {{ $worksThursday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksThursday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksThursday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksThursday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($worksFriday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksFriday[$i]->id }}">
                                                    {{ $worksFriday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksFriday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksFriday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksFriday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($worksSaturday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksSaturday[$i]->id }}">
                                                    {{ $worksSaturday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksSaturday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksSaturday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksSaturday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    @if (isset($worksSunday[$i]))
                                        <div>
                                            <h5>
                                                <a href="/work/{{ $worksSunday[$i]->id }}">
                                                    {{ $worksSunday[$i]->customer->name }}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="text-secondary">
                                            @if ( !($worksSunday[$i]->time == NULL) )
                                                <small>Kiállás: {{ Carbon\Carbon::parse($worksSunday[$i]->time)->format('H:i') }}</small>
                                            @endif
                                        </div>
                                        <div>
                                            {{ $worksSunday[$i]->lead }}
                                        </div>
                                    @endif
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    {{--  /Main content  --}}
    {{--  /Main  --}}
@endsection