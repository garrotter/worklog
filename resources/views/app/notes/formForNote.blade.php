@extends ('layouts.master')

@section ('content')

    @if ($note->exists)
        @php
            $message = "Jegyzet szerkesztése";
            $actionPath = route('notes.update', $note);
            $actionMethod = "PUT";
        @endphp
    @else
        @php
            $message = "Jegyzet hozzádasása";
            $actionPath = route('notes.store');
            $actionMethod = "POST";
        @endphp
    @endif

    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            {{-- <h2>Jegyzet szerkesztése</h2> --}}
            <h2>{{ $message }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto">
            <form method="POST" action="{{ $actionPath }}">
                @method($actionMethod)
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="date" class="required">Dátum: *</label>
                        <input type="text" class="form-control flatpickr fp-date" id="date" name="date" required
                            value="{{ old('date', $note->date) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-12">
                        <label for="note" class="required">Jegyzet: *</label>
                        <textarea class="form-control" id="summernote" name="note" placeholder="Jegyzet" rows="10" required>
                            {{ old('note', $note->note) }}
                        </textarea>
                    </div>
                </div>
                @include ('layouts.errors')
                <div class="row">
                    <div class="form-group col-lg-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>
            </form>

                    @if ($note->exists)
                        <div class="form-group col-lg-6">
                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">
                                Törlés
                            </button>
                        </div>

                        <x-deleteModal :modelName="'a jegyzetet'" :actionPath="route('notes.destroy', $note)"/>
                    @endif
                </div>

        </div>
    </div>
@endsection
