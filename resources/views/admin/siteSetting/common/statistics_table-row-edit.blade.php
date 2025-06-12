@if (isset($row->statistics) && $row->statistics->count() > 0)
    @foreach ($row->statistics as $increment => $_statistics_data)
        <tr>
            <td>
                <input type="hidden" name="statisticsData[{{ $increment }}][id]" value="{{ $_statistics_data->id }}">
                <input class="form-control" name="statisticsData[{{ $increment }}][name]"
                    value="{{ $_statistics_data->name }}" type="text">
            </td>
            <td>
                <input class="form-control" name="statisticsData[{{ $increment }}][value]"
                    value="{{ $_statistics_data->value }}" type="text">
            </td>
            <td>
                <input class="form-control" name="statisticsData[{{ $increment }}][rank]"
                    value="{{ $_statistics_data->rank }}" type="number">
            </td>
            <td>
                <button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
            </td>
        </tr>
    @endforeach
@endif
