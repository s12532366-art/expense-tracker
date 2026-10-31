<?php
require_once __DIR__ . '/../includes/db.php';
require_once __DIR__ . '/../includes/header.php';

$totalStmt = $pdo->query("SELECT SUM(amount) AS grand_total FROM expenses");
$grandTotal = $totalStmt->fetch()['grand_total'] ?? 0;

$query = "SELECT c.name AS category_name, COALESCE(SUM(e.amount), 0) AS category_total 
          FROM categories c 
          LEFT JOIN expenses e ON c.id = e.category_id 
          GROUP BY c.id, c.name 
          ORDER BY category_total DESC";
$summaryStmt = $pdo->query($query);
$summaries = $summaryStmt->fetchAll();
?>

<h1 class="mb-4">Summary</h1>
<h3 class="mb-3 text-secondary">Spending by category</h3>

<div class="card p-4 col-md-10 offset-md-1">
    <?php if ($grandTotal > 0): ?>
        <?php foreach ($summaries as $row): 
            $catTotal = $row['category_total'];
            $percentage = ($grandTotal > 0) ? ($catTotal / $grandTotal) * 100 : 0;
        ?>
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-1">
                    <span class="fw-bold"><?= htmlspecialchars($row['category_name']) ?></span>
                    <span>$<?= number_format($catTotal, 2) ?> (<?= number_format($percentage, 1) ?>%)</span>
                </div>
                <div class="progress" style="height: 22px;">
                    <div class="progress-bar bg-primary" role="progressbar" 
                         style="width: <?= $percentage ?>%;" 
                         aria-valuenow="<?= $percentage ?>" aria-valuemin="0" aria-valuemax="100">
                        <?= number_format($percentage, 1) ?>%
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <hr>
        <div class="d-flex justify-content-end fs-4 fw-bold mt-2">
            Total: $<?= number_format($grandTotal, 2) ?>
        </div>
    <?php else: ?>
        <p class="text-center text-muted">No expenses recorded to calculate summary.</p>
    <?php endif; ?>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>