@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <h2>Jegyzet hozzáadása</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <form method="POST" action="/note">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="date" class="required">Dátum: *</label>
                        <input type="text" class="form-control flatpickr fp-date" id="date" name="date" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="note" class="required">Jegyzet: *</label>
                        <textarea class="form-control" id="summernote" name="note" placeholder="Jegyzet" rows="10" required></textarea>
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
