<tr class="row-keranjang">
	<td class="nama_barang">
		<?= $this->input->post('nama_barang') ?>
		<input type="hidden" name="nama_barang_hidden[]" value="<?= $this->input->post('nama_barang') ?>">
	</td>
	<td class="kode_barang">
		<?= $this->input->post('kode_barang') ?>
		<input type="hidden" name="kode_barang_hidden[]" value="<?= $this->input->post('kode_barang') ?>">
	</td>
	<td class="jumlah">
		<?= $this->input->post('jumlah') ?>
		<input type="hidden" name="jumlah_hidden[]" value="<?= $this->input->post('jumlah') ?>">
	</td>
	<td class="ruangan">
		<?= $this->input->post('ruangan') ?>
		<input type="hidden" name="ruangan_hidden[]" value="<?= $this->input->post('ruangan') ?>">
	</td>
	<td class="kondisi">
		<?= $this->input->post('kondisi')?>
		<input type="hidden" name="kondisi_hidden[]" value="<?= $this->input->post('kondisi') ?>">
	</td>
	<td class="tanggal_kembali">
		<?= $this->input->post('tanggal_kembali')?>
		<input type="hidden" name="tanggal_kembali_hidden[]" value="<?= $this->input->post('tanggal_kembali') ?>">
	</td>
</tr>