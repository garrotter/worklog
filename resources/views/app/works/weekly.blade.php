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
                                <a href="/works/week?start_date={{ date('Y-m-d', strtotime($monday->date .' -1 week')) }}">
                                    <i class="fa fa-caret-left" aria-hidden="true"></i>
                                </a>
                            </h2>
                        </div>
                        <div class="col-8">
                            <h2>
                                {{ $monday->date->format('W') . '. hét' }}
                            </h2>
                        </div>
                        <div class="col-2 text-center">
                            <h2>
                                <a href="/works/week?start_date={{ date('Y-m-d', strtotime($monday->date .' +1 week')) }}">
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
                            <th class="text-center {{ !$monday->sd ? 'workday' : ($monday->sd==='r' ? 'restday' : ($monday->sd ==='h' ? 'holiday' : '')) }}">
                                <a href="/works?selected_date={{ $monday->date->format('Y-m-d') }}">
                                    Hétfő<br>
                                    {{ $monday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="text-center {{ !$tuesday->sd ? 'workday' : ($tuesday->sd==='r' ? 'restday' : ($tuesday->sd ==='h' ? 'holiday' : '')) }}">
                                <a href="/works?selected_date={{ $tuesday->date->format('Y-m-d') }}">
                                    Kedd<br>
                                    {{ $tuesday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="text-center {{ !$wednesday->sd ? 'workday' : ($wednesday->sd==='r' ? 'restday' : ($wednesday->sd ==='h' ? 'holiday' : '')) }}">
                                <a href="/works?selected_date={{ $wednesday->date->format('Y-m-d') }}">
                                    Szerda<br>
                                    {{ $wednesday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="text-center {{ !$thursday->sd ? 'workday' : ($thursday->sd==='r' ? 'restday' : ($thursday->sd ==='h' ? 'holiday' : '')) }}">
                                <a href="/works?selected_date={{ $thursday->date->format('Y-m-d') }}">
                                    Csütörtök<br>
                                    {{ $thursday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="text-center {{ !$friday->sd ? 'workday' : ($friday->sd==='r' ? 'restday' : ($friday->sd ==='h' ? 'holiday' : '')) }}">
                                <a href="/works?selected_date={{ $friday->date->format('Y-m-d') }}">
                                    Péntek<br>
                                    {{ $friday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="text-center {{ !$saturday->sd ? 'restday' : ($saturday->sd==='w' ? 'workday' : ($saturday->sd ==='h' ? 'holiday' : '')) }}">
                                <a href="/works?selected_date={{ $saturday->date->format('Y-m-d') }}">
                                    Szombat<br>
                                    {{ $saturday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                            <th class="text-center holiday">
                                <a href="/works?selected_date={{ $sunday->date->format('Y-m-d') }}">
                                    Vasárnap<br>
                                    {{ $sunday->date->format('Y.m.d.') }}
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="notes-row">
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesMonday, 'day'=>$monday])
                            </td>
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesTuesday, 'day'=>$tuesday])
                            </td>
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesWednesday, 'day'=>$wednesday])
                            </td>
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesThursday, 'day'=>$thursday])
                            </td>
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesFriday, 'day'=>$friday])
                            </td>
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesSaturday, 'day'=>$saturday])
                            </td>
                            <td class="text-right">
                                @include('app.works.weeklynotecard', ['notes'=>$notesSunday, 'day'=>$sunday])
                            </td>
                        </tr>
                        @for ($i = 0; $i < $maxWork; $i++)
                            <tr>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksMonday, 'i'=>$i])
                                </td>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksTuesday, 'i'=>$i])
                                </td>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksWednesday, 'i'=>$i])
                                </td>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksThursday, 'i'=>$i])
                                </td>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksFriday, 'i'=>$i])
                                </td>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksSaturday, 'i'=>$i])
                                </td>
                                <td>
                                    @include('app.works.weeklycard', ['works'=>$worksSunday, 'i'=>$i])
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