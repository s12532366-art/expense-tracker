<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

$query = "SELECT e.id, e.description, e.amount, e.expense_date, c.name AS category_name 
          FROM expenses e 
          JOIN categories c ON e.category_id = c.id 
          ORDER BY e.expense_date DESC, e.id DESC";
$stmt = $pdo->query($query);
$expenses = $stmt->fetchAll();

$totalAmount = 0;
foreach ($expenses as $expense) {
    $totalAmount += $expense['amount'];
}
?>

<h1 class="mb-4">Expenses</h1>

<div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Date</th>
                <th>Description</th>
                <th>Category</th>
                <th>Amount ($)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($expenses) > 0): ?>
                <?php foreach ($expenses as $expense): ?>
                    <tr>
                        <td><?= htmlspecialchars($expense['expense_date']) ?></td>
                        <td><?= htmlspecialchars($expense['description']) ?></td>
                        <td><?= htmlspecialchars($expense['category_name']) ?></td>
                        <td><?= number_format($expense['amount'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No expenses recorded yet.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    
    <div class="d-flex justify-content-end align-items-center mt-3 fs-5 fw-bold">
        <span>Total: $<?= number_format($totalAmount, 2) ?></span>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>