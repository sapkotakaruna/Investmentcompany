@if (isset($row->hour) && $row->hour->count() > 0)
    @foreach ($row->hour as $increment => $_hour_data)
        <tr>
            <td>
                <input type="hidden" name="hourData[{{ $increment }}][id]" value="{{ $_hour_data->id }}">
                <input class="form-control" name="hourData[{{ $increment }}][excerpt]"
                    value="{{ $_hour_data->excerpt }}" type="text">
            </td>

            <td>
                <button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
            </td>
        </tr>
    @endforeach
@endif
