<div class="card-body">
    <div class="col-md-12 row">

        <div class="col-md-4">
            <div class="form-group">
                <label for="parent">Is Parent</label>
                {!! Form::select('parent_id', $data['group'], null, [
                    'class' => 'form-control',
                    'placeholder' => __('--SELECT PARENT--'),
                ]) !!}
                @error('parent_id')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="display_name">Display Title</label>
                {!! Form::text('display_name', null, [
                    'class' => $errors->has('display_name') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.BOD',
                ]) !!}
                @error('display_name')
                    <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="title">Title*</label>
                {!! Form::text('title', null, [
                    'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg.Board Of Director',
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
                     'placeholder'=>'Eg. Title Nepali',
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
