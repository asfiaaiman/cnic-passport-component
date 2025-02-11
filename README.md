# Laravel CNIC & Passport Validation Component

## Overview
`member-identity-type-component` is a Laravel 11 component that provides real-time validation for primary and secondary identity values based on predefined formats. It supports validation for:
- **CNIC (Pakistan)**: Ensures the format `xxxxx-xxxxxxx-x`
- **Passport**: Includes validation based on passport number requirements.

This component is designed to be flexible, allowing you to integrate it seamlessly into your Laravel application as per your scenario.

## Features
- ✅ **Real-time Validation**: Instantly validates input fields as users type.
- ✅ **Supports CNIC & Passport**: Ensures compliance with Pakistan’s CNIC format and standard passport validation.
- ✅ **Customizable & Scalable**: Modify it as needed to fit additional identity formats.
- ✅ **User-Friendly Experience**: Helps users enter correct data, reducing errors in form submissions.

## Usage
Integrate this validation component in your Blade templates:

```blade
@component('components.member-identity-type-component', [
    'name' => 'identity_value',
    'value' => old('identity_value', $identities?->identity_value),
    'id' => 'primary_identity_value',
    'isRequired' => true,
    'placeHolder' => 'Identity Number',
    'maxLength' => 15,
    'class' => '',
])
@endcomponent
```

Or apply it within your form validation rules in controllers:

```php
$request->validate([
    'cnic' => 'required|regex:/^\d{5}-\d{7}-\d{1}$/',
    'passport' => 'required|alpha_num|min:6|max:9'
]);
```

## Compatibility
- Laravel **11**
- PHP **8.2+**

## Contributing
Feel free to contribute by improving the code and sharing suggestions.

## License
This component is open-source and available under the **MIT License**.

## Support
For any issues or questions, feel free to reach out.

---
🚀 **Enhance your Laravel forms with smart validation today!**
