<div class="card-body">
    <div class="col-md-12 row">



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

        @include('admin.siteSetting.common.statistics_table')

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


    <script>
        $(document).ready(function() {

            var count1 =
                {{ isset($data['row']->statistics) && $data['row']->statistics->count() > 0 ? $data['row']->statistics->count() : 1 }};

            var max_count = 20;

            $('#statistics_detail').click(function() {
                if (count1 <= max_count) {
                    var html = '<tr>' +

                        '<td> <input class="form-control" name="statisticsData[' + count1 +
                        '][name]" type="text">' +
                        ' </td> ' +
                        '<td> <input class="form-control" name="statisticsData[' + count1 +
                        '][value]" type="text"> </td>' +
                        '<td> <input class="form-control" name="statisticsData[' + count1 +
                        '][rank]" type="number"> </td>' +
                        '<td>' +
                        '<button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>';
                    $('#statistics_form').append(html);
                    count1++;

                    Cookies.set('statistics_form', count1, {
                        expires: 0.04 / 24
                    });

                } else {
                    swal.fire(
                        'sorry',
                        'You can upload a maximum 20 statsistics.',
                        'warning'
                    )
                }
            });


            $('#statistics_form').on('click', '#remove', function() {
                if (count1 === 1) {
                    swal.fire(
                        'sorry',
                        'You must create at least one',
                        'warning'
                    )
                } else {
                    $(this).closest('tr').remove();
                    count1--;
                    Cookies.set('statistics_form', count1, {
                        expires: 0.04 / 24
                    });

                }
            });
            var data = Cookies.get('statistics_form');
            // //alert(data);
            // //getting local storage count and appending html accordingly
            for (count1; count1 < data; count1++) {};
        });

        $(document).ready(function() {

            var count_hour =
                {{ isset($data['row']->hour) && $data['row']->hour->count() > 0 ? $data['row']->hour->count() : 1 }};

            var max_count = 20;

            $('#hour_detail').click(function() {
                if (count_hour <= max_count) {
                    var html = '<tr>' +

                        '<td> <input class="form-control" name="hourData[' + count_hour +
                        '][excerpt]" type="text">' +
                        ' </td> ' +
                        '<td>' +
                        '<button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i>' +
                        '</button>' +
                        '</td>' +
                        '</tr>';
                    $('#hour_form').append(html);
                    count_hour++;

                    Cookies.set('hour_form', count_hour, {
                        expires: 0.04 / 24
                    });

                } else {
                    swal.fire(
                        'sorry',
                        'You can upload a maximum 20 statsistics.',
                        'warning'
                    )
                }
            });


            $('#hour_form').on('click', '#remove', function() {
                if (count_hour === 1) {
                    swal.fire(
                        'sorry',
                        'You must create at least one',
                        'warning'
                    )
                } else {
                    $(this).closest('tr').remove();
                    count_hour--;
                    Cookies.set('hour_form', count_hour, {
                        expires: 0.04 / 24
                    });

                }
            });
            var data = Cookies.get('hour_form');
            // //alert(data);
            // //getting local storage count and appending html accordingly
            for (count_hour; count_hour < data; count_hour++) {};
        });
    </script>
@endsection
