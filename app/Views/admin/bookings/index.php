<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</head>
<body class="p-4 bg-light">
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-2">
            <h2 class="h4">Laporan Pesanan</h2>
            <a href="index.php?action=dashboard" class="btn btn-secondary w-100 w-md-auto">Kembali</a>
        </div>

        <div class="card shadow border-0">
            <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle" style="white-space: nowrap;">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama Tamu</th>
                                <th>Kamar</th>
                                <th>Check-in/Out</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['bookings'] as $b): ?>
                            <tr>
                                <td>#<?= $b->id; ?></td>
                                <td><strong><?= $b->guest_name; ?></strong></td>
                                <td>
                                    <b>Unit <?= $b->room_number; ?></b> <br>
                                    <small>(<?= $b->type_name; ?>)</small>
                                </td>
                                <td>
                                    <small>In: <?= $b->check_in; ?></small><br>
                                    <small>Out: <?= $b->check_out; ?></small>
                                </td>
                                <td>Rp <?= number_format($b->total_price); ?></td>
                                <td>
                                    <?php if($b->status == 'confirmed'): ?>
                                        <span class="badge bg-success">Confirmed</span>
                                    <?php elseif($b->status == 'pending'): ?>
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary"><?= $b->status; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="index.php?action=admin_booking_delete&id=<?= $b->id; ?>" 
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Hapus data?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div> <?php if(empty($data['bookings'])): ?>
                    <div class="alert alert-info text-center mt-3">Belum ada data pesanan.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>