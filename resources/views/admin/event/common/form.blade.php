@section('formCss')
    <link href="{{ asset('backend/nepali-date-picker/css/nepali.datepicker.v3.7.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection
<div class="card-body ">
    <div class="col-md-12 row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="event_name">Event Name*</label>
                {!! Form::text('event_name', null, [
                    'class' => $errors->has('event_name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Event Name',
                ]) !!}
                @error('event_name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="event_date">Event Date*</label>
                {!! Form::text('event_date', null, [
                    'class' => $errors->has('event_date') ? 'form-control is-invalid' : 'form-control',
                    'id' => 'nepali-datepicker',
                ]) !!}
                @error('event_date')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="event_location">Event Location*</label>
                {!! Form::text('event_location', null, [
                    'class' => $errors->has('event_location') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Event Location',
                ]) !!}
                @error('event_location')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="payment">Payment*</label>
                {!! Form::select('payment', ['free' => 'Free', 'payable' => 'Payable'], null, [
                    'class' => $errors->has('payment') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('payment')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Status*</label>
                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, [
                    'class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('status')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="excerpt">Excerpt*</label>
                {!! Form::textarea('excerpt', null, [
                    'class' => $errors->has('excerpt') ? 'form-control is-invalid summernote' : 'form-control summernote',
                    'placeholder' => 'Enter a brief description',
                    'rows' => 3,
                ]) !!}
                @error('excerpt')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>






    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>

@section('formJs')
    <script src="{{ asset('backend/nepali-date-picker/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript">
    </script>
    <script type="text/javascript">
        window.onload = function() {
            var mainInput = document.getElementById("nepali-datepicker");

            mainInput.nepaliDatePicker();

        };
    </script>
@endsection
