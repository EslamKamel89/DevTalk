<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DiscussionStoreRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return auth()->user() != null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2'],
            'topic_id' => ['required', Rule::exists('topics', 'id')]
        ];
    }
    public function attributes(): array {
        return [
            'title' => 'Discussion Title',
            'body' => 'Post Body',
            'topic_id' => 'Topic',

        ];
    }
}
