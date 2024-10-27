<?php

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

return [
    'accepted'             => 'Detta fält måste accepteras.',
    'accepted_if'          => 'This field must be accepted when :other is :value.',
    'active_url'           => 'Detta är inte en giltig URL.',
    'after'                => 'Detta måste vara ett datum efter :date.',
    'after_or_equal'       => 'Detta måste vara ett datum efter eller lika med :date.',
    'alpha'                => 'Detta fält får endast innehålla bokstäver.',
    'alpha_dash'           => 'Detta fält får endast innehålla bokstäver, siffror, streck och understreck.',
    'alpha_num'            => 'Detta fält får endast innehålla bokstäver och siffror.',
    'array'                => 'Detta fält måste vara en array.',
    'before'               => 'Detta måste vara ett datum före :date.',
    'before_or_equal'      => 'Detta måste vara ett datum före eller lika med :date.',
    'between'              => [
        'array'   => 'This content must have between :min and :max items.',
        'file'    => 'This file must be between :min and :max kilobytes.',
        'numeric' => 'This value must be between :min and :max.',
        'string'  => 'This string must be between :min and :max characters.',
    ],
    'boolean'              => 'Detta fält måste vara sant eller falskt.',
    'confirmed'            => 'Bekräftelsen matchar inte.',
    'current_password'     => 'The password is incorrect.',
    'date'                 => 'Detta är inte ett giltigt datum.',
    'date_equals'          => 'Detta måste vara ett datum som motsvarar :date.',
    'date_format'          => 'Detta matchar inte formatet :format.',
    'declined'             => 'This value must be declined.',
    'declined_if'          => 'This value must be declined when :other is :value.',
    'different'            => 'Detta värde måste skilja sig från :other.',
    'digits'               => 'Detta måste vara :digits siffror.',
    'digits_between'       => 'Detta måste vara mellan :min och :max siffror.',
    'dimensions'           => 'Den här bilden har ogiltiga dimensioner.',
    'distinct'             => 'Detta fält har ett dubblettvärde.',
    'email'                => 'Detta måste vara en giltig e-postadress.',
    'ends_with'            => 'Detta måste sluta med något av följande: :values.',
    'enum'                 => 'The selected value is invalid.',
    'exists'               => 'Det valda värdet är ogiltigt.',
    'file'                 => 'Innehållet måste vara en fil.',
    'filled'               => 'Detta fält måste ha ett värde.',
    'gt'                   => [
        'array'   => 'The content must have more than :value items.',
        'file'    => 'The file size must be greater than :value kilobytes.',
        'numeric' => 'The value must be greater than :value.',
        'string'  => 'The string must be greater than :value characters.',
    ],
    'gte'                  => [
        'array'   => 'The content must have :value items or more.',
        'file'    => 'The file size must be greater than or equal :value kilobytes.',
        'numeric' => 'The value must be greater than or equal :value.',
        'string'  => 'The string must be greater than or equal :value characters.',
    ],
    'image'                => 'Det måste vara en bild.',
    'in'                   => 'Det valda värdet är ogiltigt.',
    'in_array'             => 'Detta värde finns inte i :other.',
    'integer'              => 'Detta måste vara ett heltal.',
    'ip'                   => 'Detta måste vara en giltig IP-adress.',
    'ipv4'                 => 'Detta måste vara en giltig IPv4-adress.',
    'ipv6'                 => 'Detta måste vara en giltig IPv6-adress.',
    'json'                 => 'Detta måste vara en giltig JSON-sträng.',
    'lt'                   => [
        'array'   => 'The content must have less than :value items.',
        'file'    => 'The file size must be less than :value kilobytes.',
        'numeric' => 'The value must be less than :value.',
        'string'  => 'The string must be less than :value characters.',
    ],
    'lte'                  => [
        'array'   => 'The content must not have more than :value items.',
        'file'    => 'The file size must be less than or equal :value kilobytes.',
        'numeric' => 'The value must be less than or equal :value.',
        'string'  => 'The string must be less than or equal :value characters.',
    ],
    'mac_address'          => 'The value must be a valid MAC address.',
    'max'                  => [
        'array'   => 'The content must not have more than :max items.',
        'file'    => 'The file size must not be greater than :max kilobytes.',
        'numeric' => 'The value must not be greater than :max.',
        'string'  => 'The string must not be greater than :max characters.',
    ],
    'mimes'                => 'Detta måste vara en fil av typen: :values.',
    'mimetypes'            => 'Detta måste vara en fil av typen: :values.',
    'min'                  => [
        'array'   => 'The value must have at least :min items.',
        'file'    => 'The file size must be at least :min kilobytes.',
        'numeric' => 'The value must be at least :min.',
        'string'  => 'The string must be at least :min characters.',
    ],
    'multiple_of'          => 'Värdet måste vara en multipel av :value',
    'not_in'               => 'Det valda värdet är ogiltigt.',
    'not_regex'            => 'Detta format är ogiltigt.',
    'numeric'              => 'Detta måste vara ett nummer.',
    'password'             => 'Lösenordet är felaktigt.',
    'present'              => 'Detta fält måste vara närvarande.',
    'prohibited'           => 'Detta fält är förbjudet.',
    'prohibited_if'        => 'Detta fält är förbjudet när :other är :value.',
    'prohibited_unless'    => 'Detta fält är förbjudet om inte :other är i :values.',
    'prohibits'            => 'This field prohibits :other from being present.',
    'regex'                => 'Detta format är ogiltigt.',
    'required'             => 'Detta fält krävs.',
    'required_array_keys'  => 'This field must contain entries for: :values.',
    'required_if'          => 'Detta fält krävs när :other är :value.',
    'required_unless'      => 'Detta fält krävs om inte :other är i :values.',
    'required_with'        => 'Detta fält krävs när :values är närvarande.',
    'required_with_all'    => 'Detta fält krävs när :values är närvarande.',
    'required_without'     => 'Detta fält krävs när :values inte är närvarande.',
    'required_without_all' => 'Detta fält krävs när ingen av :values är närvarande.',
    'same'                 => 'Värdet på det här fältet måste matcha det från :other.',
    'size'                 => [
        'array'   => 'The content must contain :size items.',
        'file'    => 'The file size must be :size kilobytes.',
        'numeric' => 'The value must be :size.',
        'string'  => 'The string must be :size characters.',
    ],
    'starts_with'          => 'Detta måste börja med något av följande: :values.',
    'string'               => 'Detta måste vara en sträng.',
    'timezone'             => 'Detta måste vara en giltig zon.',
    'unique'               => 'Detta har redan använts.',
    'uploaded'             => 'Det gick inte att ladda upp.',
    'url'                  => 'Detta format är ogiltigt.',
    'uuid'                 => 'Detta måste vara en giltig UUID.',
    'custom'               => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],
];