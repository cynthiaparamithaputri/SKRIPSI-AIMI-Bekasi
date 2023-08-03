<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{
        ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Tentang AIMI Bekasi</title>
    <?php
    //link eksternal
    include "../components/head-links-other.php";
    ?>
  </head>
  <body>
    <div>
      <?php
      //navbar
      include "../components/navbar-user.php";
      ?>
      <div class="user-app">
      <div class="tentang w-100 min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col">
            <h1 class="display-4 text-center mb-2">Tentang Kami</h1>
            </div>
          </div>
          <div class="row my-5">
            <div class="col">
            <p>Asosiasi Ibu Menyusui Indonesia (AIMI) adalah organisasi nirlaba berbasis kelompok sesama ibu menyusui dengan tujuan menyebarluaskan pengetahuan dan informasi tentang menyusui serta meningkatkan angka ibu menyusui di Indonesia. Berdiri pada tanggal 21 April 2007, saat ini AIMI terdapat di 19 daerah/provinsi yakni Aceh, Sumatra Utara, Bangka Belitung, Sumatra Barat, Jambi, Lampung, Kepulauan Riau, Sumatra Selatan, Jawa Barat, Jawa Tengah, Yogyakarta, Jawa Timur, Bali, Kalimantan Barat, Kalimantan Timur, Kalimantan Selatan, Sulawesi Selatan, Nusa Tenggara Barat, dan Pusat (DKI Jakarta). Serta memiliki cabang di 11 kotamadya/kabupaten di luar ibu kota provinsi yakni Depok, Cirebon, Bekasi, Bogor, Solo, Purwokerto, Bantul, Malang, Sorowako, Madiun, Sanggau, dan Bukittinggi. Sekretariat AIMI berkedudukan di DKI Jakarta.</p>
            </div>
          </div>
          <div class="row py-3">
            <div class="col">
            <h4 class="fw-bold">Visi AIMI</h4>
            <p>Menjadi kelompok pendukung ibu andalan masyarakat dan berperan utama dalam peningkatan angka ibu menyusui di Indonesia melalui penyelenggaraan kegiatan-kegiatan promosi, edukasi, dan advokasi mengenai menyusui.</p>
            <h4 class="fw-bold mt-5">Misi AIMI</h4>
            <p>1. Meningkatkan pemahaman seluruh elemen masyarakat tentang keutamaan menyusui selama dua tahun atau lebih serta risiko pemberian formula bagi bayi melalui upaya komunikasi kreatif.
              <br/>2. Memberikan informasi, pengetahuan, dan dukungan bagi para ibu untuk menyusui bayinya secara eksklusif selama 6 bulan dan meneruskannya sampai 2 tahun atau lebih, agar setiap ibu di Indonesia memiliki pengetahuan dan informasi yang cukup akan keutamaan menyusui serta Makanan Pendamping ASI rumahan berbahan pangan lokal yang berkualitas.
              <br/>3. Memperkuat hubungan kerja sama dengan pemerintah, perusahaan, mitra gerakan, lembaga donor dan pemangku kepentingan lainnya di semua tingkatan dalam rangka menjalankan fungsi pengawasan peraturan yang mendukung para ibu untuk menyusui bayinya.</p>
            <h4 class="fw-bold mt-5">Lokasi</h4>
            <p>Pondok Pekayon Indah Blok D2/7 <br/>Jalan Mahoni 17, Bekasi 17148</p>
            <h4 class="fw-bold mt-5">Kontak</h4>
            <p><strong>Telepon</strong>: 0817-081-9508 <br/><strong>E-mail</strong>: bekasi@jabar.aimi-asi.org</p>
            </div>
          </div>
        </div>
      </div>
      </div>
      <?php
      //footer
      include "../components/footer-user.php";
      ?>
    </div>
  </body>
</html>
<?php
}
?>