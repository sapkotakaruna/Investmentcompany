<div class="card-body ">
    <div class="col-md-12 row">
        {!! Form::hidden('interest_category_id', $data['Interest_category'], null, [
            'class' => $errors->has('interest_category_id') ? 'form-control is-invalid' : 'form-control',
            'placeholder' => '--SELECT Interest CATEGORY--',
        ]) !!}
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

        @include('admin.siteSetting.common.interest_table')


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
        $(document).ready(function() {

            var count_int1 =
                {{ isset($data['row']->interest) && $data['row']->interest->count() > 0 ? $data['row']->interest->count() : 1 }};

            var max_count = 50;

            $('#interest_detail').click(function() {
                if (count_int1 <= max_count) {
                    var html = '<tr>' +

                        '<td> <input class="form-control" name="interestData[' + count_int1 +
                        '][schemes]" type="text">' +
                        ' </td> ' +
                        '<td> <input class="form-control" name="interestData[' + count_int1 +
                        '][Interest_rate]" type="text"> </td>' +
                        '<td>' +
                        '<button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>';
                    $('#interest_form').append(html);
                    count_int1++;

                    Cookies.set('interest_form', count_int1, {
                        expires: 0.04 / 24
                    });

                } else {
                    swal.fire(
                        'Sorry',
                        'You can upload a maximum 50 Interest.',
                        'warning'
                    )
                }
            });


            $('#interest_form').on('click', '#remove', function() {
                if (count_int1 === 1) {
                    swal.fire(
                        'Sorry',
                        'You must create at least one',
                        'warning'
                    )
                } else {
                    $(this).closest('tr').remove();
                    count_int1--;
                    Cookies.set('interest_form', count_int1, {
                        expires: 0.04 / 24
                    });

                }
            });
            var data = Cookies.get('interest_form');
            // //alert(data);
            // //getting local storage count and appending html accordingly
            for (count_int1; count_int1 < data; count_int1++) {};
        });
    </script>
@endsection
