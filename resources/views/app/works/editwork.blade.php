@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8">
            <h2>Szerkesztés</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8">
            <form method="POST" action="/work/{{ $work->id }}">
                @csrf
                {{--  cutomer & contact  --}}
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="customer" class="required">Megrendelő cég: *</label>
                        <select class="form-control" id="customer" name="customer" required>
                            @foreach ($companies as $company)
                                @if (!$company->archived_at)
                                    @if (!($company->id ==  $work->customer->id))
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @else
                                        <option selected value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contacts">Kapcsolat:</label>
                        <select class="form-control select2-multi" id="contacts" name="contacts[]" multiple>
                            @if ($work->contacts->isEmpty())
                                @foreach ($employees as $employee)
                                    @if (!$employee->archived_at)
                                        <option value="{{ $employee->id }}">{{ $employee->name }} - {{ $employee->company->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($employees as $employee)
                                    @if (!$employee->archived_at)
                                        @foreach($work->contacts as $contact)
                                            @if($employee->id == $contact->id)
                                                <option value="{{ $employee->id }}" selected>{{ $employee->name }} - {{ $employee->company->name }}</option>
                                                <?php continue 2; ?>
                                            @endif
                                        @endforeach
                                        <option value="{{ $employee->id }}">{{ $employee->name }} - {{ $employee->company->name }}</option>
                                    @endif
                                @endforeach
                            @endif
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
                        <input type="text" class="form-control" id="order_number" name="order_number" value="{{ $work->order_number }}">
                    </div>
                </div>
                {{--  /.row /order number  --}}
                {{--  date & time & need  --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="date">Dátum:</label>
                        <input type="date" class="form-control flatpickr fp-date" id="date" name="date" value="{{ $work->date }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="time">Időpont:</label>
                        <input type="time" class="form-control flatpickr fp-time" id="time" name="time" value="{{ $work->time }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="need">Igény:</label>
                        <input type="text" class="form-control" id="need" name="need" placeholder="pl.: 3t+2" value="{{ $work->need }}">
                    </div>
                </div>
                {{--  /.row /date & /time & /need  --}}
                {{--  address  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="address">Cím:</label>
                        <input type="text" class="form-control" id="address" name="address"  value="{{ $work->address }}">
                    </div>
                </div>
                {{--  /.row /address  --}}
                {{--  lead  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label class="required" for="address">Munka ismertetése: *</label>
                        <input type="text" class="form-control" id="lead" name="lead" 
                            required placeholder="Munka egy mondatos leírása, pl.: költöztetés, gépszállítás, stb." value="{{ $work->lead }}">
                    </div>
                </div>
                {{--  /.row /lead  --}}
                {{--  description  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="description" class="required">A munka leírása: *</label>
                        <textarea class="form-control" id="summernote" name="description" placeholder="Munka ismertetése" rows="10"required>
                            {{ $work->description }}
                        </textarea>
                    </div> 
                </div>
                {{--  /.row /description  --}}
                {{--  comment  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <label for="comment">Megjegyzés (csak az iroda látja):</label>
                        <input type="text" class="form-control" id="comment" name="comment" placeholder="Ár, stb." value="{{ $work->comment }}">
                    </div>
                </div>
                {{--  /.row /comment  --}}
                {{--  trucks & workers & subcontractors  --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="truck">Teherautók:</label>
                        <select class="form-control select2-multi" id="trucks" name="trucks[]" multiple>
                            @if ($work->trucks->isEmpty())
                                @foreach ($trucks as $truck)
                                    @if (!$truck->archived_at)
                                        <option value="{{ $truck->id }}">{{ $truck->plate }}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($trucks as $truck)
                                    @if (!$truck->archived_at)
                                        @foreach($work->trucks as $selected_truck)
                                            @if($truck->id == $selected_truck->id)
                                                <option value="{{ $truck->id }}" selected>{{ $truck->plate }}</option>
                                                <?php continue 2; ?>
                                            @endif
                                        @endforeach
                                        <option value="{{ $truck->id }}">{{ $truck->plate }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <small class="form-text text-muted">
                            Többet is ki tudsz választani.
                        </small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="worker">Munkát végzők:</label>
                        <select class="form-control select2-multi" id="workers" name="workers[]" multiple>
                            @if ($work->workers->isEmpty())
                                @foreach ($workers as $worker)
                                    @if (!$worker->archived_at)
                                        <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                    @endif
                                @endforeach
                            @else
                                @foreach ($workers as $worker)
                                    @if (!$worker->archived_at)
                                        @foreach($work->workers as $selected_worker)
                                            @if($worker->id == $selected_worker->id)
                                                <option value="{{ $worker->id }}" selected>{{ $worker->name }}</option>
                                                <?php continue 2; ?>
                                            @endif
                                        @endforeach
                                        <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <small class="form-text text-muted">
                            Többet is ki tudsz választani.
                        </small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="subcontractor">Allvállalkozók:</label>
                        <select class="form-control select2-multi" id="subcontractors" name="subcontractors[]" multiple>
                            @if ($work->subcontractors->isEmpty())
                                    @foreach ($subcontractors as $subcontractor)
                                        @if (!$subcontractor->archived_at)
                                            <option value="{{ $subcontractor->id }}">{{ $subcontractor->name }}</option>
                                        @endif
                                    @endforeach
                            @else
                                @foreach ($subcontractors as $subcontractor)
                                    @if (!$subcontractor->archived_at)
                                        @foreach($work->subcontractors as $selected_subcontractor)
                                            @if($subcontractor->id == $selected_subcontractor->id)
                                                <option value="{{ $subcontractor->id }}" selected>{{ $subcontractor->name }}</option>
                                                <?php continue 2; ?>
                                            @endif
                                        @endforeach
                                        <option value="{{ $subcontractor->id }}">{{ $subcontractor->name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <small class="form-text text-muted">
                            Többet is ki tudsz választani.
                        </small>
                    </div>
                </div>
                {{--  /.row /trucks & /workers & /subcontractors  --}}
                {{--  worksheet  --}}
                <div class="row">
                    <div class="form-group col-6">
                        <label for="started_time">Munkalap kezdési időpont:</label>
                        <input type="time" class="form-control flatpickr fp-time" id="started_time" name="started_time" value="{{ $work->started_time }}">
                    </div>
                    <div class="form-group col-6">
                        <label for="ended_time">Munkalap végzési időpont:</label>
                        <input type="time" class="form-control flatpickr fp-time" id="ended_time" name="ended_time" value="{{ $work->ended_time }}">
                    </div>
                </div>
                {{--  /.row /worksheet  --}}
                @include ('layouts.errors')
                {{--  buttons  --}}
                <div class="row">
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>        
            </form>
                    @if (!$work->billed_at)
                        <div class="form-group col-md-4">
                            <form action="/work/{{ $work->id }}/billing" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-block">Számlázva</button>
                            </form>
                        </div>
                    @endif
                    <div class="form-group col-md-4">
                        <form action="/work/{{ $work->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-block">Törlés</button>
                        </form>
                    </div>
                </div>
                {{--  /.row /buttons  --}}
        </div>
        {{--  /.col-12 .col-lg-10 .col-xl-8  --}}
        <div class="w-100 mb-3"></div>
    </div>
    {{--  /.row  --}}

        
@endsection
