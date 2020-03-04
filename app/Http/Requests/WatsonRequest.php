<?php

namespace App\Http\Requests;

use App\Models\WatsonResult;
use Illuminate\Foundation\Http\FormRequest;

class WatsonRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Defined rules of resource.
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'PUT':
                return $this->update();
                break;
            case 'POST':
                return $this->store();
                break;
            default:
                return [];
                break;
        }
    }

    /**
     * Rules for post resource.
     */
    private function store(): array
    {
        if (property_exists(WatsonResult::class, 'storeRequestRules')) {
            $rules = (new WatsonResult())->storeRequestRules;
        } else {
            // TODO: Implement store rules method.

            $rules = [];
        }

        return $rules;
    }

    /**
     * Rules for put resource.
     */
    private function update(): array
    {
        if (property_exists(WatsonResult::class, 'updateRequestRules')) {
            $rules = (new WatsonResult())->updateRequestRules;
        } else {
            // TODO: Implement update rules method.

            $rules = [];
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        $messages = [];

        switch ($this->method()) {
            case 'PUT':
                if (property_exists(WatsonResult::class, 'updateRequestMessages')) {
                    $messages = array_merge(
                        $messages,
                        (new WatsonResult())->updateRequestMessages
                    );
                }
                break;
            case 'POST':
                if (property_exists(WatsonResult::class, 'storeRequestMessages')) {
                    $messages = array_merge(
                        $messages,
                        (new WatsonResult())->storeRequestMessages
                    );
                }
                break;
            default:
                return array_merge($messages, []);
                break;
        }

        return $messages;
    }
}
