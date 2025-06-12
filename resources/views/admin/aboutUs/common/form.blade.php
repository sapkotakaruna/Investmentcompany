<div class="card-body">
    <div class="row">
        <!-- Dropdown for selecting type -->
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="type">Content Type</label>
                {!! Form::select('isbranch', ['0' => 'About Us', '1' => 'Branch'], isset($data['row']) ? null : '0', [
                    'class' => 'form-control',
                    'id' => 'type-dropdown',
                    'onchange' => 'toggleBranchFields()',
                ]) !!}
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="title" id="title-label">Title*</label>
                {!! Form::text('title', null, [
                    'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Title',
                    'id' => 'title-field',
                ]) !!}
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="nepali_title" id="nepali-title-label">Name Title</label>
                {!! Form::text('nepali_title', null, [
                    'class' => $errors->has('nepali_title') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Title Nepali',
                    'id' => 'nepali-title-field',
                ]) !!}
                @error('nepali_title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4 branch-only" style="display: none;">
            <div class="form-group">
                <label for="email" id="nepali-title-label">Email</label>
                {!! Form::email('email', null, [
                    'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Email',
                ]) !!}
                @error('email')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <script>
            document.getElementById('type-dropdown').addEventListener('change', function() {
                const isBranch = this.value === '1';
                document.querySelectorAll('.branch-only').forEach(function(element) {
                    element.style.display = isBranch ? 'block' : 'none';
                });
            });
        </script>
        <div class="col-md-4 branch-only" style="display: none;">
            <div class="form-group">
                <label for="map_link" id="nepali-title-label">Map Link</label>
                {!! Form::text('map_link', null, [
                    'class' => $errors->has('map_link') ? 'form-control is-invalid' : 'form-control',
                    'placeholder' => 'Eg. Map Link',
                ]) !!}
                @error('map_link')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <label for="status">Status</label>
                {!! Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, [
                    'class' => $errors->has('status') ? 'form-control is-invalid' : 'form-control',
                ]) !!}
                @error('status')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="excerpt" id="excerpt-label">Excerpt</label>
                {!! Form::textarea('excerpt', null, [
                    'class' => $errors->has('excerpt') ? 'form-control is-invalid summernote' : 'form-control summernote',
                    'id' => 'excerpt-field',
                ]) !!}
                @error('excerpt')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $button }}</button>
</div>

@section('formJs')
    <script>
        function toggleBranchFields() {
            var type = document.getElementById('type-dropdown').value;
            var isBranch = type === '1';

            document.getElementById('title-label').textContent = isBranch ? 'Branch Name*' : 'Title*';
            document.getElementById('title-field').placeholder = isBranch ? 'Eg. Branch Name' : 'Eg. Title';

            document.getElementById('nepali-title-label').textContent = isBranch ? 'Phone' : 'Name Title';
            document.getElementById('nepali-title-field').placeholder = isBranch ? 'Eg. 984100000' : 'Eg. Title Nepali';

            document.getElementById('excerpt-label').textContent = isBranch ? 'Address' : 'Excerpt';
            document.getElementById('excerpt-field').placeholder = isBranch ? 'Banepa-8, Kavre' : '';
        }

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

        // Call toggleBranchFields once to set initial values based on default dropdown value
        toggleBranchFields();
    </script>
@endsection
