<div class="card-body ">
    <div class="col-md-12 row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="title">Title*</label>
                {!! Form::text('title', null, [
                    'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Title',
                ]) !!}
                @error('title')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="form-group">
                <label for="nepali_title">Name Title</label>
                {!! Form::text('nepali_title', null,[
                     'class'=> $errors->has('nepali_title')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg.Name Title',
                ]) !!}
                @error('nepali_title')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div> --}}
        <div class="col-md-4">
            <div class="form-group">
                <label for="start_date">Start Date</label>
                {!! Form::date('start_date', null, [
                    'class' => $errors->has('start_date') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('start_date')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="end_date">End Date</label>
                {!! Form::date('end_date', null, [
                    'class' => $errors->has('end_date') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('end_date')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="is_popup">Popup</label>
                {!! Form::select('is_popup', ['1' => 'Popup On', '0' => 'Popup Off'], null, [
                    'class' => $errors->has('is_popup') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('is_popup')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div> <div class="col-md-4">
            <div class="form-group">
                <label for="display">Display</label>
                {!! Form::select('displaystat', ['0' => 'Notice Only', '1' => 'Breaking Only', '2'=>'Both'], null, [
                    'class' => $errors->has('displaystat') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('displaystat')
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
