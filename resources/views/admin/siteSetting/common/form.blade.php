    <div class="card-body">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="sub-title">Site Information </h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label> <span class="red">*</span>
                                    {!! Form::text('title', null, [
                                        'class' => $errors->has('title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Site Name here..',
                                    ]) !!}
                                    @error('title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slogan">Slogan</label> <span class="red">*</span>
                                    {!! Form::text('slogan', null, [
                                        'class' => $errors->has('slogan') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Slogan here..',
                                    ]) !!}
                                    @error('slogan')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="location">Location</label> <span class="red">*</span>
                                    {!! Form::text('location', null, [
                                        'class' => $errors->has('location') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Location here..',
                                    ]) !!}
                                    @error('location')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label> <span class="red">*</span>
                                    {!! Form::email('email', null, [
                                        'class' => $errors->has('email') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Email here..',
                                    ]) !!}
                                    @error('email')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="sub-title">Site Logo </h5>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="photo">Existing Logo</label>
                                                <div class="preview">
                                                    <img width="200" height="200"
                                                        src="{{ ViewHelper::getImagePath(@$_folder, @$data['row']->logo) }}"
                                                        class="img-responsive" id="file-ip-1-preview">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="photo_upload">Upload Logo</label> <span
                                                    class="red">*</span>
                                                {!! Form::file('main_logo', [
                                                    'class' => $errors->has('main_logo')
                                                        ? 'form-control btn btn-info btn-sm is-invalid'
                                                        : 'form-control btn btn-info btn-sm',
                                                    'id' => 'photo',
                                                    'onchange' => 'showPreview(event);',
                                                    'accept' => 'image/png, image/gif, image/jpeg',
                                                ]) !!}
                                                @error('main_logo')
                                                    <span class="help-block invalid-feedback">
                                                        <strong> {{ $message }} </strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label> <span class="red">*</span>
                                    {!! Form::text('phone', null, [
                                        'class' => $errors->has('phone') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Phone here..',
                                    ]) !!}
                                    @error('phone')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="facebook_link">Facebook Link</label> <span class="red">*</span>
                                    {!! Form::url('facebook_link', null, [
                                        'class' => $errors->has('facebook_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Facebook Link here..',
                                    ]) !!}
                                    @error('facebook_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="twitter_link">Twitter Link</label> <span class="red">*</span>
                                    {!! Form::url('twitter_link', null, [
                                        'class' => $errors->has('twitter_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Twitter Link here..',
                                    ]) !!}
                                    @error('twitter_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="viber_link">Viber Link</label> <span class="red">*</span>
                                    {!! Form::url('viber_link', null, [
                                        'class' => $errors->has('viber_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Viber Link here..',
                                    ]) !!}
                                    @error('viber_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram_link">Instagram Link</label> <span class="red">*</span>
                                    {!! Form::url('instagram_link', null, [
                                        'class' => $errors->has('instagram_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Instagram Link here..',
                                    ]) !!}
                                    @error('instagram_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opening_time">Opening Time</label> <span class="red">*</span>
                                    {!! Form::text('opening_time', null, [
                                        'class' => $errors->has('opening_time') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Opening Time here..',
                                    ]) !!}
                                    @error('opening_time')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="sub-title">Footer Links</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_first_title">Footer Menu First Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_first_title', null, [
                                        'class' => $errors->has('footer_menu_first_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu First Title here..',
                                    ]) !!}
                                    @error('footer_menu_first_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_first_link">Footer Menu First Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_first_link', null, [
                                        'class' => $errors->has('footer_menu_first_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu First Link here..',
                                    ]) !!}
                                    @error('footer_menu_first_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_second_title">Footer Menu Second Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_second_title', null, [
                                        'class' => $errors->has('footer_menu_second_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Second Title here..',
                                    ]) !!}
                                    @error('footer_menu_second_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_second_link">Footer Menu Second Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_second_link', null, [
                                        'class' => $errors->has('footer_menu_second_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Second Link here..',
                                    ]) !!}
                                    @error('footer_menu_second_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_third_title">Footer Menu Third Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_third_title', null, [
                                        'class' => $errors->has('footer_menu_third_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Third Title here..',
                                    ]) !!}
                                    @error('footer_menu_third_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_third_link">Footer Menu Third Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_third_link', null, [
                                        'class' => $errors->has('footer_menu_third_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Third Link here..',
                                    ]) !!}
                                    @error('footer_menu_third_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_fourth_title">Footer Menu Fourth Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_fourth_title', null, [
                                        'class' => $errors->has('footer_menu_fourth_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Fourth Title here..',
                                    ]) !!}
                                    @error('footer_menu_fourth_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_fourth_link">Footer Menu Fourth Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_fourth_link', null, [
                                        'class' => $errors->has('footer_menu_fourth_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Fourth Link here..',
                                    ]) !!}
                                    @error('footer_menu_fourth_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_five_title">Footer Menu Fifth Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_five_title', null, [
                                        'class' => $errors->has('footer_menu_five_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Fifth Title here..',
                                    ]) !!}
                                    @error('footer_menu_five_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_five_link">Footer Menu Fifth Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_five_link', null, [
                                        'class' => $errors->has('footer_menu_five_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Fifth Link here..',
                                    ]) !!}
                                    @error('footer_menu_five_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_six_title">Footer Menu Sixth Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_six_title', null, [
                                        'class' => $errors->has('footer_menu_six_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Sixth Title here..',
                                    ]) !!}
                                    @error('footer_menu_six_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_six_link">Footer Menu Sixth Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_six_link', null, [
                                        'class' => $errors->has('footer_menu_six_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Sixth Link here..',
                                    ]) !!}
                                    @error('footer_menu_six_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_seven_title">Footer Menu Seventh Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_seven_title', null, [
                                        'class' => $errors->has('footer_menu_seven_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Seventh Title here..',
                                    ]) !!}
                                    @error('footer_menu_seven_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_seven_link">Footer Menu Seventh Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_seven_link', null, [
                                        'class' => $errors->has('footer_menu_seven_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Seventh Link here..',
                                    ]) !!}
                                    @error('footer_menu_seven_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_eight_title">Footer Menu Eighth Title</label> <span
                                        class="red">*</span>
                                    {!! Form::text('footer_menu_eight_title', null, [
                                        'class' => $errors->has('footer_menu_eight_title') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Eighth Title here..',
                                    ]) !!}
                                    @error('footer_menu_eight_title')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="footer_menu_eight_link">Footer Menu Eighth Link</label> <span
                                        class="red">*</span>
                                    {!! Form::url('footer_menu_eight_link', null, [
                                        'class' => $errors->has('footer_menu_eight_link') ? 'form-control is-invalid' : 'form-control',
                                        'placeholder' => 'Type Footer Menu Eighth Link here..',
                                    ]) !!}
                                    @error('footer_menu_eight_link')
                                        <span class="help-block invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="sub-title">Customer Care
                </h5>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="customer_care_email">Email</label>
                            {!! Form::email('customer_care_email', null, [
                                'class' => $errors->has('customer_care_email') ? 'form-control is-invalid' : 'form-control',
                                'placeholder' => 'customercare@gmail.com',
                            ]) !!}
                            @error('customer_care_email')
                                <span class="help-block invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="customer_care_phone">Phone</label>
                            {!! Form::text('customer_care_phone', null, [
                                'class' => $errors->has('customer_care_phone') ? 'form-control is-invalid' : 'form-control',
                                'placeholder' => '+977 98477484741',
                            ]) !!}
                            @error('customer_care_phone')
                                <span class="help-block invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="customer_care_excerpt">Details</label>
                            {!! Form::text('customer_care_excerpt', null, [
                                'class' => $errors->has('customer_care_excerpt') ? 'form-control is-invalid' : 'form-control',
                                'placeholder' => 'SWIFT: NARBNPKA',
                            ]) !!}
                            @error('customer_care_excerpt')
                                <span class="help-block invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="sub-title">Statistics Information
                    </h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="stat_title">Current Statistics(Active)</label> <span
                                    class="red">*</span>
                                {!! Form::select('stat_title', $data['statisticsCategoty'], null, [
                                    'class' => $errors->has('stat_title') ? 'form-control is-invalid' : 'form-control',
                                    'placeholder' => 'Select Stat Title here..',
                                    'required',
                                ]) !!}
                                @error('stat_title')
                                    <span class="help-block invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>






                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h5 class="sub-title">Interest Information
                    </h5>
                    @include('admin.siteSetting.common.interest_table')
                </div>
            </div>
        </div> --}}
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.siteSetting.common.hour_table')
                </div>
            </div>
        </div>


    </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ $button }}</button>
    </div>
    @section('formJs')
        @include($_view_path . '.common.form-scripts')
    @endsection
