@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-lg-12 col-xl-10">
            <div class="col-md-4 mx-auto">
                <form action="/works/search" method="GET" class="mx-auto mb-4">
                    <div class="form-group">
                        <div class="form-row mb-2">
                            <div class="col-md-6">
                                <h5><label for="customer">Megrendelő cég:</label></h5>
                            </div>
                            <div class="col-md-6">
                                <select class="form-control" id="customer" name="customer">
                                    <option value="" selected disabled>Válassz céget</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row mb-2">
                            <input type="text" class="col-md m-1 form-control flatpickr fp-date" 
                                name="startDate" id="startDate" 
                                value="{{ $startDate }}"
                            >
                            <input type="text" class="col-md m-1 form-control flatpickr fp-date" 
                                name="endDate" id="endDate" 
                                value="{{ $endDate }}"
                            >
                        </div>
                    </div>
                    <button type="submit" class="col btn btn-info btn-sm">Keresés</button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <main class="col-lg-12 col-xl-10">
            @isset($works)
                @include('app.works.workslist')
            @endisset
        </main>
    </div>

@endsection