@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8">
            <h2>Új munka felvitele</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8">
            <form method="POST" action="/work">
                {{ csrf_field() }}
                {{--  cutomer & contact  --}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="customer" class="required">Megrendelő cég: *</label>
                        <select class="form-control" id="customer" name="customer" required>
                            <option value="" selected disabled>Válassz céget</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contacts">Kapcsolat:</label>
                        <select class="form-control select2-multi" id="contacts" name="contacts[]" multiple>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }} - {{ $employee->company->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">
                            Többet is ki tudsz választani.
                        </small>
                    </div>
                </div>
                {{--  /.row /customer & /contact  --}}
                {{--  order number  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="order_number">Megrendelésszám:</label>
                        <input type="text" class="form-control" id="order_number" name="order_number">
                    </div>
                </div>
                {{--  /.row /order number  --}}
                {{--  date & time & need  --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="date">Dátum:</label>
                        <input type="date" class="form-control flatpickr fp-date" id="date" name="date">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="time">Időpont:</label>
                        <input type="time" class="form-control flatpickr fp-time" id="time" name="time">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="need">Igény:</label>
                        <input type="text" class="form-control" id="need" name="need" placeholder="pl.: 3t+2">
                    </div>
                </div>
                {{--  /.row /date & /time & /need  --}}
                {{--  address  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="address">Cím:</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                </div>
                {{--  /.row /address  --}}
                {{--  lead  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label class="required" for="address">Munka ismertetése: *</label>
                        <input type="text" class="form-control" id="lead" name="lead" required placeholder="Munka egy mondatos leírása, pl.: költöztetés, gépszállítás, stb.">
                    </div>
                </div>
                {{--  /.row /lead  --}}
                {{--  description  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="description" class="required">A munka leírása: *</label>
                        <textarea class="form-control" id="summernote" name="description" placeholder="Munka ismertetése" rows="10" required></textarea>
                    </div> 
                </div>
                {{--  /.row /description  --}}
                {{--  comment  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="comment">Megjegyzés (csak az iroda látja):</label>
                        <input type="text" class="form-control" id="comment" name="comment" placeholder="Ár, stb.">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>
                </div>
                {{--  /.row /submit button  --}}
                
                @include ('layouts.errors')
            </form>
        </div>
        {{--  /.col-12 .col-lg-10 .col-xl-8  --}}
        <div class="w-100 mb-3"></div>
    </div>
    {{--  /.row  --}}
@endsection
