@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Megrendelő / kapcsolat hozzáadása</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="/employee">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="name" class="required">Név: *</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="phone" class="required">Telefon: *</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="form-group col-12">
                        <label for="email">E-mail cím:</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group col-12">
                        <label for="company" class="required">Cég: *</label>
                        <select class="form-control" id="company" name="company" required>
                            <option value="" selected disabled>Válassz céget</option>
                            @foreach ($companies as $company)
                                @if (!$company->archived_at)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-md-6 mx-auto ">
                        <button type="submit" class="btn btn-primary btn-block">Hozzáadás</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
