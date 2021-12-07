<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'El(la) :attribute debe ser aceptado.',
    'accepted_if' => 'El(la) :attribute debe ser aceptado cuando :other sea :value.',
    'active_url' => 'El(la) :attribute no es una URL válida.',
    'after' => 'El(la) :attribute debe ser una fecha posterior a :date.',
    'after_or_equal' => 'El(la) :attribute debe ser una fecha posterior o igual a :date.',
    'alpha' => 'El(la) :attribute solo debe contener letras.',
    'alpha_dash' => 'El(la) :attribute solo debe contener letras, números, guiones y guiones bajos.',
    'alpha_num' => 'El(la) :attribute solo debe contener letras y números.',
    'array' => 'El(la) :attribute debe ser una matriz.',
    'before' => 'El(la) :attribute debe ser una fecha anterior :date.',
    'before_or_equal' => 'El(la) :attribute debe ser una fecha anterior o igual a :date.',
    'between' => [
        'numeric' => 'El(la) :attribute debe estar entre :min y :max.',
        'file' => 'El(la) :attribute debe estar entre :min y :max kilobytes.',
        'string' => 'El(la) :attribute debe estar entre :min y :max caracteres.',
        'array' => 'El(la) :attribute debe tener entre :min y :max items.',
    ],
    'boolean' => 'El(la) :attribute debe ser verdadero o falso.',
    'confirmed' => 'El(la) :attribute de confirmación no coincide.',
    'current_password' => 'El(la) contraseña es incorrecta.',
    'date' => 'El(la) :attribute no es una fecha válida.',
    'date_equals' => 'El(la) :attribute debe ser una fecha igual a :date.',
    'date_format' => 'El(la) :attribute no coincide con el formato :format.',
    'different' => 'El(la) :attribute y :other deben ser diferentes.',
    'digits' => 'El(la) :attribute debe ser :digits digitos.',
    'digits_between' => 'El(la) :attribute debe estar entre :min y :max digitos.',
    'dimensions' => 'El(la) :attribute tiene dimensiones de imagen no válidas.',
    'distinct' => 'El(la) :attribute tiene un valor duplicado.',
    'email' => 'El(la) :attribute debe ser una dirección de correo electrónico válida.',
    'ends_with' => 'El(la) :attribute debe terminar con uno de los siguientes: :values.',
    'exists' => 'El(la) :attribute seleccionad@ no es válido.',
    'file' => 'El(la) :attribute debe ser un archivo.',
    'filled' => 'El(la) :attribute debe tener un valor.',
    'gt' => [
        'numeric' => 'El(la) :attribute debe ser mayor que :value.',
        'file' => 'El(la) :attribute debe ser mayor que :value kilobytes.',
        'string' => 'El(la) :attribute debe ser mayor que :value caracteres.',
        'array' => 'El(la) :attribute debe tener más de :value items.',
    ],
    'gte' => [
        'numeric' => 'El(la) :attribute debe ser mayor o igual que :value.',
        'file' => 'El(la) :attribute debe ser mayor o igual que :value kilobytes.',
        'string' => 'El(la) :attribute debe ser mayor o igual que :value caracteres.',
        'array' => 'El(la) :attribute debe tener :value items o más.',
    ],
    'image' => 'El(la) :attribute debe ser una imagen.',
    'in' => 'El(la) :attribute seleccionad@ no es válido.',
    'in_array' => 'El(la) :attribute no existe en :other.',
    'integer' => 'El(la) :attribute debe ser un número entero.',
    'ip' => 'El(la) :attribute debe ser una dirección IP válida.',
    'ipv4' => 'El(la) :attribute debe ser una dirección IPv4 válida.',
    'ipv6' => 'El(la) :attribute debe ser una dirección IPv6 válida.',
    'json' => 'El(la) :attribute debe ser una cadena JSON válida.',
    'lt' => [
        'numeric' => 'El(la) :attribute debe ser menor que :value.',
        'file' => 'El(la) :attribute debe ser menor que :value kilobytes.',
        'string' => 'El(la) :attribute debe ser menor que :value caracteres.',
        'array' => 'El(la) :attribute debe tener menos que :value items.',
    ],
    'lte' => [
        'numeric' => 'El(la) :attribute debe ser menor que o igual a :value.',
        'file' => 'El(la) :attribute debe ser menor que  o igual a :value kilobytes.',
        'string' => 'El(la) :attribute debe ser menor que  o igual a :value caracteres.',
        'array' => 'El(la) :attribute no debe tener más de :value items.',
    ],
    'max' => [
        'numeric' => 'El(la) :attribute no debe ser mayor que :max.',
        'file' => 'El(la) :attribute mno debe ser mayor que :max kilobytes.',
        'string' => 'El(la) :attribute no debe ser mayor que :max caracteres.',
        'array' => 'El(la) :attribute no debe tener más de :max items.',
    ],
    'mimes' => 'El(la) :attribute debe ser un archivo de tipo: :values.',
    'mimetypes' => 'El(la) :attribute debe ser un archivo de tipo: :values.',
    'min' => [
        'numeric' => 'El(la) :attribute debe ser al menos :min.',
        'file' => 'El(la) :attribute debe ser al menos :min kilobytes.',
        'string' => 'El(la) :attribute debe ser al menos :min caracteres.',
        'array' => 'El(la) :attribute debe tener al menos :min items.',
    ],
    'multiple_of' => 'El(la) :attribute debe ser un múltiplo de :value.',
    'not_in' => 'El(la) :attribute seleccionad@ no es válido.',
    'not_regex' => 'El formato de :attribute no es válido.',
    'numeric' => 'El(la) :attribute debe ser un número.',
    'password' => 'El(la) contraseña es incorrecta.',
    'present' => 'El campo de :attribute debe estar presente.',
    'regex' => 'El formato de :attribute es inválido.',
    'required' => 'El campo :attribute es necesario.',
    'required_if' => 'El campo :attribute es obligatorio cuando :other es :value.',
    'required_unless' => 'El campo :attribute es obligatorio a menos que :other esté en :values.',
    'required_with' => 'El campo :attribute es obligatorio cuando :values esté presente.',
    'required_with_all' => 'El campo :attribute es obligatorio cuando hey :values presentes.',
    'required_without' => 'El campo :attribute es obligatorio cuando :values no están presentes.',
    'required_without_all' => 'El campo :attribute obligatorio cuando ninguno de :values está presente.',
    'prohibited' => 'El campo :attribute está prohibido.',
    'prohibited_if' => 'El campo :attribute está prohibido cuando :other es :value.',
    'prohibited_unless' => 'El(la) :attribute está prohibido a menos que :other está en :values.',
    'prohibits' => 'El campo :attribute prohíbe :other de estar presente.',
    'same' => 'El campo :attribute y :other deben coincidir.',
    'size' => [
        'numeric' => 'El(la) :attribute debe ser :size.',
        'file' => 'El(la) :attribute debe ser de :size kilobytes.',
        'string' => 'El(la) :attribute debe ser de :size caracteres.',
        'array' => 'El(la) :attribute debe contener :size items.',
    ],
    'starts_with' => 'El(la) :attribute debe comenzar con uno de los siguientes: :values.',
    'string' => 'El(la) :attribute debe ser texto.',
    'timezone' => 'El(la) :attribute debe ser una zona horaria válida.',
    'unique' => 'El(la) :attribute ya ha sido tomado.',
    'uploaded' => 'El(la) :attribute no se pudo cargar.',
    'url' => 'El(la) :attribute debe ser una URL válida.',
    'uuid' => 'El(la) :attribute debe ser un UUID válido.',

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
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
