@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <h2>Dolgozó hozzáadása</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <form method="POST" action="/worker">
                @csrf
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
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-lg-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Hozzáadás</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
