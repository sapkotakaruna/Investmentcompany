<div class="card-body row">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Title</label>
                {!! Form::text('title', null,[
                      'class'=> $errors->has('title')?'form-control is-invalid':'form-control',
                      'placeholder'=>'Eg.Partners Name',
                      ]) !!}
                @error('title')
                <span class="help-block invalid-feedback">
                        <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="url">Link</label>
                {!! Form::url('url', null,[
                     'class'=> $errors->has('url')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Eg. www.facebook.com',
                ]) !!}
                @error('url')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>
 <div class="col-md-12 mb-3">
            <div class="form-group">
                <label for="type">Partner Type</label>
                {!! Form::select('type', ['0' => 'Associate', '1' => 'client'], isset($data['row']) ? null : '0', [
                    'class' => 'form-control',
                    'id' => 'type-dropdown',
                    'onchange' => 'toggleBranchFields()',
                ]) !!}
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="status">Status</label>
                {!! Form::select('status',['1' => 'Active', '0' => 'InActive'], null,[
                     'class'=> $errors->has('status')?'form-control is-invalid':'form-control',

                ]) !!}
                @error('status')
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
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="photo_upload">Upload Photo <span> image size (433x1280)</span></label>
                            {!! Form::file('main_photo',[
                                'class'=> $errors->has('main_photo')?'form-control btn btn-sm is-invalid':'form-control btn btn-sm',
                                'id'=>'photo',
                                'onchange'=>"showPreview(event);",
                                'accept'=>'image/png, image/gif, image/jpeg'
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
                                <img width="150" height="150" src="{{ ViewHelper::getImagePath(@$_folder,@$data['row']->photo) }}" class="img-fluid" id="file-ip-1-preview">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card-body -->
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{$button}}</button>
</div>

@section('formJs')
    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                var photo = document.getElementById("photo");
                preview.src = src;
                photo.value=src;
                preview.style.display = "block";

            }
        }
    </script>
@endsection
