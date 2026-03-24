<!-- Product Detail -->
<div class="container bgwhite p-t-35 p-b-50">
	<div class="flex-w flex-sb">
		<div class="w-size13 p-t-30 respon5">
			<div class="wrap-slick3 flex-sb flex-w">
				<div class="wrap-slick3-dots"></div>
				<div class="slick3">
					<div class="item-slick3" data-thumb="<?= base_url('assets/admin/foto/'.$berita->foto); ?>">
						<div class="wrap-pic-w">
							<img src="<?= base_url('assets/admin/foto/'.$berita->foto); ?>" alt="<?= $berita->nama_berita ?>">
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="w-size14 p-t-30 respon5">
			<?php 
			//form proses belanja
			echo form_open(base_url('keranjang/add/'));

			echo form_hidden('id', $berita->kode_berita);
			echo form_hidden('qty', 1);
			
			echo form_hidden('name', $berita->nama_berita);

			echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
			?>	
			
			<h4 class="product-detail-name m-text16 p-b-13">
				<strong><?= $berita->nama_berita; ?></strong>
			</h4>

			

			<p class="s-text8 p-t-20">
                <?= $berita->deskripsi; ?>
            </p>

            <div class="p-b-50 mt-4">
            	
				<span class="s-text8"><?= $berita->jadwal; ?></span>
            </div>



			

				<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					
				</div>
			</div>
		</div>
	</div>
</div>

