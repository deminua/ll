<?php

return [


    'between'              => [
        'numeric' => ':attribute должно быть от :min до :max символов.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string' => ':attribute должно быть от :min до :max символов.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],

    'mimes'                => ':attribute должен быть файлом типа: :values.',
    'mimetypes'            => ':attribute должен быть файлом типа: :values.',

    'required'             => ':attribute необходимо указать обязательно.',
    
    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [
        'name' => 'Имя',
        'surname' => 'Фамилию',
        'avatar' => 'Аватар',
    ],

];
