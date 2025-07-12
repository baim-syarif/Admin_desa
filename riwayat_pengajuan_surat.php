<div class="card">
    <h3>Riwayat Pengajuan Surat</h3>
    <?php if (mysqli_num_rows($surat_query) > 0): ?>
        <table class="tabel-data">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Jenis Surat</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while ($surat = mysqli_fetch_assoc($surat_query)): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($surat['jenis']); ?></td>
                        <td><?= htmlspecialchars($surat['nama']); ?></td>
                        <td><?= htmlspecialchars($surat['keterangan']); ?></td>
                        <td><?= date('d/m/Y H:i', strtotime($surat['tanggal'])); ?></td>
                        <td>
                            <span class="badge <?= strtolower($surat['status']) ?>">
                                <?= htmlspecialchars($surat['status']); ?>
                            </span>
                        </td>
                        <td>
                            <?php if (!empty($surat['file']) && file_exists('uploads/' . $surat['file'])): ?>
                                <a href="uploads/<?= htmlspecialchars($surat['file']); ?>" download target="_blank">
                                    📄 Unduh
                                </a>
                            <?php else: ?>
                                <span style="color: #888;">Belum Tersedia</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Belum ada surat yang diajukan.</p>
    <?php endif; ?>
</div>
