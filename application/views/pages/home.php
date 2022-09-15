<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Tentang</h2>
            </div>

            <div class="row content">
                <div class="col-lg-6">
                    <p>
                        Cekulit merupakan suatu website yang di bangun untuk membantu masyarakat dalam mengidentifikasi penyakit kulit.
                    </p>
                </div>
                <div class="col-lg-6">
                    <p>
                        Oleh karena itu, dengan hadirnya cekulit bisa menjadi alternatif bagi masyarakat yang mau mengidentifikasi penyakit kulit.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- End About Us Section -->

    <section id="penyakit" class="penyakit">
        <div class="container">

            <div class="section-title">
                <h2>Penyakit</h2>
                <p>Untuk saat ini, cekulit menyediakan beberapa penyakit kulit untuk di identifikasi berdasarkan gejala penyakitnya. Untuk lebih jelasnya, bisa di perhatikan pada tabel di bawah ini.</p>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead style="background-color:#00a0a4">
                        <tr>
                            <th style="width: auto; color:white;">No</th>
                            <th style="text-align: center; width:auto; color:white;">Penyakit Kulit</th>
                            <th style="text-align: center; width:auto; color:white;">Nama Lain</th>
                            <th style="text-align: center; width:auto; color:white;">Gejala Penyakit Kulit</th>
                            <th style="text-align: center; width:auto; color:white;">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($penyakit as $p) : ?>
                            <tr>
                                <th><?= ++$page; ?>.</th>
                                <td><?= $p['penyakit']; ?></td>
                                <td><?= $p['alias']; ?></td>
                                <td><?= $p['gejala']; ?></td>
                                <td style="text-align: center;"><a href="<?= base_url('assets/img/') . $p['gambar']; ?>" class="badge badge-info">Detail</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $links ?>
            </div>
        </div>
    </section>
    <!-- End Penyakit Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>Kontak</h2>
                <p>Jika Anda memiliki pertanyaan atau permasalahan seputar penyakit kulit bisa kontak kami langsung atau bisa datang langsung ke alamat kami di bawah ini :</p>
            </div>

            <div class="row">

                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="info">
                        <div class="address">
                            <a href="#contact"><i class="bi bi-geo-alt"></i></a>
                            <h4>Lokasi</h4>
                            <p>Jl. Menoreh Utara IX No.18, Sampangan, Kec. Gajahmungkur, Kota Semarang, Jawa Tengah 50232</p>
                        </div>

                        <div class="email">
                            <a href="#contact"><i class="bi bi-globe"></i></a>
                            <h4>Website</h4>
                            <p>www.cekulit.com</p>
                        </div>

                        <div class="phone">
                            <a href="#contact"><i class="bi bi-telephone"></i></a>
                            <h4>Telepon</h4>
                            <p>+62 812 3456 7890</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="info">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.0118828009695!2d110.38981421459322!3d-7.007883094937774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b0fc2b195cd%3A0xad5125b146b9aa9a!2sJl.%20Menoreh%20Utara%20IX%20No.18%2C%20Sampangan%2C%20Kec.%20Gajahmungkur%2C%20Kota%20Semarang%2C%20Jawa%20Tengah%2050232!5e0!3m2!1sen!2sid!4v1657943553257!5m2!1sen!2sid" width="580" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- End Contact Section -->

    <!-- <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
        The Modal 
    <div id="myModal" class="modal">
        <div class="modal-dialog">
            <span class="close" data-dismiss="modal">&times;</span>
            <img src="" class="modal-content" id="img01">
        </div>
    </div>
    </script> -->


</main><!-- End #main -->