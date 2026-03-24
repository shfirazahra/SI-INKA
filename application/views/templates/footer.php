<?php 	$nav_berita = $this->berita_model->nav_berita();
		$site = $this->konfigurasi_model->get_all();
 ?>
<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					Kontak Kami
				</h4>

				<div>
					<p class="s-text7 w-size27">
	                    <?= $site->alamat ?> 
                    <br><i class="fa fa-envelope"></i> <?= $site->email ?>
                    <br><i class="fa fa-phone"></i> <?= $site->telepon ?> 
					</p>

					<div class="flex-m p-t-30">
						<a href="<?= $site->facebook ?>" target="_blank" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="<?= $site->instagram ?>" target="_blank" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
					</div>
				</div>
			</div>

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				
			</div>


			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>

					<li class="p-b-9">
						<a href="<?= base_url('about'); ?>" class="s-text7">
							Tentang Kami
						</a>
					</li>
					<li class="p-b-9">
						<a href="<?= base_url('about'); ?>" class="s-text7">
							Publikasi
						</a>
					</li>
					<li class="p-b-9">
						<a href="<?= base_url('about'); ?>" class="s-text7">
							Berita
						</a>
					</li>
					<li class="p-b-9">
						<a href="<?= base_url('kontak'); ?>" class="s-text7">
							Kontak
						</a>
					</li>
				</ul>
			</div>

			
					</div>

				</form>
			</div>
		</div>

		<div class="t-center p-l-15 p-r-15">
	        <div class="t-center s-text8 p-t-20">
	            &copy;<script>document.write(new Date().getFullYear());</script>- Kementerian Agraria dan Tata Ruang / Badan Pertanahan Nasional<i  aria-hidden="true"></i> by 
	            <a href="#" target="_blank">Shafira</a>
	        </div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?= base_url(); ?>assets/templates/vendor/sweetalert/sweetalert.min.js"></script>
	

<!--===============================================================================================-->
	<script src="<?= base_url(); ?>assets/templates/js/main.js"></script>

</body>
</html>
