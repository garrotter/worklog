@extends ('layouts.master')

@section ('content')
<div class="row">
    <div class="col-lg-12 col-xl-10">
        <h2>{{ $company->name }}</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-10">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        @isset($company->tax)
                        <div class="col-12">
                            Adószám: {{ $company->tax }}
                        </div>
                        @endisset
                        @if(isset($company->bill_country) || isset($company->bill_zip) || isset($company->bill_city) || isset($company->bill_address))
                            <div class="col-12 mt-2">
                                <h4>Számlázási adatok:</h4>
                                {{ $company->bill_country }}<br/>
                                {{ $company->bill_zip }}
                                {{ $company->bill_city }},
                                {{ $company->bill_address }}
                            </div>
                        @endif
                        @if(isset($company->post_country) || isset($company->post_zip) || isset($company->post_city) || isset($company->post_address))
                            <div class="col-12 mt-2">
                                <h4>Postázási adatok:</h4>
                                {{ $company->post_country }}<br/>
                                {{ $company->post_zip }}
                                {{ $company->post_city }},
                                {{ $company->post_address }}
                            </div>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <ul class="list-group">
                            @foreach ($employees as $employee)
                                @if (!$employee->archived_at)
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-md-7">
                                                <a href="/employee/{{ $employee->id }}/edit">
                                                    {{ $employee->name }}
                                                </a>
                                            </div>
                                            <div class="col-md-5">{{ $employee->phone }}</div>
                                            <div class="col-md-12">{{ $employee->email }}</div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <a href="/company/{{ $company->id }}/edit" class="btn btn-primary btn-md btn-block">
                            Szerkesztés
                        </a>
                    </div>
                    <div class="form-group col-md-6">
                        <form action="/company/{{ $company->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Törlés</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection