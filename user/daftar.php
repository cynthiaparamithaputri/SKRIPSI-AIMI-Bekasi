<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: ../login.php");
      }else{

        include '../koneksi.php';

        $errorMessage = "";

            $email_user = $_SESSION['login_user'];

            $sql = "SELECT * FROM t_user WHERE email = '$email_user'";
            $hasil = mysqli_query($koneksi, $sql);
            $row = $hasil->fetch_assoc();

            $id_user = $row["id_user"];

            $waktu_daftar = "";
            $nama_ibu = "";
            $alamat = "";
            $telp = "";
            $info = "";
            $media = "";
            $bayi = "";
            $bayi2 = "";
            $bayi3 = "";
            $bayi4 = "";
            $proses = "";
            $IMD = "";
            $rawat_gabung = "";
            $berat = "";
            $berat2 = "";
            $asupan = "";
            $asupan_detail = "";
            $botol = "";
            $jaundice = "";
            $MPASI = "";
            $MPASI_detail = "";
            $pernah_konsul = "";
            $persiapan = "";
            $kelas = "";
            $jenis = "";
            $masalah = "";
            $bantuan = "";
            $dukung = "";


            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $waktu_daftar = date('Y-m-d H:i:s');
                $nama_ibu = $_POST['nama_ibu'];
                $alamat = $_POST['alamat'];
                $telp = $_POST['telp'];
                $email_user = $_POST['email_user'];
                $info = $_POST['info'];
                $media = $_POST['media'];
                $bayi = $_POST['bayi'];
                $bayi2 = $_POST['bayi2'];
                $bayi3 = $_POST['bayi3'];
                $bayi4 = $_POST['bayi4'];
                $proses = $_POST['proses'];
                $IMD = $_POST['IMD'];
                $rawat_gabung = $_POST['rawat_gabung'];
                $berat = $_POST['berat'];
                $berat2 = $_POST['berat2'];
                $asupan = $_POST['asupan'];
                $asupan_detail = $_POST['asupan_detail'];
                $botol = $_POST['botol'];
                $jaundice = $_POST['jaundice'];
                $MPASI = $_POST['MPASI'];
                $MPASI_detail = $_POST['MPASI_detail'];
                $pernah_konsul = $_POST['pernah_konsul'];
                $persiapan = $_POST['persiapan'];
                $kelas = $_POST['kelas'];
                $jenis = $_POST['jenis'];
                $masalah = $_POST['masalah'];
                $bantuan = $_POST['bantuan'];
                $dukung = $_POST['dukung'];
              
                do {
                  if (empty($nama_ibu) || empty($alamat) || empty($telp) || empty($email_user) || empty($info) || empty($media) || empty($bayi) || empty($bayi2) || empty($bayi3) || empty($bayi4) || empty($proses) || empty($IMD) || empty($rawat_gabung) || empty($berat) || empty($berat2) || empty($asupan) || empty($asupan_detail) || empty($botol) || empty($jaundice) || empty($MPASI) || empty($MPASI_detail) || empty($pernah_konsul) || empty($persiapan) || empty($kelas) || empty($jenis) || empty($masalah) || empty($bantuan) || empty($dukung)) {
                    $errorMessage = "Tidak boleh ada isian yang kosong!";
                    break;
                  }
              
                    $sql2 = "INSERT INTO t_konseling (waktu_daftar, nama_ibu, alamat, no_wa, email, media_informasi, media_konseling, nama_bayi, usia_bayi, anak_ke, usia_hamil, proses_lahir, imd, rawat_gabung, berat_lahir, berat_sekarang, asupan_lain, detail_asupan, guna_botol_dot, jaundice, MPASI, detail_MPASI, konsultasi, persiapan_menyusui, kelas_konsul_MPASI, jenis_konseling, masalah, bantuan, dukungan, id_user) VALUES ('$waktu_daftar', '$nama_ibu', '$alamat', '$telp', '$email_user', '$info', '$media', '$bayi', $bayi2, $bayi3, $bayi4, '$proses', '$IMD', '$rawat_gabung', $berat, $berat2, '$asupan', '$asupan_detail', '$botol', '$jaundice', '$MPASI', '$MPASI_detail', '$pernah_konsul', '$persiapan', '$kelas',  '$jenis', '$masalah', '$bantuan', '$dukung', $id_user)";
                    $hasil2 = $koneksi->query($sql2);

                    if (!$hasil2) {
                        $errorMessage = "Sistem bermasalah, ada yang salah dengan isian anda. Hindari menggunakan tanda kutip";
                        break;
                    }

                    header("Location: daftar-berhasil.php");
                    exit;

                } while (false);
              }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Daftar Konseling</title>
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
      <div class="daftar w-100 min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col">
            <h1 class="display-4 text-center mb-2">Daftar Konseling</h1>
            </div>
          </div>
          <div class="pt-5"><hr class="hr" /></div>
          <div class="row">
            <div class="col">
            <img src="../assets/img/women-talking.jpg" class="img-fluid" alt="konseling-img">
            </div>
          </div>
          <div class="row my-5 shadow-sm">
            <p style="white-space: pre-line;"><?php echo $info_daftar ?></p>
          </div>
          <div class="row">
            <form method="post">
            <div class="mb-4">
                <label for="nama_ibu" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?php echo $nama_ibu ?>" />
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat"><?php echo $alamat ?></textarea>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="telp" class="form-label">No WA</label>
                    <input type="tel" id="telp" class="form-control" name="telp" value="<?php echo $telp ?>">
                </div>
                <div class="col">
                    <label for="email_user" class="form-label">Email</label>
                    <input type="email" id="email_user" class="form-control" name="email_user" value="<?php echo $email_user ?>">
                </div>
            </div>

            <div class="mb-4">
                <label for="info" class="form-label">Mendapat Informasi AIMI Dari</label>
                <input type="text" class="form-control" id="info" placeholder="Contoh: Instagram" name="info" value="<?php echo $info ?>" />
            </div>

            <div class="mb-4">
                <label for="media" class="form-label">Media Konseling</label>
                <select id="media" class="form-select" name="media">
                <option <?php if (!isset($media)) echo "selected";?>>Pilih</option>
                <option value="WhatsApp Chat" <?php if (isset($media) && $media=="WhatsApp Chat") echo "selected";?>>WhatsApp Chat</option>
                <option value="WhatsApp Call" <?php if (isset($media) && $media=="WhatsApp Call") echo "selected";?>>WhatsApp Call</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="bayi" class="form-label">Nama Bayi</label>
                <input type="text" class="form-control" id="bayi" name="bayi" value="<?php echo $bayi ?>" />
            </div>

            <div class="mb-4">
                <label for="bayi2" class="form-label">Usia Bayi Saat Ini (Dalam Bentuk Bulan)</label>
                <input type="text" class="form-control" id="bayi2" name="bayi2" placeholder="Contoh: 12" value="<?php echo $bayi2 ?>" />
            </div>

            <div class="mb-4">
                <label for="bayi3" class="form-label">Bayi Anak Ke</label>
                <input type="text" class="form-control" id="bayi3" name="bayi3" placeholder="Contoh: 1" value="<?php echo $bayi3 ?>" />
            </div>

            <div class="mb-4">
                <label for="bayi4" class="form-label">Usia Kehamilan Saat Bayi Lahir (Minggu)</label>
                <input type="text" class="form-control" id="bayi4" name="bayi4" placeholder="Contoh: 37" value="<?php echo $bayi4 ?>" />
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Proses Kelahiran</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="proses" id="proses1" value="Normal Pervaginam" <?php if ($proses=="" || isset($proses) && $proses=="Normal Pervaginam") echo "checked";?>>
                <label class="form-check-label" for="proses1">
                    Normal Pervaginam
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="proses" id="proses2" value="Caesar/SC" <?php if (isset($proses) && $proses=="Caesar/SC") echo "checked";?>>
                <label class="form-check-label" for="proses2">
                    Caesar/SC
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Menjalankan Inisiasi Menyusui Dini (IMD) Setelah Melahirkan Selama 1 Jam?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="IMD" id="IMD1" value="Ya" <?php if ($IMD=="" || isset($IMD) && $IMD=="Ya") echo "checked";?>>
                <label class="form-check-label" for="IMD1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="IMD" id="IMD2" value="Tidak" <?php if (isset($IMD) && $IMD=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="IMD2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Rawat Gabung Ibu dan Bayi 24 Jam Nonstop Setelah Kelahiran?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="rawat_gabung" id="rawat_gabung1" value="Ya" <?php if ($rawat_gabung=="" || isset($rawat_gabung) && $rawat_gabung=="Ya") echo "checked";?>>
                <label class="form-check-label" for="rawat_gabung1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="rawat_gabung" id="rawat_gabung2" value="Tidak" <?php if (isset($rawat_gabung) && $rawat_gabung=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="rawat_gabung2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="row mb-4">
                <div class="col">
                    <label for="berat" class="form-label">Berat Bayi Saat Lahir (Kg)</label>
                    <input type="tel" id="berat" class="form-control" name="berat" placeholder="Contoh: 3.5" value="<?php echo $berat ?>">
                </div>
                <div class="col">
                    <label for="berat2" class="form-label">Berat Bayi Saat Ini (Kg)</label>
                    <input type="tel" id="berat2" class="form-control" name="berat2" placeholder="Contoh: 8" value="<?php echo $berat2 ?>">
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Pada Saat Ini Bayi Anda Mendapatkan Asupan Lain Selain ASI? (Susu Formula / Makanan / Minuman)</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="asupan" id="asupan1" value="Ya" <?php if ($asupan=="" || isset($asupan) && $asupan=="Ya") echo "checked";?>>
                <label class="form-check-label" for="asupan1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="asupan" id="asupan2" value="Tidak" <?php if (isset($asupan) && $asupan=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="asupan2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
                <label for="asupan_detail" class="form-label">Jika Ya, sebutkan! Jika Tidak, JAWAB (-)</label>
                <input type="text" class="form-control" id="asupan_detail" name="asupan_detail" value="<?php echo $asupan_detail ?>" />
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Bayi Menggunakan Botol, Dot, atau Empeng?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="botol" id="botol1" value="Ya" <?php if ($botol=="" || isset($botol) && $botol=="Ya") echo "checked";?>>
                <label class="form-check-label" for="botol1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="botol" id="botol2" value="Tidak" <?php if (isset($botol) && $botol=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="botol2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Bayi Mempunyai Riwayat Kuning? (Jaundice)</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jaundice" id="jaundice1" value="Ya" <?php if ($jaundice=="" || isset($jaundice) && $jaundice=="Ya") echo "checked";?>>
                <label class="form-check-label" for="jaundice1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jaundice" id="jaundice2" value="Tidak" <?php if (isset($jaundice) && $jaundice=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="jaundice2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Bayi Sudah Mulai MPASI?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="MPASI" id="MPASI1" value="Sudah" <?php if ($MPASI=="" || isset($MPASI) && $MPASI=="Sudah") echo "checked";?>>
                <label class="form-check-label" for="MPASI1">
                    Sudah
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="MPASI" id="MPASI2" value="Belum" <?php if (isset($MPASI) && $MPASI=="Belum") echo "checked";?>>
                <label class="form-check-label" for="MPASI2">
                    Belum
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
                <label for="MPASI_detail" class="form-label">Jika Sudah MPASI, Apa Yang Diberikan?
                    <br/><br/>JAWAB (-) JIKA BAYI BELUM DIBERI MPASI.
                    <br/><br/>JIKA SUDAH DIBERIKAN MPASI: TULISKAN BERDASARKAN PERTANYAAN DIBAWAH INI:
                    <br/>1. Frekuensi pemberian makan (Berapa kali dalam sehari)
                    <br/>2. Jumlah/Porsi persekali makan (Contoh: 1-2 sdm atau 1/2 mangkok ukuran 250 ml)
                    <br/>3. Tekstur/kekentalan (Encer seperti asi/air, kental, cincang, iris, makanan keluarga)
                    <br/>4. Variasi/jenis bahan makanan (Apa saja yang sudah diberikan:karbohidrat, protein, buah dan sayur, contoh: nasi, ikan kembung, sayur bening bayam, pisang)</label>
                <textarea class="form-control" id="MPASI_detail" rows="7" name="MPASI_detail"><?php echo $MPASI_detail ?></textarea>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Sebelumnya Sudah Pernah Berkonsultasi Dengan Konselor Menyusui atau Konsultan Laktasi?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="pernah_konsul" id="pernah_konsul1" value="Ya" <?php if ($pernah_konsul=="" || isset($pernah_konsul) && $pernah_konsul=="Ya") echo "checked";?>>
                <label class="form-check-label" for="pernah_konsul1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="pernah_konsul" id="pernah_konsul2" value="Tidak" <?php if (isset($pernah_konsul) && $pernah_konsul=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="pernah_konsul2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Selama Kehamilan Sudah Mengikuti Kelas Persiapan Menyusui atau Konseling Persiapan Menyusui?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="persiapan" id="persiapan1" value="Ya" <?php if ($persiapan=="" || isset($persiapan) && $persiapan=="Ya") echo "checked";?>>
                <label class="form-check-label" for="persiapan1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="persiapan" id="persiapan2" value="Tidak" <?php if (isset($persiapan) && $persiapan=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="persiapan2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah selama pemberian MPASI sudah mengikuti kelas MPASI atau konseling MPASI?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kelas" id="kelas1" value="Ya" <?php if ($kelas=="" || isset($kelas) && $kelas=="Ya") echo "checked";?>>
                <label class="form-check-label" for="kelas1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="kelas" id="kelas2" value="Tidak" <?php if (isset($kelas) && $kelas=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="kelas2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
                <label for="jenis" class="form-label">Konseling Yang Diinginkan Saat Ini</label>
                <select id="jenis" class="form-select" name="jenis">
                <option <?php if (!isset($jenis)) echo "selected";?>>Pilih</option>
                <option value="Konseling persiapan kehamilan dan persalinan" <?php if (isset($jenis) && $jenis=="Konseling persiapan kehamilan dan persalinan") echo "selected";?>>Konseling persiapan kehamilan dan persalinan</option>
                <option value="Konseling Menyusui" <?php if (isset($jenis) && $jenis=="Konseling Menyusui") echo "selected";?>>Konseling Menyusui</option>
                <option value="Konseling MPASI" <?php if (isset($jenis) && $jenis=="Konseling MPASI") echo "selected";?>>Konseling MPASI</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="masalah" class="form-label">CERITAKAN Masalah menyusui atau Masalah MPASI yang sedang dihadapi saat ini?
            <br/>Harap anda menceritakan masalah anda sejelas mungkin untuk mempermudah proses konseling</label>
                <textarea class="form-control" id="masalah" rows="3" name="masalah"><?php echo $masalah ?></textarea>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah dirumah ibu mendapatkan bantuan dari suami atau anggota keluarga lain dalam merawat bayi/mengurus rumah/mengurus anak yang lebih tua jika ada?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="bantuan" id="bantuan1" value="Ya" <?php if ($bantuan=="" || isset($bantuan) && $bantuan=="Ya") echo "checked";?>>
                <label class="form-check-label" for="bantuan1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="bantuan" id="bantuan2" value="Tidak" <?php if (isset($bantuan) && $bantuan=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="bantuan2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah suami dan keluarga mendukung ibu untuk menyusui atau pemberian MPASI yang tepat sesuai anjuran?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="dukung" id="dukung1" value="Ya" <?php if ($dukung=="" || isset($dukung) && $dukung=="Ya") echo "checked";?>>
                <label class="form-check-label" for="dukung1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="dukung" id="dukung2" value="Tidak" <?php if (isset($dukung) && $dukung=="Tidak") echo "checked";?>>
                <label class="form-check-label" for="dukung2">
                    Tidak
                </label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn-2">Submit</button>
            </div>

            </form>
            
          </div>
          <?php
                if (!empty($errorMessage)){
                echo "
                <div class='alert alert-warning alert-dismissible fade show mt-3' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                ";
                }
                ?>
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