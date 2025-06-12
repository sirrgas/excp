<div class="col-lg-9 mt-2">
  <?php include 'proses/connect.php';

  if (empty($_SESSION['username_kopisop'])) {
    header("Location: login");
    exit;
  }

  $query = mysqli_query($conn, "SELECT p.id, p.nama_pemesan, p.nomor_meja, p.status,
           m.nama AS nama_menu, d.qty
    FROM tb_pesanan p
    JOIN detail_pesanan d ON p.id = d.id_pesanan
    JOIN tb_menu_makanan m ON d.id_menu = m.id
    ORDER BY p.id DESC
");


  $data = [];
  while ($row = mysqli_fetch_assoc($query)) {
    $id = $row['id'];
    if (!isset($data[$id])) {
      $data[$id] = [
        'nama_pemesan' =>
        $row['nama_pemesan'],
        'nomor_meja' => $row['nomor_meja'],
        'status' =>
        $row['status'],
        'menu' => []
      ];
    }
    $data[$id]['menu'][] = $row['nama_menu'] . '
  (x' . $row['qty'] . ')';
  } ?>

  <div class="col-lg-9 mt-2">
    <div class="card">
      <div class="card-header">Daftar Pesanan</div>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th>Nama Pemesan</th>
              <th>Nomor Meja</th>
              <th>Menu</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (
              $data as $id =>
              $pesanan
            ) : ?>
              <tr>
                <td>
                  <?= $pesanan['nama_pemesan'] ?>
                </td>
                <td>
                  <?= $pesanan['nomor_meja'] ?>
                </td>
                <td>
                  <ul>
                    <?php foreach ($pesanan['menu'] as $m) : ?>
                      <li>
                        <?= $m ?>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </td>
                <td>
                  <?= ucfirst($pesanan['status']) ?>
                </td>
                <td>
                  <?php if ($pesanan['status'] == 'proses') : ?>
                    <form method="POST" action="ubah_status.php">
                      <input type="hidden" name="id" value="<?= $id ?>" />
                      <button type="submit" class="btn btn-success btn-sm">
                        Tandai Selesai
                      </button>
                    </form>
                  <?php else : ?>
                    <span class="text-success">Selesai</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>