<script src="{{ asset('backend/nepali-date-picker/js/nepali.datepicker.v3.7.min.js') }}" type="text/javascript">
</script>
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

    function showFaviconPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("favicon-preview");
            var photo = document.getElementById("favicon");
            preview.src = src;
            photo.value = src;
            preview.style.display = "block";
        }
    }

    function showChairmanSignPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("chairman_sign-preview");
            var photo = document.getElementById("chairman_sign");
            preview.src = src;
            photo.value = src;
            preview.style.display = "block";
        }
    }

    function showStampPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("stamp-preview");
            var photo = document.getElementById("stamp");
            preview.src = src;
            photo.value = src;
            preview.style.display = "block";
        }
    }

    function getTodayDate() {
        var date = NepaliFunctions.GetCurrentBsDate();
        var m = date.month;
        if (m < 10) {
            m = "0" + m;
        }
        var d = date.day;
        if (d < 10) {
            d = "0" + d;
        }
        var y = date.year;
        var today = y + "-" + m + "-" + d;
        var s = document.getElementById('dob_bs');
        // var issue_date = document.getElementById('issue_date');
        // s.value = y + "-" + m + "-" + d;
        s.nepaliDatePicker({
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 200,
            disableAfter: today,
            // language: "english",
            onChange: function() {
                let bs_date = NepaliFunctions.ConvertToDateObject(s.value, "YYYY-MM-DD")
                let ad_date = NepaliFunctions.BS2AD(bs_date);
                let year = ad_date.year;
                var month = ad_date.month;
                if (month < 10) {
                    month = "0" + month;
                }
                var day = ad_date.day;
                if (day < 10) {
                    day = "0" + day;
                }
                document.getElementById('dob_ad').value = year + "-" + month + "-" + day;
            }
        });
        // issue_date.nepaliDatePicker({
        //     ndpYear: true,
        //     ndpMonth: true,
        //     ndpYearCount: 200,
        //     disableAfter: y + "-" + m + "-" + d
        // });
    }
    getTodayDate();
</script>
<script>
    $(function() {
        //initailize the vairables
        let
            $pro = $('#province_id'),
            $dsc = $('#district_id'),
            $mun = $('#municipality_id'),
            $ward = $('#ward_no'),
            $street = $('#street'),

            $t_pro = $('#t_province_id'),
            $t_dsc = $('#t_district_id'),
            $t_mun = $('#t_municipality_id'),
            $t_ward = $('#t_ward_no'),
            $t_street = $('#t_street');

        //copies the permanent address while clicking the same as above button
        $('#copy').change(function() {
            if ($(this).is(':checked')) {
                $t_pro.val($pro.val());
                $t_dsc.val($dsc.val());
                $t_mun.val($mun.val());
                $t_ward.val($ward.val());
                $t_street.val($street.val());
            } else {
                $t_pro.val('');
                $t_dsc.val('');
                $t_mun.val('');
                $t_ward.val('');
                $t_street.val('');
            }
        });

        //change ad date as per the bs input
        $('body').on("change", '#dob_bs', function() {
            let bs_date = NepaliFunctions.ConvertToDateObject($(this).val(), "YYYY-MM-DD")
            let ad_date = NepaliFunctions.BS2AD(bs_date);
            let year = ad_date.year;
            var month = ad_date.month;
            if (month < 10) {
                month = "0" + month;
            }
            var day = ad_date.day;
            if (day < 10) {
                day = "0" + day;
            }
            $('#dob_ad').val(year + "-" + month + "-" + day);
        })

        //change the respective district and municipality as per the selected province
        $('body').on("change", "#province_id", function() {
            var selectedProvince = $(this).val();
            $("#district_id").find("option").each(function() {
                if ($(this).data("province") == selectedProvince) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $("#municipality_id").find("option").each(function() {
                if ($(this).data("province") == selectedProvince) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        $('body').on("change", "#district_id", function() {
            var selectedDistrict = $(this).val();
            var provinceSelected = $(this).find('option:selected').attr('data-province');
            $pro.val(provinceSelected)
            $("#municipality_id").find("option").each(function() {
                if ($(this).data("district") == selectedDistrict) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        $('body').on("change", "#municipality_id", function() {
            var selectedDistrict = $(this).val();
            var provinceSelected = $(this).find('option:selected').attr('data-province');
            var districtSelected = $(this).find('option:selected').attr('data-district');
            $pro.val(provinceSelected)
            $dsc.val(districtSelected)
        });

        //temporary address changes
        $('body').on("change", "#t_province_id", function() {
            var selectedProvince = $(this).val();
            $("#t_district_id").find("option").each(function() {
                if ($(this).data("province") == selectedProvince) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
            $("#t_municipality_id").find("option").each(function() {
                if ($(this).data("province") == selectedProvince) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        $('body').on("change", "#t_district_id", function() {
            var selectedDistrict = $(this).val();
            var provinceSelected = $(this).find('option:selected').attr('data-province');
            $t_pro.val(provinceSelected)
            $("#t_municipality_id").find("option").each(function() {
                if ($(this).data("district") == selectedDistrict) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });
        $('body').on("change", "#t_municipality_id", function() {
            var selectedDistrict = $(this).val();
            var provinceSelected = $(this).find('option:selected').attr('data-province');
            var districtSelected = $(this).find('option:selected').attr('data-district');
            $t_pro.val(provinceSelected)
            $t_dsc.val(districtSelected)
        });
    });
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
