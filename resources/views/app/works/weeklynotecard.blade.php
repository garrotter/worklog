@foreach ($notes as $note)
    <a href="/works?selected_date={{ $day->date->format('Y-m-d') }}" class="note-tooltip">
        <i class="fa fa-circle text-info" aria-hidden="true"></i>
        <span class="note-tooltip-text">{!! $note->note !!}</span>
    </a>
@endforeach