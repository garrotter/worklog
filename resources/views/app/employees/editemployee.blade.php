@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Megrendelő / kapcsolat szerkesztése</h2>
            <h2>{{ $employee->name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="/employee/{{ $employee->id }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="name" class="required">Név: *</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $employee->name }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="phone" class="required">Telefon: *</label>
                        <input type="text" class="form-control" id="phone" name="phone" required value="{{ $employee->phone }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="email">E-mail cím:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="company" class="required">Cég: *</label>
                        <select class="form-control" id="company" name="company" required>
                            <option value="" selected disabled>Válassz céget</option>
                            @foreach ($companies as $company)
                                @if (!$company->archived_at)
                                    @if (!($company->id == $employee->company->id))
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @else
                                        <option selected value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-md-6">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>
            </form>
                    <div class="form-group col-md-6">
                        <form action="/employee/{{ $employee->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Törlés</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
