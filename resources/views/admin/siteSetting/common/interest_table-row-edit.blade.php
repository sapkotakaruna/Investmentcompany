@if (isset($row->interest) && $row->interest->count() > 0)
    @foreach ($row->interest as $increment => $_interest_data)
        <tr>
            <td>
                <input type="hidden" name="interestData[{{ $increment }}][id]" value="{{ $_interest_data->id }}">
                <input class="form-control" name="interestData[{{ $increment }}][schemes]"
                    value="{{ $_interest_data->schemes }}" type="text">
            </td>
            <td>
                <input class="form-control" name="interestData[{{ $increment }}][Interest_rate]"
                    value="{{ $_interest_data->interest_rate }}" type="text">
            </td>
            <td>
                <button id="remove" type="button" class="btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
            </td>
        </tr>
    @endforeach
@endif
