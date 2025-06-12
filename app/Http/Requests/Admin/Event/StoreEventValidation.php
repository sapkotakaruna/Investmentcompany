<?php

namespace App\Http\Requests\Admin\Event;

use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|string|max:255',
            'event_location' => 'required|string|max:255',
            'rank' => 'required|integer',
            'status' => 'required|boolean',
            'payment' => 'required|in:free,payable',
            'excerpt' => 'required|string',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'rank'      => Event::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
