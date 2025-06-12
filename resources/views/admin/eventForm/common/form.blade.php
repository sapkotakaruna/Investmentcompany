@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body ">
    <div class="col-md-12 row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="event_id">Event<span class="red">*</span></label>
                {!! Form::select('event_id', $data['events'], null, [
                    'class' => $errors->has('event_id') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => '--SELECT Event--',
                ]) !!}
                @error('event_id')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="name">Name*</label>
                {!! Form::text('name', null, [
                    'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Name',
                ]) !!}
                @error('name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="nepali_name">Nepali Name</label>
                {!! Form::text('nepali_name', null, [
                    'class' => $errors->has('nepali_name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Nepali Name',
                ]) !!}
                @error('nepali_name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="designation">Designation</label>
                {!! Form::text('designation', null, [
                    'class' => $errors->has('designation') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Designation',
                ]) !!}
                @error('designation')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="organization_name">Organization Name</label>
                {!! Form::text('organization_name', null, [
                    'class' => $errors->has('organization_name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Organization Name',
                ]) !!}
                @error('organization_name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="nepali_organization_name">Nepali Organization Name</label>
                {!! Form::text('nepali_organization_name', null, [
                    'class' => $errors->has('nepali_organization_name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Nepali Organization Name',
                ]) !!}
                @error('nepali_organization_name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="district">District</label>
                {!! Form::text('district', null, [
                    'class' => $errors->has('district') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. District',
                ]) !!}
                @error('district')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="municipality">Municipality</label>
                {!! Form::text('municipality', null, [
                    'class' => $errors->has('municipality') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Municipality',
                ]) !!}
                @error('municipality')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="ward">Ward</label>
                {!! Form::text('ward', null, [
                    'class' => $errors->has('ward') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Ward',
                ]) !!}
                @error('ward')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="street">Street</label>
                {!! Form::text('street', null, [
                    'class' => $errors->has('street') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Street',
                ]) !!}
                @error('street')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="telephone_no">Telephone No</label>
                {!! Form::text('telephone_no', null, [
                    'class' => $errors->has('telephone_no') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Telephone No',
                ]) !!}
                @error('telephone_no')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="phone_no">Phone No</label>
                {!! Form::text('phone_no', null, [
                    'class' => $errors->has('phone_no') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Phone No',
                ]) !!}
                @error('phone_no')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="qualification">Qualification</label>
                {!! Form::text('qualification', null, [
                    'class' => $errors->has('qualification') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Qualification',
                ]) !!}
                @error('qualification')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="email">Email</label>
                {!! Form::email('email', null, [
                    'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Email',
                ]) !!}
                @error('email')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="card card-gray-dark">
                <div class="card-header">
                    Photo
                    <span style="float: right;"> Image Demo <a href="{{ asset('imageDemo/service.psd') }}"
                            target="_blank" download> <i class="fa fa-download" aria-hidden="true"></i> </a></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="photo_upload">Upload Photo </label>
                            {!! Form::file('main_photo', [
                                'class' => $errors->has('main_photo') ? 'form-control btn btn-sm is-invalid' : 'form-control btn btn-sm',
                                'id' => 'photo',
                                'onchange' => 'showPreview(event);',
                                'accept' => 'image/png, image/gif, image/jpeg',
                            ]) !!}
                            @error('main_photo')
                                <span class="help-block invalid-feedback">
                                    <strong> {{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="photo">Existing Image</label>
                            <div>
                                <img width="150" height="150"
                                    src="{{ ViewHelper::getImagePath(@$_folder, @$data['row']->voucher_photo) }}"
                                    class="img-fluid" id="file-ip-1-preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label for="voucher_status">Voucher Status</label>
                {!! Form::select('voucher_status', ['1' => 'Approve', '0' => 'Not Approved'], null, [
                    'class' => $errors->has('voucher_status') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('voucher_status')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="status">Status</label>
                {!! Form::select('status', ['1' => 'Active', '0' => 'InActive'], null, [
                    'class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('status')
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
