<?php include "header.php" ?>
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('assets/assets/img/hero_bg.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat; height: 100vh;"
        data-aos="fade-in">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <h2 data-aos="fade-up" class="animated-text">
                        <span>Selamat Datang</span>
                    </h2>
                    <blockquote data-aos="fade-up" data-aos-delay="100">
                        <p>Para ilmuwan cilik! Belajar sains, seru dan mengasyikan!</p>
                    </blockquote>
                </div>
            </div>
        </div>
        <img src="assets/assets/img/hero.jpg" alt="" data-aos="fade-up">
    </section>

    <style>
    .animated-text {
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        font-size: 2rem;
        color: #fff;
    }

    .animated-text span {
        display: inline-block;
        animation: scrolling-text 10s linear infinite;
    }

    @keyframes scrolling-text {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }
    </style>

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
                                        <strong>Identitas Utama</strong>: Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Voluptas velit placeat officiis eligendi dolores deserunt
                                        tempora quam temporibus. Fugiat voluptatum adipisci debitis tempora dicta omnis
                                        dolor odit minus libero nulla!
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
                                        <strong>Visi, Misi, dan Tujuan</strong>: Lorem ipsum dolor sit amet consectetur
                                        adipisicing elit. Nobis voluptate perspiciatis ipsam vero dolor illum, magnam
                                        fugit. Neque voluptatem aspernatur nisi accusamus non earum sapiente sunt a
                                        dicta, distinctio odio!
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
                                        <strong>Fitur Utama</strong>: Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Voluptas velit placeat officiis eligendi dolores deserunt
                                        tempora quam temporibus. Fugiat voluptatum adipisci debitis tempora dicta omnis
                                        dolor odit minus libero nulla!
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
                                        <strong>Sasaran Pengguna</strong>: Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Voluptas velit placeat officiis eligendi dolores deserunt
                                        tempora quam temporibus. Fugiat voluptatum adipisci debitis tempora dicta omnis
                                        dolor odit minus libero nulla!
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
                                        <strong>Tim Pengembang</strong>: Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Voluptas velit placeat officiis eligendi dolores deserunt
                                        tempora quam temporibus. Fugiat voluptatum adipisci debitis tempora dicta omnis
                                        dolor odit minus libero nulla!
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
                                        <strong>Kontak dan Dukungan</strong>: Lorem ipsum dolor sit, amet consectetur
                                        adipisicing elit. Voluptas velit placeat officiis eligendi dolores deserunt
                                        tempora quam temporibus. Fugiat voluptatum adipisci debitis tempora dicta omnis
                                        dolor odit minus libero nulla!
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
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Tulis Namamu Disini"
                                    style="font-size: 14px; color:rgb(0, 0, 0); background-color: #f8f9fa; border: 1px solid #ced4da;"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="class" class="form-control" placeholder="Tulis Kelasmu"
                                    style="font-size: 14px; color:rgb(0, 0, 0); background-color: #f8f9fa; border: 1px solid #ced4da;"
                                    required>
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control" placeholder="Tulis Pertanyaan/Saranmu"
                                    rows="11"
                                    style="font-size: 14px; color:rgb(0, 0, 0); background-color: #f8f9fa; border: 1px solid #ced4da;"
                                    required></textarea>
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