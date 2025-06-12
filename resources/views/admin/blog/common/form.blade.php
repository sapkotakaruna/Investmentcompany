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
        <div class="col-md-4">
            <div class="form-group">
                <label for="type">Type</label>
                {!! Form::select('type', ['blog' => 'Blog', 'news' => 'Timeline', 'event' => 'Event'], null, [
                    'class' => $errors->has('type') ? 'form-control is-invalid' : 'form-control',
                    'id' => 'type',
                ]) !!}
                @error('type')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="upcoming">

        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="author">Author</label>
                {!! Form::text('author', null, [
                    'class' => $errors->has('author') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Author',
                ]) !!}
                @error('author')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="date">Date</label>
                {!! Form::date('date', null, [
                    'class' => $errors->has('date') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('date')
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
        $('#type').on('change', function() {

            hide_show($(this).val())
        });
        $(document).ready(function() {
            hide_show($('#type').val())
        });

        function hide_show(value) {
            if (value == 'event') {

                $('.upcoming').addClass('col-md-4');
                $('.upcoming').html(`
                       
             <div class="form-group">
                    <label for="upcoming">Upcoming</label>
                    {!! Form::select('upcoming', ['0' => 'No', '1' => 'Yes'], null, [
                        'class' => $errors->has('upcoming') ? 'form-control is-invalid' : 'form-control',
                    ]) !!}
                    @error('upcoming')
                        <span class="help-block invalid-feedback">
                            <strong> {{ $message }} </strong>
                        </span>
                    @enderror
                </div>
           `);
            } else {
                $('.upcoming').removeClass('col-md-4');
                $('.upcoming').html(` `);
            }
        }
    </script>
@endsection
