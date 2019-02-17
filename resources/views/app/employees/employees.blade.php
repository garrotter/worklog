@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-xl-10">
            <h2>Megrendelők / kapcsolatok</h2>
        </div>
    </div>
    <div class="row employee-list">
        <div class="col-12 col-xl-10">
            <ul class="list-group list-group-striped">
                @foreach ($employees as $employee)
                    @if (!$employee->archived_at)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-3">{{ $employee->name }}</div>
                                <div class="col-md-2">{{ $employee->phone }}</div>
                                <div class="col-md-3">{{ $employee->email }}</div>
                                <div class="col-md-2">
                                        <a href="/company/{{ $employee->company->id }}">
                                            {{ $employee->company->name }}
                                        </a>
                                </div>
                                <div class="col-md-2 mt-2 mt-md-0">
                                    <a class="btn btn-primary btn-sm btn-block" role="button" href="/employee/{{ $employee->id }}/edit">
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
