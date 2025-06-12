<div class="card-body ">
    <div class="col-md-12 row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="service_category_id">Service Category<span class="red">*</span></label>
                {!! Form::select('service_category_id', $data['service_category'], null, [
                    'class' => $errors->has('service_category_id') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => '--SELECT SERVICE CATEGORY--',
                ]) !!}
                @error('dafa')
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
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label for="nepali_name">Nepali Name</label>
                {!! Form::text('nepali_name', null,[
                     'class'=> $errors->has('nepali_name')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg.Nepali Nepali',
                ]) !!}
                @error('nepali_name')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div> --}}

        <div class="col-md-12">
            <div class="form-group">
                <label for="excerpt">Excerpt</label>
                {!! Form::textarea('excerpt', null, [
                    'class' => $errors->has('excerpt') ? 'form-control is-invalid summernote' : 'form-control summernote',
                    'placeholder' => 'Eg. www.facebook.com',
                ]) !!}
                @error('excerpt')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="title">is New</label>
                {!! Form::select('isnew', ['0' => 'InActive', '1' => 'Active'], null, [
                    'class' => $errors->has('isnew') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('isnew')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- <div class="col-md-3">
            <div class="form-group">
                <label for="title">is Featured</label>
                {!! Form::select('isfeatured', [ '0' => 'InActive','1' => 'Active'], null, [
                    'class' => $errors->has('isfeatured') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('isfeatured')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div> --}}

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

                            </a>
                            </span></label>
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
                                    src="{{ ViewHelper::getImagePath(@$_folder, @$data['row']->photo) }}"
                                    class="img-fluid" id="file-ip-1-preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="title">Status</label>
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
