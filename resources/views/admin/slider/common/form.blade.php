<div class="card-body row">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Name
                    {{-- (English)* --}}
                </label>
                {!! Form::text('title', null, [
                    'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Slider Title',
                ]) !!}
                @error('title')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- <div class="col-md-12">
            <div class="form-group">
                <label for="nepali_title">Name(Nepali)</label>
                {!! Form::text('nepali_title', null,[
                     'class'=> $errors->has('nepali_title')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg. Slider Title Nepali',
                ]) !!}
                @error('nepali_title')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Image Mode</label>
                {!! Form::select('image_mode', ['light' => 'Light', 'dark' => 'Dark'], null, [
                    'class' => $errors->has('image_mode') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('image_mode')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Caption Position</label>
                {!! Form::select('caption_position', ['center' => 'Center', 'right' => 'Right', 'left' => 'Left'], null, [
                    'class' => $errors->has('caption_position') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('caption_position')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>


    </div>
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card card-gray-dark">
                <div class="card-header">
                    Photo
                    <span style="float: right;"> Image Demo <a href="{{ asset('imageDemo/slider.psd') }}"
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
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="url">Link</label>
                    {!! Form::url('url', null, [
                        'class' => $errors->has('url') ? 'form-control is-invalid' : 'form-control',
                        'placeholder' => 'Eg. www.facebook.com',
                    ]) !!}
                    @error('url')
                        <span class="help-block invalid-feedback">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    {!! Form::textarea('excerpt', null, [
                        'class' => $errors->has('excerpt') ? 'form-control is-invalid' : 'form-control',
                        'placeholder' => 'Eg. About Slider',
                        'rows' => 4,
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
    <div class="col-md-6">
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
