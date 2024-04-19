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

    'accepted' => 'يجب قبول :attribute',
    'accepted_if' => ':attribute يجب قبوله عندما يكون :other :value',
    'active_url' => ':attribute ليس عنوان URL صحيحًا',
    'after' => ':attribute يجب أن يكون تاريخًا بعد :date',
    'after_or_equal' => ':attribute يجب أن يكون تاريخًا بعد أو يساوي :date',
    'alpha' => ':attribute يجب أن يحتوي على أحرف فقط',
    'alpha_dash' => ':attribute يجب أن يحتوي على أحرف وأرقام وشرطات وشرطات سفلية فقط',
    'alpha_num' => ':attribute يجب أن يحتوي على أحرف وأرقام فقط',
    'array' => ':attribute يجب أن يكون مصفوفة',
    'ascii' => ':attribute يجب أن يحتوي على أحرف فقط من الأبجدية اللاتينية والأرقام والرموز',
    'before' => ':attribute يجب أن يكون تاريخًا قبل :date',
    'before_or_equal' => ':attribute يجب أن يكون تاريخًا قبل أو يساوي :date',
    'between' => [
        'array' => ':attribute يجب أن يحتوي على بين :min و :max عنصرًا',
        'file' => ':attribute يجب أن يكون بين :min و :max كيلوبايت',
        'numeric' => ':attribute يجب أن يكون بين :min و :max',
        'string' => ':attribute يجب أن يكون بين :min و :max حرفًا',
    ],
    'boolean' => 'يجب أن يكون حقل :attribute صحيح أو خطأ.',
    'confirmed' => 'حقل تأكيد :attribute لا يتطابق.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'يجب أن يكون حقل :attribute تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون حقل :attribute تاريخًا يساوي :date.',
    'date_format' => 'يجب أن يتوافق حقل :attribute مع الشكل :format.',
    'decimal' => 'يجب أن يحتوي حقل :attribute على :decimal أماكن عشرية.',
    'declined' => 'يجب أن يكون حقل :attribute مرفوضًا.',
    'declined_if' => 'يجب أن يكون حقل :attribute مرفوضًا عندما يكون حقل :other هو :value.',
    'different' => 'يجب أن يكون حقل :attribute مختلفًا عن حقل :other.',
    'digits' => 'يجب أن يحتوي حقل :attribute على :digits أرقام.',
    'digits_between' => 'يجب أن يكون حقل :attribute بين :min و :max أرقام.',
    'dimensions' => 'يحتوي حقل :attribute على أبعاد صورة غير صالحة.',
    'distinct' => 'يحتوي حقل :attribute على قيمة مكررة.',
    'doesnt_end_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'doesnt_start_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values.',
    'email' => 'يجب أن يكون حقل :attribute عنوان بريد إلكتروني صالحًا.',
    'ends_with' => 'يجب أن ينتهي حقل :attribute بأحد القيم التالية: :values.',
    'enum' => 'القيمة المحددة :attribute غير صالحة.',
    'exists' => 'القيمة المحددة :attribute غير صالحة.',
    'file' => 'يجب أن يكون حقل :attribute ملفًا.',
    'filled' => 'يجب أن يحتوي حقل :attribute على قيمة.',
    'gt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أكثر من :value عنصر.',
        'file' => 'يجب أن يكون حقل :attribute أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أكبر من :value.',
        'string' => 'يجب أن يكون حقل :attribute أكبر من :value حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :value عنصر أو أكثر.',
        'file' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value.',
        'string' => 'يجب أن يكون حقل :attribute أكبر من أو يساوي :value حرفًا.',
    ],
    'image' => 'يجب أن يكون حقل :attribute صورة.',
    'in' => 'قيمة الحقل :attribute المحددة غير صحيحة.',
    'in_array' => 'يجب أن يحتوي حقل :attribute على قيمة موجودة في :other.',
    'integer' => 'يجب أن يكون حقل :attribute عددًا صحيحًا.',
    'ip' => 'يجب أن يكون حقل :attribute عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون حقل :attribute عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون حقل :attribute عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون حقل :attribute نص JSON صحيحًا.',
    'lowercase' => 'يجب أن يكون حقل :attribute بأحرف صغيرة.',
    'lt' => [
        'array' => 'يجب أن يحتوي حقل :attribute على أقل من :value عنصرًا.',
        'file' => 'يجب أن يكون حجم حقل :attribute أقل من :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أقل من :value.',
        'string' => 'يجب أن يكون طول حقل :attribute أقل من :value حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب أن لا يحتوي حقل :attribute على أكثر من :value عنصرًا.',
        'file' => 'يجب أن يكون حجم حقل :attribute أقل من أو يساوي :value كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute أقل من أو يساوي :value.',
        'string' => 'يجب أن يكون طول حقل :attribute أقل من أو يساوي :value حرفًا.',
    ],
    'mac_address' => 'يجب أن يكون حقل :attribute عنوان MAC صحيحًا.',
    'max' => [
        'array' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max عنصرًا.',
        'file' => 'يجب أن لا يتجاوز حجم حقل :attribute :max كيلوبايت.',
        'numeric' => 'يجب أن لا يتجاوز حقل :attribute :max.',
        'string' => 'يجب أن لا يتجاوز طول حقل :attribute :max حرفًا.',
    ],
    'max_digits' => 'يجب ألا يحتوي حقل :attribute على أكثر من :max أرقام.',
    'mimes' => 'يجب أن يكون نوع ملف حقل :attribute: :values.',
    'mimetypes' => 'يجب أن يكون نوع ملف حقل :attribute: :values.',
    'min' => [
        'array' => 'يجب أن يحتوي حقل :attribute على الأقل :min عنصرًا.',
        'file' => 'يجب أن يكون حقل :attribute على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute على الأقل :min.',
        'string' => 'يجب أن يحتوي حقل :attribute على الأقل :min حرفًا.',
    ],
    'min_digits' => 'يجب أن يحتوي حقل :attribute على الأقل :min أرقام.',
    'missing' => 'يجب أن يفتقد حقل :attribute.',
    'missing_if' => 'يجب أن يفتقد حقل :attribute عندما يكون :other هو :value.',
    'missing_unless' => 'يجب أن يفتقد حقل :attribute إلا إذا كان :other هو :value.',
    'missing_with' => 'يجب أن يفتقد حقل :attribute عندما يكون :values موجودًا.',
    'missing_with_all' => 'يجب أن يفتقد حقل :attribute عندما تكون :values موجودةً جميعًا.',
    'multiple_of' => 'يجب أن يكون حقل :attribute مضاعفًا للقيمة :value.',
    'not_in' => 'القيمة المحددة :attribute غير صالحة.',
    'not_regex' => 'صيغة حقل :attribute غير صالحة.',
    'numeric' => 'يجب أن يكون حقل :attribute رقمًا.',
    'password' => [
        'letters' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل.',
        'mixed' => 'يجب أن يحتوي حقل :attribute على حرف واحد على الأقل من الأحرف الكبيرة والصغيرة.',
        'numbers' => 'يجب أن يحتوي حقل :attribute على رقم واحد على الأقل.',
        'symbols' => 'يجب أن يحتوي حقل :attribute على رمز واحد على الأقل.',
        // Please enter a complex password, and use ! or @ or # or any special characters.
        // 'uncompromised' => 'تم الكشف عن تسريب بيانات يتضمن :attribute المدخل. يرجى تحديد قيمة مختلفة تحتوي على أرقام وحروف ورموز خاصة لـ :attribute.',
        'uncompromised' => 'فضلاً استخدم كلمة مرور معقدة!',
    ],
    'present' => 'يجب توفر حقل :attribute.',
    'prohibited' => 'حقل :attribute محظور.',
    'prohibited_if' => 'حقل :attribute محظور عندما يكون :other هو :value.',
    'prohibited_unless' => 'حقل :attribute محظور إلا إذا كان :other يتمثل في :values.',
    'prohibits' => 'حقل :attribute يحظر وجود :other.',
    'regex' => 'تنسيق حقل :attribute غير صالح.',
    'required' => 'يجب توفر حقل :attribute.',
    'required_array_keys' => 'يجب تضمين مفاتيح :values في حقل :attribute.',
    'required_if' => 'يتطلب حقل :attribute توفر :value في حالة :other.',
    'required_if_accepted' => 'يتطلب حقل :attribute توفر :other عند قبوله.',
    'required_unless' => 'يتطلب حقل :attribute توفر :other إلا إذا كانت قيم :values موجودة.',
    'required_with' => 'يتطلب حقل :attribute توفر :values عند وجودها.',
    'required_with_all' => 'يتطلب حقل :attribute توفر جميع :values عند وجودها.',
    'required_without' => 'يتطلب حقل :attribute توفر :values عند عدم وجودها.',
    'required_without_all' => 'يتطلب حقل :attribute توفر جميع :values عند عدم وجود أي منها.',
    'same' => 'يجب أن يتطابق حقل :attribute مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي حقل :attribute على :size عنصر.',
        'file' => 'يجب أن يكون حجم حقل :attribute هو :size كيلوبايت.',
        'numeric' => 'يجب أن يكون حقل :attribute هو :size.',
        'string' => 'يجب أن يكون حقل :attribute يحتوي على :size حرف.',
    ],
    'starts_with' => 'يجب أن يبدأ حقل :attribute بأحد القيم التالية: :values.',
    'string' => 'يجب أن يكون حقل :attribute نصًا.',
    'timezone' => 'يجب أن يكون حقل :attribute منطقة زمنية صالحة.',
    'unique' => 'تم استخدام :attribute مسبقًا.',
    'uploaded' => 'فشل تحميل :attribute.',
    'uppercase' => 'يجب أن يكون حقل :attribute بأحرف كبيرة.',
    'url' => 'يجب أن يكون حقل :attribute عنوان URL صالحًا.',
    'ulid' => 'يجب أن يكون حقل :attribute ULID صالحًا.',
    'uuid' => 'يجب أن يكون حقل :attribute UUID صالحًا.',

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
            'rule-name' => 'رسالة مخصصة',
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
