<?php
$headertext = 'Hubungi kami';
include '../template/head.php';?>

  <header class="masthead" style="background-image: url('https://www.biruindonesia.com/images/articles/contact-us.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Kontak Kami</h1>
            <span class="subheading">Mempunyai pertanyaan, kritik, dan saran? Silahkan hubungi kami. Kami akan dengan senang hati menjawabnya.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p align="justify">Jika mempunyai pertanyaan, kritik dan saran, atau resep masakan yang ingin dibagikan pada website Gulo Klopo Kafe, ataupun ingin mengikuti Campaign bersama kami silahkan untuk menghubungi kami. Kami akan merasa sangat senang jika dapat membantu.</p>
        <form name="sentMessage" id="contactForm" novalidate>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Nama</label>
              <input type="text" class="form-control" placeholder="Nama" id="name" required data-validation-required-message="Please enter your name.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Alamat E-Mail</label>
              <input type="email" class="form-control" placeholder="Alamat E-Mail" id="email" required data-validation-required-message="Please enter your email address.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Nomor Telepon</label>
              <input type="tel" class="form-control" placeholder="Nomor Telepon" id="phone" required data-validation-required-message="Please enter your phone number.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Pesan</label>
              <textarea rows="5" class="form-control" placeholder="Pesan" id="message" required data-validation-required-message="Please enter a message."></textarea>
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <div id="success"></div>
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Kirim</button>
        </form>
      </div>
    </div>
  </div>

  <hr>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <a target="_blank" href="https://www.instagram.com/gulo_klopo/?hl=en" <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <a target="_blank" href="https://www.facebook.com" <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <a target="_blank" href="https://www.whatsapp.com/" <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i> 
                  <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Website Ferda Ayu 2021</p>
        </div>
      </div>
    </div>
  </footer>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>
  <script src="js/clean-blog.min.js"></script>
</body>
</html>