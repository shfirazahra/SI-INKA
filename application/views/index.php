<!-- New Product -->
<section id="advertisement">
		<div class="container">
			<img src="images/shop/bpn.png" alt="" />
		</div>

					
					</div>
				</div>
				
				<div class="col-sm-12 padding-center">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">INFORMASI TERBARU</h2>
						<div class="col-sm-12">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="" alt="" />
											<h2></h2>
											<p>
                                                Berita Resmi ATR/BPN Jawa Tengah 
                                            Kanwil BPN Jateng gandeng Universitas Jenderal Soedirman (Unsoed) Purwokerto melaksanakan kajian kerentanan sosial agraria di 7 daerah. Hasil kajian akan digunakan untuk menentukan kebijakan agraria terutama dalam menyukseskan program Pendaftaran Tanah Sistematis Lengkap (PTSL) di Jawa Tengah.

"Pelaksanaan Kajian Kerentanan Sosial, menjadi salah satu aktivitas Program Percepatan Reforma Agraria (PPRA) sebagai implementasi atas perhatian khusus ATR/BPN dan Bank Dunia terhadap aspek pengamanan. Terutama saat melakukan kegiatan Pendaftaran Tanah Sistematis Lengkap (PTSL), dengan mengkaji kerentanan sosial yang mungkin ditimbulkan oleh kegiatan pendaftaran," kata Kepala Kanwil ATR/BPN Jateng Dwi Purnama ditemui dikantornya Jumat (26/5/2023) siang, usai melaksanakan tandatangan kerjasama dengan Universitas Jenderal Soedirman Unsoed. 
												
												</p>
										
						
					</div><!--features_items-->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h2 class="m-text5 t-center">
                    Berita Terbaru
            </h2>
        </div>
        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
            <?php foreach ($data->result() as $key) : ?>
                <div class="item-slick2 p-l-15 p-r-15">

                    <?php 
                    //form proses belanja
                    echo form_open(base_url('keranjang/add/'));

                    echo form_hidden('id', $key->kode_berita);
                    echo form_hidden('qty', 1);
                    
                    echo form_hidden('name', $key->nama_berita);

                    echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                    ?>

                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                            <img width="80" src="<?= base_url('assets/admin/foto/').$key->foto; ?>" alt="IMG-PRODUCT">
                            <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>
                                <div class="block2-btn-addcart w-size1 trans-0-4">
                                    <!-- Button belanja -->
                                    <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                    <a href="<?= base_url('berita/detail/' .$key->kode_berita) ?>">View Details
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="<?= base_url('berita/detail/'.$key->kode_berita) ?>" class="block2-name dis-block s-text3 p-b-5">
                                <?= $key->nama_berita ?>
                            </a>
                          
                            <br>
								
                        </div>
                    </div>

                    <?php 
                    //closing form
                    echo form_close();
                    ?>

                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>





