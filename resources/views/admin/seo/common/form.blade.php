<div class="card-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title">Title </label><span class="red">*</span>
                {!! Form::text('title', null,[
                      'class'=> $errors->has('title')?'form-control is-invalid':'form-control',
                      'placeholder'=>'eg. Annfsu',
                      ]) !!}
                @error('title')
                    <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Type </label><span class="red">*</span>
                {!! Form::text('type', null,[
                     'class'=> $errors->has('type')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. article',
                     ]) !!}
                @error('type')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="language">Language </label><span class="red">*</span>
                {!! Form::text('language', null,[
                     'class'=> $errors->has('language')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. nepali',
                     ]) !!}
                @error('language')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="subject">Subject </label><span class="red">*</span>
                {!! Form::text('subject', null,[
                     'class'=> $errors->has('subject')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. uml',
                     ]) !!}
                @error('subject')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="topic">Topic </label><span class="red">*</span>
                {!! Form::text('topic', null,[
                     'class'=> $errors->has('topic')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. website',
                     ]) !!}
                @error('topic')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="summary">Summary </label><span class="red">*</span>
                {!! Form::text('summary', null,[
                     'class'=> $errors->has('summary')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. annfsu is ....',
                     ]) !!}
                @error('summary')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="domain">Domain </label><span class="red">*</span>
                {!! Form::text('domain', null,[
                     'class'=> $errors->has('domain')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. https://itbridge.com.np/',
                     ]) !!}
                @error('domain')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="category">Category </label><span class="red">*</span>
                {!! Form::text('category', null,[
                     'class'=> $errors->has('category')?'form-control is-invalid':'form-control',
                     'placeholder'=>'eg. website',
                     ]) !!}
                @error('category')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Description</label>
                {!! Form::textarea('description', null,[
                     'class'=> $errors->has('description')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Type here shortly..',
                     'rows'=> 2
                ]) !!}
                @error('description')
                <span class="help-block invalid-feedback">
                     <strong> {{ $message }} </strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="keyword">Keyword</label>
                {!! Form::textarea('keyword', null,[
                     'class'=> $errors->has('keyword')?'form-control is-invalid':'form-control',
                     'placeholder'=>'Type here shortly..',
                     'rows'=> 2
                ]) !!}
                @error('keyword')
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
    <button type="submit" class="btn btn-primary">{{$button}}</button>
</div>

@section('formJs')
    <script>
        $(document).ready(function () {
            $('table th input:checkbox').on('click' , function(){
                var that = this;
                $(this).closest('table').find('input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });

            });

            $('.group').on('click' , function(){
                var that = this;
                $(this).closest('tr').find('input:checkbox')
                    .each(function(){
                        this.checked = that.checked;
                        $(this).closest('tr').toggleClass('selected');
                    });

            });


        });
    </script>
@endsection
