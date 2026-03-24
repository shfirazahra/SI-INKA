<!-- Cart -->
<section class="cart bgwhite p-t-30 p-b-100">
    <div class="container">
        <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <h1>Checkout</h1><hr>

                <table class="table-shopping-cart">
                    <tr class="table-head">
                            <th class="column-1">Gambar</th>
                            <th class="column-2">Produk</th>
                            <th class="column-3">Harga</th>
                            <th class="column-5">Sub Total</th>
                    </tr>
                    <?php 
                    foreach ($keranjang as $keranjang) {
                        //ambil data
                        $kode_bimbel = $keranjang['id'];
                        $tb_bimbel = $this->produk_model->getbyid($kode_bimbel);
                    ?>    
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="<?= base_url('assets/admin/foto/').$tb_bimbel->foto ?>" alt="<?= $keranjang['name'] ?>">
                            </div>
                        </td>
                        <td class="column-2"><?= $keranjang['name'] ?></td>
                        <td class="column-3">Rp. <?= number_format($keranjang['price'],'0',',','.') ?></td>
                        
                        <td class="column-5">Rp. 
                            <?php 
                            $subtotal = $keranjang['price'] * $keranjang['qty'];
                            echo number_format($subtotal,'0',',','.');
                            ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td class="column-1" colspan="4">Total Booking</td>
                        <td class="column-2">Rp. <?= number_format($this->cart->total(),'0',',','.')?></td> 
                        </tr>
                </table><hr>
            </div>
        </div>
    </div>

    <div class="col-md-10 p-b-30 centered">
        <form class="leave-comment" action="<?= base_url('keranjang/checkout'); ?>" method="post">
            <?php $kode_transaksi = date('dmY').strtoupper(random_string('alnum', 8)); ?>
            <input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_user ?>">
            <input type="hidden" name="jumlah_bayar" value="<?= $this->cart->total() ?>">
            <input type="hidden" name="tanggal_transaksi" value="<?= date('Y-m-d h:i:s') ?>">
            <?= $this->session->flashdata('message'); ?>
            <h4 class="m-text15">Kode Transaksi</h4>
                <div class="bo4 size15 m-b-25">
                    <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="nama" name="id_transaksi" placeholder="Kode Transaksi" value="<?= $kode_transaksi ?>"readonly required>
                </div>
            <h4 class="m-text15 ">Nama Pendaftar</h4>
                <div class="bo4 size15 m-b-25">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="nama" name="nama" placeholder="Nama Penerima" value="<?= $pelanggan->nama ?>"required>
                </div>
            <h4 class="m-text15">Email Pendaftar</h4>
                <div class="bo4 size15 m-b-25">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="email" name="email" placeholder="Email Penerima" value="<?= $pelanggan->email ?>"required>
                </div>
            <h4 class="m-text15">Alamat Pendaftar</h4>
                <div class="bo4 size15 m-b-25">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="alamat" name="alamat" placeholder="Alamat Pengiriman" value="<?= $pelanggan->alamat ?>"required>
                </div>
            <h4 class="m-text15">Telepon Pendaftar</h4>
                <div class="bo4 size15 m-b-25">
                        <input class="sizefull s-text7 p-l-22 p-r-22" type="text" id="telepon" name="telepon" placeholder="Telepon" value="<?= $pelanggan->telepon ?>"required>
                </div>
            <div class="w-size25">
                <!-- Button -->
                <button class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4" 
                        type="submit" value="submit" class="btn submit_btn">Bayar
                </button>
            </div>
        </form>
    </div>
</section>