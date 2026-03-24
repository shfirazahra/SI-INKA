<?php $nav_berita = $this->berita_model->nav_berita() ?>
<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
				<div class="leftbar p-r-20 p-r-0-sm">
					<!--  -->
					<h4 class="m-text14 p-b-7">
						Berita
					</h4>
					<ul class="p-b-54">
						<li class="p-t-4">
							
						    <?php foreach ($nav_berita as $nav_berita ) { ?>
                            <li class="nav-item"><a href="<?= base_url('berita/kategori/'.$nav_berita->url) ?>">
                            <?= $nav_berita->nama_kategori ?></a></li>
                            <?php } ?>
                                                            
						</li>
					</ul>                       
				</div>
			</div>

			<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
				<!-- Product -->
				<div class="row">
                    <?php foreach ($listing_kategori as $berita) { ?>
					<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                         <?php 
                         //form proses belanja
                         echo form_open(base_url('keranjang/add/'));

                         echo form_hidden('id', $berita->kode_berita);
                         echo form_hidden('qty', 1);
                        
                         echo form_hidden('name', $berita->nama_berita);

                         echo form_hidden('redirect_page', str_replace('index.php/', '', current_url()));
                         ?>	
                        <!-- Block2 -->
						<div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                <img src="<?= base_url('assets/admin/foto/').$berita->foto; ?>" alt="<?= $berita->nama_berita?>">
								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>
		                            <div class="block2-btn-addcart w-size1 trans-0-4">
		                                <!-- Button belanja -->
		                                <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
										<a href="<?= base_url('berita/detail/' .$berita->kode_berita) ?>">View Details
		                                </button>
		                            </div>
								</div>
							</div>
							<div class="block2-txt p-t-20">
								<a href="<?= base_url('berita/detail/'.$berita->kode_berita) ?>" class="block2-name dis-block s-text3 p-b-5">
									<?= $berita->nama_berita ?>
								</a>
								
								<br>
								
							</div>
	                    </div>
	                <?php 
	                //closing form
	                echo form_close();
	                ?>
	                </div>
	                <?php } ?>
	            </div>
	        </div>                 
		</div>
	</div>
</section>
