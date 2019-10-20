@if (isset($works[$i]))
    <div>
        <h5>
            <a href="/work/{{ $works[$i]->id }}">
                {{ $works[$i]->customer->name }}
            </a>
        </h5>
    </div>
    <div class="text-secondary">
        @if ( !($works[$i]->time == NULL) )
            <small>Kiállás: {{ Carbon\Carbon::parse($works[$i]->time)->format('H:i') }}</small>
        @endif
    </div>
    <div>
        {{ $works[$i]->lead }}
    </div>
    @if ($works[$i]->billed_at)
        <div class="col-12 p-0 text-right text-success">
            <i class="fa fa-check-square-o" aria-hidden="true"></i>
        </div>
    @endif
@endif