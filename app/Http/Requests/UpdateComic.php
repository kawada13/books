<?php

namespace App\Http\Requests;

use App\Comic;
use Illuminate\Validation\Rule;

class UpdateComic extends CreateComic
{
    public function rules()
    {
        $rule = parent::rules();

        $status_rule = Rule::in(array_keys(Comic::STATUS));

        return $rule + [
            'status' => 'required|' . $status_rule,
        ];
    }

    public function attributes()
    {
        $attributes = parent::attributes();

        return $attributes + [
            'status' => '状態',
        ];
    }

    public function messages()
    {
        $messages = parent::messages();

        $status_labels = array_map(function($item) {
            return $item['label'];
        }, Comic::STATUS);

        $status_labels = implode('、', $status_labels);

        return $messages + [
            'status.in' => ':attribute には ' . $status_labels. ' のいずれかを指定してください。',
        ];
    }
}