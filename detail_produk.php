
<?php 
$id_produk = $_GET['id'];
$data = mysqli_query($koneksi,"select * from produk,kategori where kategori_id=produk_kategori and produk_id='$id_produk'");
while($produk=mysqli_fetch_array($data)){
	?>
	<style>
		.product-view img {
    width: 100%;
    height: auto;
    max-height: 350px;
    object-fit: cover; /* Menjaga gambar tetap proporsional */
}

.product-body {
    margin-top: 20px;
}

.add-to-cart {
    margin-top: 15px;
}

  /* Menambahkan jarak untuk menghindari header */
  .section {
        margin-top: 100px; /* Sesuaikan dengan tinggi header */
    }

    .product-view img {
        width: 70%;
        height: auto;
        max-height: 700px;
        object-fit: cover;
    }

    .product-body {
        margin-top: 20px;
    }

    .add-to-cart {
        margin-top: 15px;
    }

	</style>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!--  Product Details -->
            <div class="col-md-6">
                <div id="product-main-view">
                    <!-- Main Product Image -->
                    <div class="product-view">
                        <img src="gambar/produk/<?php echo !empty($produk['produk_foto1']) ? $produk['produk_foto1'] : 'sistem/produk.png'; ?>" alt="Product Image">
                    </div>
                    <!-- Additional Product Images -->
                    <div class="product-view">
                        <img src="gambar/produk/<?php echo !empty($produk['produk_foto2']) ? $produk['produk_foto2'] : 'sistem/produk.png'; ?>" alt="Product Image">
                    </div>
                    <div class="product-view">
                        <img src="gambar/produk/<?php echo !empty($produk['produk_foto3']) ? $produk['produk_foto3'] : 'sistem/produk.png'; ?>" alt="Product Image">
                    </div>
                </div>
				<div id="product-view">

							<div class="product-view">
								<?php if($produk['produk_foto1'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $produk['produk_foto1'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($produk['produk_foto2'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $produk['produk_foto2'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($produk['produk_foto3'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $produk['produk_foto3'] ?>">
								<?php } ?>
							</div>

							<div class="product-view">
								<?php if($produk['produk_foto2'] == ""){ ?>
									<img src="gambar/sistem/produk.png">
								<?php }else{ ?>
									<img src="gambar/produk/<?php echo $produk['produk_foto2'] ?>">
								<?php } ?>
							</div>

						</div>
            </div>

            <div class="col-md-6">
                <div class="product-body">
                    <div class="product-label">
                        <span><?php echo $produk['kategori_nama']; ?></span>
                        <span class="sale">Kualitas Terbaik</span>
                    </div>
                    <h2 class="product-name"><?php echo $produk['produk_nama']; ?></h2>
                    <h3 class="product-price">Rp. <?php echo number_format($produk['produk_harga'], 0, ',', '.'); ?></h3>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o empty"></i>
                    </div>
                    <p><strong>Status:</strong> <?php echo $produk['produk_jumlah'] == 0 ? 'Kosong' : 'Tersedia'; ?></p>
                    <a class="primary-btn add-to-cart" href="keranjang/keranjang_masukkan.php?id=<?php echo $produk['produk_id']; ?>&redirect=home">
                        <i class="fa fa-shopping-cart"></i> Masukkan Keranjang
                    </a>
                </div>
            </div>
        </div>
		<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Deskripsi</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab1" class="tab-pane fade in active">
									
									<p><?php echo $produk['produk_keterangan']; ?></p>

								</div>
							</div>
						</div>
					</div>
</div>
    </div>
	
<?php } ?>

<div class="section">
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">Rekomendasi Produk Lainnya</h2>
                </div>
            </div>

            <!-- Product List -->
            <?php
            $data = mysqli_query($koneksi, "select * from produk,kategori where kategori_id=produk_kategori order by rand() limit 4");
            while ($produk = mysqli_fetch_array($data)) { ?>
                <div class="col-md-3 col-sm-6">
                    <div class="product product-single">
                        <div class="product-thumb">
                            <div class="product-label">
                                <span><?php echo $produk['kategori_nama'] ?></span>
                            </div>
                            <a href="produk_detail.php?id=<?php echo $produk['produk_id'] ?>" class="main-btn quick-view">
                                <i class="fa fa-search-plus"></i> Quick view
                            </a>
                            <img src="gambar/produk/<?php echo !empty($produk['produk_foto1']) ? $produk['produk_foto1'] : 'sistem/produk.png'; ?>" style="height: 250px;">
                        </div>
                        <div class="product-body">
                            <h3 class="product-price">Rp. <?php echo number_format($produk['produk_harga'], 0, ',', '.'); ?></h3>
                            <h2 class="product-name">
                                <a href="produk_detail.php?id=<?php echo $produk['produk_id'] ?>"><?php echo $produk['produk_nama']; ?></a>
                            </h2>
                            <div class="product-btns">
                                <a class="primary-btn add-to-cart btn-block" href="keranjang_masukkan.php?id=<?php echo $produk['produk_id']; ?>&redirect=detail">
                                    <i class="fa fa-shopping-cart"></i> Masukkan Keranjang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
