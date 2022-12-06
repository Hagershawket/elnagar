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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'ends_with' => 'The :attribute must end with one of the following: :values.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'password' => 'The password is incorrect.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values.',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    //Purchase
    'date.required'              => 'حقل التاريخ مطلوب.',
    'supplier_id.required'       => 'حقل اسم المورد مطلوب.',
    'product_id.required'        => 'حقل اسم المنتج مطلوب.',
    'unit_id.required'           => 'حقل اسم الوحدة مطلوب.',
    'total_cash.required'        => 'حقل اجمالى النقدى مطلوب.',
    'total_delay.required'       => 'حقل اجمالى الآجــل مطلوب.',
    'qty.required'               => 'حقل الكمية مطلوب.',
    'weight.required'            => 'حقل الوزن مطلوب.',
    'unit_cost.required'         => 'حقل سعر الوحدة مطلوب.',
    'total.required'             => 'حقل الاجمالى مطلوب.',
    'warehouse_id.required'      => 'حقل المستودع مطلوب',

    //Warehouse
    'name.required'              => 'حقل الاسم  مطلوب.',
    'name.unique'                => 'اسم المستودع موجود من قبل',

    //holiday
    'employee_id.required'       => 'حقل اسم الموظف مطلوب.',
    'job_num.required'           => 'حقل الرقم الوظيفي مطلوب.',
    'from_date.required'         => 'حقل بداية تاريخ الاجازة مطلوب.',
    'from_date.after'            => 'حقل بداية تاريخ الاجازة يجب ان يكون بتاريخ اليوم.',
    'to_date.required'           => 'حقل نهاية تاريخ الاجازة مطلوب.',
    'amount.required'            => 'حقل المبلغ مطلوب.',
    'checkin.required'           => 'حقل وقت الحضور مطلوب.',
    'checkout.required'          => ' حقل وقت الانصراف مطلوب.',
    'checkout.after'             => 'حقل وقت الانصراف ليس وقتا صالحًا.',
    'branch_id.required'         => 'حقل الفرع مطلوب.',

    //Branch
    'branchName.required'       => 'حقل اسم الفرع مطلوب.',
    'branchName.unique'         => 'اسم الفرع موجود من قبل.',
    'phone.required'            => 'حقل رقم الهاتف مطلوب.',
    'phone.unique'              => 'حقل رقم الهاتف  موجود من قبل.',
    'address.required'          => 'حقل العنوان مطلوب.',
    'longitude.required'        => 'حقل خط الطول مطلوب.',
    'longitude.unique'           => 'حقل خط موجود من قبل.',
    'latitude.required'         => 'حقل دائرة العرض مطلوب.',
    'latitude.unique'            => 'حقل دائرة العرض وجود من قبل.',
    'cost.required'             => 'حقل تكلفة الانشاء مطلوب.',
    'country.required'          => 'حقل البلد مطلوب.',
    'start_date.date'           => 'حقل بداية تاريخ رخصة التشغيل ليست تاريخًا صالحًا.',
    'end_date.date'             => 'حقل نهاية تاريخ رخصة التشغيل ليست تاريخًا صالحًا.',
    'end_date.after'            => 'حقل نهاية تاريخ رخصة التشغيل ليست تاريخًا صالحًا.',
    'country_image.image'       => 'حقل صورة الرخصة يجب ان يكون صورة',
    'country_image.mimes'       => ' png او jpg او jpeg او gif او svg يجب ان تكون صيغة الصورة',
    'country_image.max'         => 'اقصى حجم للصورة هو 2048',
    //Category
    'category_name.required' => 'حقل اسم المجموعة مطلوب.',
    'category_name.unique'   => 'اسم المجموعة الذى قمت بادخاله موجود من قبل',

    //employee Reports
    'employeeName.required' => 'حقل اسم الموظف مطلوب.',
    'notes.required' => 'حقل الملاحظات  مطلوب.',

    //Product
    'product_name.required' => 'حقل اسم الصنف مطلوب',
    'product_name.unique'   => 'اسم الصنف الذى قمت بادخاله موجود من قبل',
    'warehouse_id.required'  => 'حقل اسم المستودع مطلوب',

    //Country
    'country_name.required' => 'حقل اسم الدولة مطلوب',
    'country_name.unique'   => 'اسم الدولة الذى قمت بادخاله موجود من قبل',
    'currency_id.required'  => 'حقل اسم العملة مطلوب',
    'country_image.image'   => 'حقل صورة الدولة يجب ان يكون صورة',
    'country_image.mimes'   => ' png او jpg او jpeg او gif او svg يجب ان تكون صيغة الصورة',
    'country_image.max'     => 'اقصى حجم للصورة هو 2048',

    //Currency
    'currency_name.required'   => 'حقل اسم العملة مطلوب',
    'currency_name.unique'     => 'اسم العملة الذى قمت بادخاله موجود من قبل',
    'currency_value.required'  => 'حقل سعر التحويل مطلوب',

    //Unit
    'unit_name.required'     => 'حقل اسم الوحدة مطلوب',
    'unit_name.unique'       => 'اسم الوحدة الذى قمت بادخاله موجود من قبل',
    'unit_code.required'     => 'حقل  الترميز مطلوب',
    'unit_name.unique'       => 'الترميز الذى قمت بادخاله موجود من قبل',

    //Supplier
    'supplier_name.required'  => 'حقل اسم المورد مطلوب',
    'supplier_name.unique'    => 'اسم المورد الذى قمت بادخاله موجود من قبل',
    'supplier_phone.required' => 'حقل رقم الجوال مطلوب',
    'supplier_phone.unique'   => 'رقم جوال المورد الذى قمت بادخاله موجود من قبل',
    // 'reference_no.unique'     => 'رقم التسجيل الضريبى الذى قمت بادخاله موجود من قبل',
    'supplier_image.image'    => 'حقل صورة المورد يجب ان يكون صورة',
    'supplier_image.mimes'    => ' png او jpg او jpeg او gif او svg يجب ان تكون صيغة الصورة',
    'supplier_image.max'      => 'اقصى حجم للصورة هو 2048',
    'supplier_wallet.required_with' => 'لقد قمت باختيار طريقة دفع لذا يرجى ادخال رقم الحساب / الجوال',

    //Employee
    'employee_id.required'                   => 'حقل اسم الموظف مطلوب',
    'employee_name.required'                 => 'حقل اسم الموظف مطلوب',
    'employee_job_num.unique'                => 'الرقم الوظيفى الذى قمت بادخاله موجود من قبل',
    'employee_job_num.required'              => 'حقل الرقم الوظيفى مطلوب',
    'employee_type.required'                 => 'حقل النوع مطلوب',
    'employee_working_days.required'         => 'حقل عدد ايام العمل فى الشهر مطلوب',
    'employee_work_hours.required'           => 'حقل عدد ساعات العمل فى اليوم مطلوب',
    'type.required'                          => 'حقل نوع الاضافة مطلوب',
    'employee_password.unique'               => 'كلمة المرور  الذى قمت بادخالها موجودة من قبل',
    'employee_password.required'             => 'حقل كلمة المرور مطلوب',
    'employee_image.image'                   => 'حقل صورة الموظف يجب ان يكون صورة',
    'employee_image.mimes'                   => ' png او jpg او jpeg او gif او svg يجب ان تكون صيغة صورة الموظف',
    'employee_image.max'                     => 'اقصى حجم لصورة الموظف هو 2048',
    'employee_start_date.required_with'      => 'هذا الحقل مطلوب اذا قمت بادخال شهادة التأمين الصحى او تاريخ نهاية الشهادة',
    'employee_end_date.required_with'        => 'هذا الحقل مطلوب اذا قمت بادخال شهادة التأمين الصحى او تاريخ بداية الشهادة او كلاهما',
    'employee_file.required_with'            => 'هذا الحقل مطلوب اذا قمت بادخال تاريخ بداية الشهادة او تاريخ نهاية الشهادة او كلاهما',


    //Setting
    'checkin_time.required'                   => 'حقل وقت الدخول مطلوب',
    'checkout_time.required'                  => 'حقل وقت الخروج مطلوب',
    'articles.required'                       => 'حقل المقالة الاسترشادية مطلوب',
    'whatsApp.required'                       => 'حقل رقم واتساب للدعم مطلوب',

    //payment
    'payment_date.required'                 => 'حقل التاريخ مطلوب',
    'payment_supplier_id.required'          => 'حقل اسم المورد مطلوب',
    'payment_amount.required'               => 'حقل المبلغ المسدد مطلوب',
    'payment_paymentMethod.required'        => 'حقل طريقة الدفع مطلوب',
    'payment_image.image'                   => 'حقل صورة الايصال يجب ان يكون صورة',
    'payment_image.mimes'                   => ' png او jpg او jpeg او gif او svg يجب ان تكون صيغة صورة الايصال',
    'payment_image.max'                     => 'اقصى حجم لصورة الايصال هو 2048',

    //Notification
    'title.required'                        => 'حقل العنوان مطلوب',
    'body.required'                         => 'حقل المحتوى مطلوب',

    //Notification Item
    'notification_category_id.required'     => 'حقل فئة الاشعار مطلوب',
    'notification_date.required'            => 'حقل التاريخ مطلوب',
    'notification_time.required'            => 'حقل الوقت مطلوب',

    //payment
    'transport_type.required'               => 'حقل النوع مطلوب',
    'transport_num.required'                => 'حقل رقم اللوحة مطلوب',
    'transport_num.unique'                  => 'حقل رقم اللوحة موجود من قبل',
    'transport_chassis_num.required'        => 'حقل رقم الساشيه مطلوب',
    'transport_chassis_num.unique'          => 'حقل رقم الساشيه موجود من قبل',
    'transport_organization_name.required'  => 'حقل جهة المرور الصادر منها الرخصة مطلوب',
    'transport_start_date.required'         => 'حقل تاريخ بداية الترخيص مطلوب',
    'transport_exp_date.required'           => 'حقل تاريخ نهاية الترخيص مطلوب',
    // 'transport_image.required'              => 'حقل صورة الرخصة مطلوب',
    'transport_image.image'                 => 'حقل صورة الرخصة يجب ان يكون صورة',
    'transport_image.mimes'                 => ' png او jpg او jpeg او gif او svg يجب ان تكون صيغة صورة الايصال',
    'transport_image.max'                   => 'اقصى حجم لصورة الايصال هو 2048',

    //Notification Item
    'investor_name.required'                => 'حقل اسم المستثمر مطلوب',
    'investor_name.unique'                  => 'حقل اسم المستثمر موجود من قبل',
    'investor_main_amount.required'         => 'حقل المبلغ الاساسى مطلوب',
    'investor_investment_amount.required'   => 'حقل مبلغ الاستثمار مطلوب',

    //Expense
    'expense_main_id.required'               => 'حقل البنود الرئيسية مطلوب',
    'expense_sub_id.required'                => 'حقل البنود الفرعية مطلوب',
    'expense_date.required'                  => 'حقل تاريخ السداد مطلوب',
    'expense_grand_total.required'           => 'حقل اجمالى مبلغ الفاتورة مطلوب',

    //Expense
    'installment_reason.required'              => 'حقل سبب القسط مطلوب',
    'installment_months_num.required'          => 'حقل عدد الشهور مطلوب',
    'installment_monthly_amount.required'      => 'حقل المبلغ الشهرى مطلوب',
    'installment_start_date.required'          => 'حقل بداية التقسيط مطلوب',
    'installment_end_date.required'            => 'حقل نهاية التقسيط مطلوب',
    'installment_total_amount.required'        => 'حقل اجمالى المبلغ مطلوب',
    'installment_link_id.required'             => 'حقل التوجيه مطلوب',

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
