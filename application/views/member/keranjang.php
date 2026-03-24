<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
    <div class="container">
            <!-- Cart item -->
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <h1>Halaman Booking</h1>
                <?= $this->session->flashdata('message'); ?>
                <table class="table-shopping-cart m-t-15">
                    <tr class="table-head table">
                        <th class="column-1">Gambar</th>
                        <th class="column-2">Bimbel</th>
                        <th class="column-3">Harga</th>
                        <th class="column-5">Sub Total</th>
                        <th class="column-6" width="20%">Action</th>
                    </tr>
                    <?php 
                    //looping keranjang
                    foreach ($keranjang as $keranjang) {
                        //ambil data
                        $kode_bimbel = $keranjang['id'];
                        $produk = $this->produk_model->getbyid($kode_bimbel);
                        //Form update
                        echo form_open(base_url('keranjang/update_cart/'.$keranjang['rowid']));
                    ?>    
                    <tr class="table-row">
                        <td class="column-1">
                            <div class="cart-img-product b-rad-4 o-f-hidden">
                                <img src="<?= base_url('assets/admin/foto/').$produk->foto ?>" alt="<?= $keranjang['name'] ?>">
                            </div>
                        </td>
                        <td class="column-2"><?= $keranjang['name'] ?></td>
                        <td class="column-3">Rp. <?= number_format($keranjang['price'],'0',',','.') ?></td>
                        
                        </td>
                        <td class="column-5">Rp. 
                            <?php 
                            $subtotal = $keranjang['price'] * $keranjang['qty'];
                            echo number_format($subtotal,'0',',','.');
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url('keranjang/hapus/'.$keranjang['rowid']) ?>" class="p-b-10 p-l-10 sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 m-r-10 p-t-10 p-r-5">
                                Hapus
                            </a>

                            <button type="submit" name="update" class="p-b-9 p-l-10 bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-t-7 p-r-10">
                                Update
                            </button>
                        </td>
                    </tr>
                    <?php
                    echo form_close();
                    }
                    ?>
                    <tr>
                        <td class="column-1" colspan="4">Total Booking</td>
                        <td class="column-2">Rp. <?= number_format($this->cart->total(),'0',',','.')?></td> 
                    </tr>
                </table><hr>
            </div>
        </div>

        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="flex-w flex-m w-full-sm">

                        <div class="size16 trans-0-4 m-t-10 m-b-10 m-r-10">
                                <!-- Button -->
                                <a href="<?= base_url('keranjang/hapus_keranjang') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 p-r-10 p-t-10 p-b-10 p-l-10">
                                    Bersihkan Halaman Booking
                                </a>
                        </div>
                </div>

                <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <a href="<?= base_url('keranjang/checkout') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                Bayar
                        </a>
                </div>
            </div>
        </div>
    </div>
</section>



