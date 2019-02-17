@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Teherautó szerkesztése</h2>
        <h2>{{ $truck->plate }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="/truck/{{ $truck->id }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="plate" class="required">Rendszám: *</label>
                        <input type="text" class="form-control" id="plate" name="plate" required value="{{ $truck->plate }}">
                    </div>
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-lg-6">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>
            </form>
                    <div class="form-group col-lg-6">
                        <form action="/truck/{{ $truck->id }}" method="POST">
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
