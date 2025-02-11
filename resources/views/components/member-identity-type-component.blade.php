<div>
    <input type="text" id="{{ $id }}" name="{{ $name }}"
        class="form-control text-uppercase {{ $class }}" placeholder="{{ $placeHolder }}" maxlength="15"
        value="{{ $value }}" @if ($isRequired) required @endif>
    <div id="{{ $id }}-cnic-error" class="mt-2 text-warning" style="display: none;">Use xxxxx-xxxxxxx-x as CNIC format.</div>
    <div id="{{ $id }}-passport-error" class="mt-2 text-warning" style="display: none;">For Passport Number, use 7 to 9 alphanumeric characters.</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    let inputElement = document.getElementById("{{ $id }}");
    // Get error elements using input element's ID
    let inputId = inputElement.id;
    let cnicErrorElement = document.getElementById(inputId + "-cnic-error");
    let passportErrorElement = document.getElementById(inputId + "-passport-error");

    function validateInput() {
        let inputValue = inputElement.value.trim();

        if (typeof jQuery !== "undefined") {
            let primary_identity = $("#primary_identity").val();
            let secondary_identity = $("#secondary_identity").val();
            let currentIdentity = inputElement.id === 'primary_identity_value' ? primary_identity : secondary_identity;

            // Hide both errors initially
            if (cnicErrorElement) cnicErrorElement.style.display = "none";
            if (passportErrorElement) passportErrorElement.style.display = "none";

            if (currentIdentity === 'CNIC') {
                let formattedCNIC = inputValue.replace(/\D/g, '');
                if (formattedCNIC.length > 13) {
                    formattedCNIC = formattedCNIC.substring(0, 13);
                }
                formattedCNIC = formattedCNIC.replace(/(\d{5})(\d{7})?(\d{1})?/, function(match, p1, p2, p3) {
                    return p1 + (p2 ? '-' + p2 : '') + (p3 ? '-' + p3 : '');
                });
                inputElement.value = formattedCNIC;

                let cnicPattern = /^\d{5}-\d{7}-\d{1}$/;
                if (cnicErrorElement) {
                    cnicErrorElement.style.display = cnicPattern.test(formattedCNIC) ? "none" : "block";
                }
            }

            if (currentIdentity === 'Passport') {
                let passportValue = inputValue.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                if (passportValue.length > 9) {
                    passportValue = passportValue.substring(0, 9);
                }
                inputElement.value = passportValue;

                let passportPattern = /^[a-zA-Z0-9]{7,9}$/;
                if (passportErrorElement) {
                    passportErrorElement.style.display = passportPattern.test(passportValue) ? "none" : "block";
                }
            }
        }
    }

    if (inputElement) {
        inputElement.addEventListener("input", validateInput);
        // Run initial validation
        validateInput();
    }
});
</script>
