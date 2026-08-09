import './bootstrap';

import Alpine from 'alpinejs';

import './components/hero-video.js';

window.Alpine = Alpine;

Alpine.start();

// Form Validation and Error Display
(function() {
    'use strict';

    // Function to show error message for an input
    function showInputError(input, message) {
        // Remove existing error message
        removeInputError(input);

        // Add error class to input
        input.classList.add('is-invalid');
        
        // Add error class to parent form-group or single-content
        const formGroup = input.closest('.form-group, .single-content, .single-signup');
        if (formGroup) {
            formGroup.classList.add('has-error');
        }

        // Create error message element
        const errorElement = document.createElement('span');
        errorElement.className = 'form-error-message';
        errorElement.textContent = message;
        errorElement.setAttribute('role', 'alert');
        errorElement.setAttribute('aria-live', 'polite');

        // Insert error message after input
        input.parentNode.insertBefore(errorElement, input.nextSibling);
    }

    // Function to remove error message for an input
    function removeInputError(input) {
        // Remove error class from input
        input.classList.remove('is-invalid');
        
        // Remove error class from parent
        const formGroup = input.closest('.form-group, .single-content, .single-signup');
        if (formGroup) {
            formGroup.classList.remove('has-error');
        }

        // Remove existing error message
        const errorMessage = input.parentNode.querySelector('.form-error-message');
        if (errorMessage) {
            errorMessage.remove();
        }
    }

    // Function to validate input on blur
    function validateInput(input) {
        // Skip if input is disabled or readonly
        if (input.disabled || input.readOnly) {
            return true;
        }

        let isValid = true;
        let errorMessage = '';

        // Check required fields
        if (input.hasAttribute('required') && !input.value.trim()) {
            isValid = false;
            errorMessage = 'This field is required.';
        }
        // Check email format
        else if (input.type === 'email' && input.value && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value)) {
            isValid = false;
            errorMessage = 'Please enter a valid email address.';
        }
        // Check pattern
        else if (input.hasAttribute('pattern') && input.value) {
            const pattern = new RegExp(input.getAttribute('pattern'));
            if (!pattern.test(input.value)) {
                isValid = false;
                const title = input.getAttribute('title');
                errorMessage = title || 'Please enter a valid value.';
            }
        }
        // Check minlength
        else if (input.hasAttribute('minlength') && input.value.length < parseInt(input.getAttribute('minlength'))) {
            isValid = false;
            errorMessage = `Please enter at least ${input.getAttribute('minlength')} characters.`;
        }
        // Check maxlength
        else if (input.hasAttribute('maxlength') && input.value.length > parseInt(input.getAttribute('maxlength'))) {
            isValid = false;
            errorMessage = `Please enter no more than ${input.getAttribute('maxlength')} characters.`;
        }
        // Check min for number inputs
        else if (input.type === 'number' && input.hasAttribute('min') && input.value && parseFloat(input.value) < parseFloat(input.getAttribute('min'))) {
            isValid = false;
            errorMessage = `Please enter a value greater than or equal to ${input.getAttribute('min')}.`;
        }
        // Check max for number inputs
        else if (input.type === 'number' && input.hasAttribute('max') && input.value && parseFloat(input.value) > parseFloat(input.getAttribute('max'))) {
            isValid = false;
            errorMessage = `Please enter a value less than or equal to ${input.getAttribute('max')}.`;
        }

        if (!isValid) {
            showInputError(input, errorMessage);
        } else {
            removeInputError(input);
        }

        return isValid;
    }

    // Initialize validation on all forms
    document.addEventListener('DOMContentLoaded', function() {
        // Get all forms
        const forms = document.querySelectorAll('form');

        forms.forEach(function(form) {
            // Validate on input blur
            const inputs = form.querySelectorAll('input, textarea, select');
            inputs.forEach(function(input) {
                input.addEventListener('blur', function() {
                    validateInput(input);
                });

                // Clear error on input
                input.addEventListener('input', function() {
                    if (input.classList.contains('is-invalid')) {
                        removeInputError(input);
                    }
                });
            });

            // Validate on form submit
            form.addEventListener('submit', function(e) {
                let isFormValid = true;

                inputs.forEach(function(input) {
                    if (!validateInput(input)) {
                        isFormValid = false;
                    }
                });

                // If form is invalid, prevent submission
                if (!isFormValid) {
                    e.preventDefault();
                    e.stopPropagation();

                    // Focus on first invalid input
                    const firstInvalid = form.querySelector('.is-invalid');
                    if (firstInvalid) {
                        firstInvalid.focus();
                        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    }
                }
            });
        });

        // Display server-side validation errors
        const inputsWithErrors = document.querySelectorAll('input.is-invalid, textarea.is-invalid, select.is-invalid');
        inputsWithErrors.forEach(function(input) {
            // Check if there's already an error message from server
            const existingError = input.parentNode.querySelector('.form-error-message, .text-danger');
            if (!existingError) {
                // Try to get error from Laravel's error bag
                const fieldName = input.name;
                if (fieldName) {
                    // This will be handled by Blade @error directive, but we ensure styling is applied
                    const formGroup = input.closest('.form-group, .single-content, .single-signup');
                    if (formGroup) {
                        formGroup.classList.add('has-error');
                    }
                }
            }
        });
    });
})();
