<div class="card-body row">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="form-group">
                <label for="question">Question</label>
                {!! Form::text('question', null, [
                    'class' => $errors->has('question') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. How to publish a blog?',
                ]) !!}
                @error('question')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="question">Answer</label>
                {!! Form::textarea('answer', null, [
                    'class' => $errors->has('question') ? 'form-control is-invalid summernote' : 'form-control summernote',
                    'placeholder' => '....',
                ]) !!}
                @error('answer')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
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
    </script>
@endsection
