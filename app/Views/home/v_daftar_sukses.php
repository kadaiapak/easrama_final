<?= $this->extend('layout_front_end/template'); ?>
<?= $this->section('content'); ?>
<div class="contact-info-area default-padding">
    <div class="container">
        <div class="row">
            <!-- Start Contact Info -->
            <div class="contact-info">
                <div class="col-md-12 col-sm-12">
                    <div class="item">
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="info">
                            <h4>Sukses</h4>
                            <span>Pendaftaran Sukses, silahkan login untuk informasi selanjutnya </span>
                        </div>
                    </div>
                </div>
                <div class="seperator col-md-12">
                    <span class="border"></span>
                </div>
                <!-- Start Maps & Contact Form -->
                <div class="maps-form col-md-12">
                    <div class="col-md-6 maps">
                        <h3>Lokasi Kami</h3>
                        <div class="google-maps">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d14767.262289338461!2d70.79414485000001!3d22.284975!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1424308883981"></iframe>
                        </div>
                    </div>
                    <div class="col-md-6 form">
                        <div class="heading">
                            <h3>Bintang Sekolah Al-Quran</h3>
                            <p>
                                Sekolah Al-Quran Pertama dan Terpercaya
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End Maps & Contact Form -->
        </div>
    </div>
</div>
<!-- End Contact Info -->
</div>
<?= $this->endSection(); ?>
