<div class="card-body ">
    <div class="col-md-12 row">
        {!! Form::hidden('member_category_id', $data['member_category'], null, [
            'class' => $errors->has('member_category_id') ? 'form-control is-invalid' : 'form-control',
            'placeholder' => '--SELECT MEMBER CATEGORY--',
        ]) !!}
        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Name*</label>
                {!! Form::text('name', null, [
                    'class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Title',
                ]) !!}
                @error('name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="post">Post</label>
                {!! Form::text('post', null, [
                    'class' => $errors->has('post') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Post Name',
                ]) !!}
                @error('post')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="phone">Phone</label>
                {!! Form::text('phone', null, [
                    'class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. 9848000000',
                ]) !!}
                @error('phone')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="email">email Address</label>
                {!! Form::text('email', null, [
                    'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Company Nepali',
                ]) !!}
                @error('email')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="title">isinfo</label>
                {!! Form::select('isinfo', ['0' => 'InActive', '1' => 'Information', '2' => 'compliance'], null, [
                    'class' => $errors->has('isinfo') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('isinfo')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="row">Row</label>
                {!! Form::text('row', null, [
                    'class' => $errors->has('row') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. 1',
                ]) !!}
                @error('row')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="rank">Rank</label>
                {!! Form::text('rank', null, [
                    'class' => $errors->has('rank') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. 1',
                ]) !!}
                @error('rank')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
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
        <div class="col-md-12">
            <div class="card card-gray-dark">
                <div class="card-header">
                    Photo
                    <span style="float: right;"> Image Demo <a href="{{ asset('imageDemo/member.psd') }}"
                            target="_blank" download> <i class="fa fa-download" aria-hidden="true"></i> </a></span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="photo_upload">Upload Photo <span> image size (433x1280)</span></label>
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
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>

@section('formJs')
    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                var photo = document.getElementById("photo");
                preview.src = src;
                photo.value = src;
                preview.style.display = "block";

            }
        }
    </script>
@endsection
