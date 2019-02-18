@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <h2>Jegyzet szerkesztése</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
        <form method="POST" action="/note/{{ $note->id }}">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="date" class="required">Dátum: *</label>
                        <input type="text" class="form-control flatpickr fp-date" id="date" name="date" required value="{{ $note->date }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="note" class="required">Jegyzet: *</label>
                        <textarea class="form-control" id="summernote" name="note" placeholder="Jegyzet" rows="10" required>{{ $note->note }}</textarea>
                    </div> 
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-lg-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>
            </form>
                    <div class="form-group col-lg-6">
                        <form action="/note/{{ $note->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Törlés</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
@endsection
