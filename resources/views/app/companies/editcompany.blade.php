@extends ('layouts.master')

@section ('content')
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8">
            <h2>Megrendelő cég szerkesztése</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-10 col-xl-8">
            <form method="POST" action="/company/{{ $company->id }}">
                @csrf
                {{--  cutomer name & tax  --}}
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="name" class="required">Megrendelő cég: *</label>
                        <input type="text" class="form-control" id="name" name="name" required value="{{ $company->name }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tax">Adószám:</label>
                        <input type="text" class="form-control" id="tax" name="tax" value="{{ $company->tax }}">
                    </div>
                </div>
                {{--  /.row /customer name & /tax  --}}
                {{--  bill address  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <h4>Számlázási cím:</h4>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="bill_zip">Irányítószám:</label>
                        <input type="text" class="form-control" id="bill_zip" name="bill_zip" value="{{ $company->bill_zip }}">
                    </div>
                    <div class="form-group col-sm-10">
                        <label for="bill_country">Ország:</label>
                        <input type="text" class="form-control" id="bill_country" name="bill_country" value="{{ $company->bill_country }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bill_city">Város:</label>
                        <input type="text" class="form-control" id="bill_city" name="bill_city" value="{{ $company->bill_city }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bill_address">Utca, házszám:</label>
                        <input type="text" class="form-control" id="bill_address" name="bill_address" value="{{ $company->bill_address }}">
                    </div>
                </div>
                {{--  /.row /bill address  --}}
                {{--  post address  --}}
                <div class="row">
                    <div class="form-group col-12">
                        <h4>Postázási cím:</h4>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="post_zip">Irányítószám:</label>
                        <input type="text" class="form-control" id="post_zip" name="post_zip" value="{{ $company->post_zip }}">
                    </div>
                    <div class="form-group col-sm-10">
                        <label for="post_country">Ország:</label>
                        <input type="text" class="form-control" id="post_country" name="post_country" value="{{ $company->post_country }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="post_city">Város:</label>
                        <input type="text" class="form-control" id="post_city" name="post_city" value="{{ $company->post_city }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="post_address">Utca, házszám:</label>
                        <input type="text" class="form-control" id="post_address" name="post_address" value="{{ $company->post_address }}">
                    </div>
                </div>
                {{--  /.row /post address  --}}

                @include ('layouts.errors')

                {{--  buttons  --}}
                <div class="row">
                    <div class="form-group col-md-6 mx-auto">
                        <button type="submit" class="btn btn-primary btn-block">Mentés</button>
                    </div>        
                </div>
                {{--  /.row /buttons  --}}
            </form>
        </div>
        {{--  /.col-12 .col-lg-10 .col-xl-8  --}}
        <div class="w-100 mb-3"></div>
    </div>
    {{--  /.row  --}}

        

@endsection
