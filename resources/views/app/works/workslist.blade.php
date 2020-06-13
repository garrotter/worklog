@foreach ($works as $work)
    <div class="row">
        <div class="col-12">
            @include('app.works.workcard')
        </div>
    </div>
    <div class="w-100 mb-3"></div>
@endforeach