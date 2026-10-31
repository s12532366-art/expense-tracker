document.addEventListener('DOMContentLoaded', function() {
    const expenseForm = document.getElementById('expenseForm');
    const alertContainer = document.getElementById('js-error-alert');

    if (expenseForm) {
        expenseForm.addEventListener('submit', function(e) {
            const description = document.getElementById('description').value.trim();
            const amount = parseFloat(document.getElementById('amount').value);
            const category = document.getElementById('category_id').value;
            const date = document.getElementById('expense_date').value;

            let errors = [];

            if (!description) {
                errors.push('Description cannot be empty.');
            }
            if (isNaN(amount) || amount <= 0) {
                errors.push('Amount must be greater than zero.');
            }
            if (!category) {
                errors.push('Please select a category.');
            }
            if (!date) {
                errors.push('Please select a valid date.');
            }

            if (errors.length > 0) {
                e.preventDefault();
                alertContainer.classList.remove('d-none');
                alertContainer.innerHTML = errors.join('<br>');
            } else {
                alertContainer.classList.add('d-none');
            }
        });
    }
});