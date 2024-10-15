document.getElementById('purchase-form').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting immediately

    // Form fields
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const phone = document.getElementById('phone').value;
    const paymentMethod = document.getElementById('payment-method').value;

    // Error message elements
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const phoneError = document.getElementById('phone-error');
    const paymentError = document.getElementById('payment-error');

    // Reset error messages
    nameError.style.display = 'none';
    emailError.style.display = 'none';
    phoneError.style.display = 'none';
    paymentError.style.display = 'none';

    // Validation flags
    let isValid = true;

    // Name validation
    if (!name) {
        nameError.style.display = 'block';
        isValid = false;
    }

    // Email validation (simple regex for basic format check)
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email || !emailRegex.test(email)) {
        emailError.style.display = 'block';
        isValid = false;
    }

    // Phone validation (basic length check)
    if (!phone || phone.length < 10) {
        phoneError.style.display = 'block';
        isValid = false;
    }

    // Payment method validation
    if (!paymentMethod) {
        paymentError.style.display = 'block';
        isValid = false;
    }

    // If the form is valid, display a success message
    if (isValid) {
        alert('Purchase Successful! Thank you for buying Luxury Condo 1.');
        // Optionally redirect to another page after successful submission
        // window.location.href = "thank-you.html";
    }
});