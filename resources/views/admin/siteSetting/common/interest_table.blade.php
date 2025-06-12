<div class="col-md-12">
    <div class="card card-gray-dark">
        <div class="card-header">
            Interest Detail
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive">
                    <table id="interest_form" class="table table-bordered nobottommargin">
                        <thead>
                            <tr>
                                <th>Schemes</th>
                                <th>Interest Rate</th>

                                <th>
                                    <button id="interest_detail" type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-plus">
                                        </i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($data['row']))
                                @include('admin.siteSetting.common.interest_table-row-edit', [
                                    'row' => $data['row'],
                                ])
                            @else
                                @include('admin.siteSetting.common.interest_table-row')
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
