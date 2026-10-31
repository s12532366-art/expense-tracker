<?php
require_once __DIR__ . '/../includes/db.php';

$errors = [];

$catStmt = $pdo->query("SELECT * FROM categories ORDER BY name ASC");
$categories = $catStmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = trim($_POST['description'] ?? '');
    $amount = filter_var($_POST['amount'] ?? 0, FILTER_VALIDATE_FLOAT);
    $category_id = filter_var($_POST['category_id'] ?? 0, FILTER_VALIDATE_INT);
    $expense_date = trim($_POST['expense_date'] ?? '');

    if (empty($description)) {
        $errors[] = "Description cannot be empty.";
    }
    if ($amount === false || $amount <= 0) {
        $errors[] = "Amount must be greater than zero.";
    }
    if (!$category_id) {
        $errors[] = "Please select a category.";
    }
    if (empty($expense_date)) {
        $errors[] = "Please select a valid date.";
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO expenses (description, amount, category_id, expense_date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$description, $amount, $category_id, $expense_date]);
        
        header("Location: index.php");
        exit;
    }
}

require_once __DIR__ . '/../includes/header.php';
?>

<h1 class="mb-4">Add Expense</h1>

<div class="alert alert-danger d-none" id="js-error-alert" role="alert"></div>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($errors as $error): ?>
            <div><?= htmlspecialchars($error) ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="card p-4 col-md-8 offset-md-2">
    <form id="expenseForm" action="add_expense.php" method="POST">
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="e.g. Lunch">
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount ($)</label>
            <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="0.00">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Select a category</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="expense_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="expense_date" name="expense_date">
        </div>
        
        <button type="submit" class="btn btn-primary">Save Expense</button>

    </form>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>