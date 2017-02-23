<?php

namespace App\Http\Requests\Backend\Photoalbum;

use App\Http\Requests\FormRequest;
use App\Http\Requests\Request;

class PhotoalbumRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'position'        => 'required|integer',
            'status'          => 'required|boolean',
        ];

        $languageRules = [
            'name' => '',
        ];

        foreach (config('app.locales') as $locale) {
            echo $locale;
            foreach ($languageRules as $name => $rule) {
                $rules[$locale.'.'.$name] = $rule;
            }
        }

        $items_rules = [
            'items.new.*.image'   => 'required',
            'items.new.*.status'   => 'required|boolean',
            'items.new.*.position' => 'required|integer',
            'items.old.*.image'   => 'required',
            'items.old.*.status'   => 'required|boolean',
            'items.old.*.position' => 'required|integer',
        ];

        /*$itemsLanguageRules = [
            'name' => 'required',
        ];

        foreach (config('app.locales') as $locale) {
            foreach ($itemsLanguageRules as $name => $rule) {
                $items_rules['items.new.*.'.$locale.'.'.$name] = $rule;
                $items_rules['items.old.*.'.$locale.'.'.$name] = $rule;
            }
        }*/

        return array_merge($rules, $items_rules);
    }
}
