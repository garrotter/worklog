@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Teherautó hozzáadása</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="/truck">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="plate" class="required">Rendszám: *</label>
                        <input type="text" class="form-control" id="plate" name="plate" required>
                    </div>
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-md-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Hozzáadás</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection