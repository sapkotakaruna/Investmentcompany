<div class="card-body">
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="title">Title <span class="red">*</span> {{ $errors }}</label>
                {!! Form::text('title', null, [
                    'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Enter title here..',
                ]) !!}
                @error('title')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Nepali Title <span class="red">*</span></label>
                {!! Form::text('nepali_title', null, [
                    'class' => $errors->has('nepali_title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'यहाँ शीर्षक टाइप गर्नुहोस्..',
                ]) !!}
                @error('nepali_title')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>File Type <span class="red">*</span></label>
                {!! Form::select('file_type', config('helper.fileType'), null, [
                    'class' => $errors->has('file_type') ? 'form-control  is-invalid' : 'form-control ',
                ]) !!}
                @error('file_type')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-3 link">
            <div class="form-group">
                <label>Link <span class="red">*</span></label>
                {!! Form::text('link', null, [
                    'class' => $errors->has('link') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Enter link here..',
                ]) !!}
                @error('link')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>



        <div class="col-md-12 file">
            <div class="card card-gray-dark">
                <div class="card-header">
                    File
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="photo_upload">Upload File</label>
                            {!! Form::file('main_file', [
                                'class' => $errors->has('main_file') ? 'form-control btn btn-sm is-invalid' : 'form-control btn btn-sm',
                                'id' => 'photo',
                                'onchange' => 'showPreview(event);',
                            ]) !!}
                            @error('main_file')
                                <span class="help-block invalid-feedback">
                                    <strong> {{ $message }} </strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="photo">Existing Image</label>
                            <div class="preview">
                                <img width="200" height="200"
                                    src="{{ ViewHelper::getImagePath(@$_folder, @$data['row']->file) }}"
                                    class="img-responsive" id="file-ip-1-preview">
                            </div>
                            @if (isset($data['row']->file) && pathinfo($data['row']->file, PATHINFO_EXTENSION) == 'mp3')
                                <audio controls>
                                    <source src="{{ ViewHelper::getImagePath(@$_folder, @$data['row']->file) }}"
                                        type="audio/mpeg">
                                    Your browser does not support the audio element.
                                </audio>
                            @endif
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
    @endsection
