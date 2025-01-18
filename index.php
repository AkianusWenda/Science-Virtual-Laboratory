<?php include "header.php" ?>
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <h2 data-aos="fade-up">Selamat Datang</h2>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p>Para ilmuwan cilik! Belajar sains, seru dan mengasyikan!</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <img src="assets/assets/img/hero.jpg" alt="" data-aos="fade-up">
    </section>

    <!-- About and Contact Section -->
    <section id="about-contact" class="about-contact section py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- Tentang Kami -->
                <div class="col-lg-6 col-md-12 mb-4">
                    <section id="about-us" class="about-us">
                        <h2 class="section-title text-center mb-4">Tentang Kami</h2>

                        <!-- Accordion for About Us -->
                        <div class="accordion" id="aboutAccordion">
                            <!-- Identitas Utama -->
                            <div class="accordion-item shadow-sm border rounded mb-2">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Identitas Utama
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne">
                                    <div class="accordion-body">
                                        <strong>Identitas Utama</strong>: Kami adalah platform edukasi kesehatan yang
                                        fokus pada pemberdayaan perempuan dalam mengelola nyeri haid.
                                    </div>
                                </div>
                            </div>

                            <!-- Visi, Misi, dan Tujuan -->
                            <div class="accordion-item shadow-sm border rounded mb-2">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Visi, Misi, dan Tujuan
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#aboutAccordion">
                                    <div class="accordion-body">
                                        <strong>Visi, Misi, dan Tujuan</strong>: Visi kami adalah menyediakan platform
                                        yang informatif dan mendukung kesehatan perempuan terkait nyeri haid.
                                    </div>
                                </div>
                            </div>

                            <!-- Fitur Utama -->
                            <div class="accordion-item shadow-sm border rounded mb-2">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        Fitur Utama
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#aboutAccordion">
                                    <div class="accordion-body">
                                        <strong>Fitur Utama</strong>: Kami menawarkan berbagai fitur seperti kalkulator
                                        siklus menstruasi dan panduan penanganan nyeri haid.
                                    </div>
                                </div>
                            </div>

                            <!-- Sasaran Pengguna -->
                            <div class="accordion-item shadow-sm border rounded mb-2">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        Sasaran Pengguna
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#aboutAccordion">
                                    <div class="accordion-body">
                                        <strong>Sasaran Pengguna</strong>: Platform ini ditujukan untuk perempuan dari
                                        berbagai usia yang ingin mempelajari lebih lanjut tentang nyeri haid dan
                                        solusinya.
                                    </div>
                                </div>
                            </div>

                            <!-- Tim Pengembang -->
                            <div class="accordion-item shadow-sm border rounded mb-2">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        Tim Pengembang
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#aboutAccordion">
                                    <div class="accordion-body">
                                        <strong>Tim Pengembang</strong>: Tim kami terdiri dari ahli medis dan teknisi
                                        yang berkomitmen untuk memberikan solusi terbaik.
                                    </div>
                                </div>
                            </div>

                            <!-- Kontak dan Dukungan -->
                            <div class="accordion-item shadow-sm border rounded mb-2">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        Kontak dan Dukungan
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#aboutAccordion">
                                    <div class="accordion-body">
                                        <strong>Kontak dan Dukungan</strong>: Kami menyediakan saluran dukungan yang
                                        dapat diakses kapan saja melalui form kontak di platform.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Kirim Pesan -->
                <div class="col-lg-6 col-md-12">
                    <section id="contact-form" class="contact-form">
                        <h2 class="text-center mb-4">Kirim Pesan Pada Kami!</h2>
                        <form action="send_message.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tulis Namamu Disini"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="class" class="form-control" placeholder="Tulis Kelasmu"
                                    required>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control" placeholder="Tulis Pertanyaan/Saranmu"
                                    rows="6" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Kirim</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </section>

</main>

<?php include "footer.php" ?>