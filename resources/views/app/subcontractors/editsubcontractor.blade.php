@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Allvállalkozó szerkesztése</h2>
            <h2>{{ $subcontractor->name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="/subcontractor/{{ $subcontractor->id }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="name" class="required">Név: *</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $subcontractor->name }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="phone" class="required">Telefon: *</label>
                        <input type="text" class="form-control" id="phone" name="phone" required value="{{ $subcontractor->phone }}">
                    </div>
                    <div class="form-group col-12">
                        <label for="email">E-mail cím:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $subcontractor->email }}">
                    </div>
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>
            </form>
                    <div class="form-group col-lg-6">
                        <form action="/subcontractor/{{ $subcontractor->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Törlés</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
