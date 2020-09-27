<div class="row note-card">
    <div class="col-md-9">{!! $note->note !!}</div>
    <div class="col-md-3">
        <a class="btn btn-info btn-sm btn-block" role="button" href="{{ route('notes.edit', $note) }}">
            Szerkesztés
        </a>
    </div>
</div>



