<?php 
    session_start();
      if(!isset($_SESSION['login_user'])) {
        header("location: login.php");
      }else{
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
            <p>Konseling via WhatsApp Chat/WhatsApp Call ini hanya di lakukan dalam masa pandemic #COVID19 karena AIMI sampai saat ini masih belum memungkinkan untuk melakukan konseling HOME VISIT. Konseling via WhatsApp Chat/WhatsApp Call ini TIDAK DAPAT MENGGANTIKAN PERAN KONSELING TATAP MUKA. Konselor menyusui AIMI tetap akan merujuk ke dokter atau fasilitas kesehatan apabila di perlukan.
            <br/><br/>Jika anda berminat untuk melakukan konseling via WhatsApp Chat/WhatsApp Call, Mohon diisi formulir berikut dan admin konseling akan menghubungi Konselor Menyusui, membuat jadwal konseling dan menghubungi Anda kembali. Informasi yang Anda berikan dalam formulir konseling akan berguna bagi konselor yang akan memberikan pelayanan konseling untuk anda.
            <br/><br/>Mulai tanggal 1 Agustus 2020 konseling via WhatsApp ini akan dikenakan donASI sebesar Rp 80.000 per konseling, DonASI dapat ditransfer ke rekening AIMI Bekasi di bank BCA KCP Buaran Jaya,  No. Rek : 6330898346, Atas nama: Nurul Indriati.
            <br/><br/>Konseling akan dilakukan setelah Admin Konseling AIMI Cabang Bekasi menerima bukti transfer dari klien.</p>
          </div>
          <div class="row">
            <form>
            <div class="mb-4">
                <label for="nama" class="form-label">Nama Ibu</label>
                <input type="text" class="form-control" id="nama" />
            </div>

            <div class="mb-4">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="alamat" rows="3"></textarea>
            </div>

            <div class="row mb-4">
                <div class="col">
                    <label for="telp" class="form-label">No WA</label>
                    <input type="tel" id="telp" class="form-control">
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" class="form-control">
                </div>
            </div>

            <div class="mb-4">
                <label for="info" class="form-label">Mendapat Informasi AIMI Dari</label>
                <input type="text" class="form-control" id="info" placeholder="Contoh: Instagram" />
            </div>

            <div class="mb-4">
                <label for="media" class="form-label">Media Konseling</label>
                <select id="media" class="form-select">
                <option selected>Pilih</option>
                <option value="WhatsApp Chat">WhatsApp Chat</option>
                <option value="WhatsApp Call">WhatsApp Call</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="bayi" class="form-label">Nama Bayi</label>
                <input type="text" class="form-control" id="bayi" />
            </div>

            <div class="mb-4">
                <label for="bayi2" class="form-label">Usia Bayi Saat Ini (Dalam Bentuk Bulan)</label>
                <input type="text" class="form-control" id="bayi2" />
            </div>

            <div class="mb-4">
                <label for="bayi3" class="form-label">Bayi Anak Ke</label>
                <input type="text" class="form-control" id="bayi3" />
            </div>

            <div class="mb-4">
                <label for="bayi4" class="form-label">Usia Kehamilan Saat Bayi Lahir (Minggu)</label>
                <input type="text" class="form-control" id="bayi4" />
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Proses Kelahiran</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="proses" id="proses1" value="Normal Pervaginam" checked>
                <label class="form-check-label" for="proses1">
                    Normal Pervaginam
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="proses" id="proses2" value="Caesar/SC">
                <label class="form-check-label" for="proses2">
                    Caesar/SC
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Menjalankan Inisiasi Menyusui Dini (IMD) Setelah Melahirkan Selama 1 Jam?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="IMD" id="IMD1" value="Ya" checked>
                <label class="form-check-label" for="IMD1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="IMD" id="IMD2" value="Tidak">
                <label class="form-check-label" for="IMD2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Rawat Gabung Ibu dan Bayi 24 Jam Nonstop Setelah Kelahiran?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="rawat-gabung" id="rawat-gabung1" value="Ya" checked>
                <label class="form-check-label" for="rawat-gabung1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="rawat-gabung" id="rawat-gabung2" value="Tidak">
                <label class="form-check-label" for="rawat-gabung2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="row mb-4">
                <div class="col">
                    <label for="berat" class="form-label">Berat Bayi Saat Lahir (Kg)</label>
                    <input type="tel" id="berat" class="form-control">
                </div>
                <div class="col">
                    <label for="berat2" class="form-label">Berat Bayi Saat Ini (Kg)</label>
                    <input type="tel" id="berat2" class="form-control">
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Pada Saat Ini Bayi Anda Mendapatkan Asupan Lain Selain ASI? (Susu Formula / Makanan / Minuman)</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="asupan" id="asupan1" value="Ya" checked>
                <label class="form-check-label" for="asupan1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="asupan" id="asupan2" value="Tidak">
                <label class="form-check-label" for="asupan2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
                <label for="asupan3" class="form-label">Jika Ya, sebutkan! Jika Tidak, JAWAB (-)</label>
                <input type="text" class="form-control" id="asupan3" />
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Bayi Menggunakan Botol, Dot, atau Empeng?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="botol" id="botol1" value="Ya" checked>
                <label class="form-check-label" for="botol1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="botol" id="botol2" value="Tidak">
                <label class="form-check-label" for="botol2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Bayi Mempunyai Riwayat Kuning? (Jaundice)</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jaundice" id="jaundice1" value="Ya" checked>
                <label class="form-check-label" for="jaundice1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="jaundice" id="jaundice2" value="Tidak">
                <label class="form-check-label" for="jaundice2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Bayi Sudah Mulai MPASI?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="MPASI" id="MPASI1" value="Sudah" checked>
                <label class="form-check-label" for="MPASI1">
                    Sudah
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="MPASI" id="MPASI2" value="Belum">
                <label class="form-check-label" for="MPASI2">
                    Belum
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
                <label for="MPASI3" class="form-label">Jika Sudah MPASI, Apa Yang Diberikan?
                    <br/><br/>JAWAB (-) JIKA BAYI BELUM DIBERI MPASI.
                    <br/><br/>JIKA SUDAH DIBERIKAN MPASI: TULISKAN BERDASARKAN PERTANYAAN DIBAWAH INI:
                    <br/>1. Frekuensi pemberian makan (Berapa kali dalam sehari)
                    <br/>2. Jumlah/Porsi persekali makan (Contoh: 1-2 sdm atau 1/2 mangkok ukuran 250 ml)
                    <br/>3. Tekstur/kekentalan (Encer seperti asi/air, kental, cincang, iris, makanan keluarga)
                    <br/>4. Variasi/jenis bahan makanan (Apa saja yang sudah diberikan:karbohidrat, protein, buah dan sayur, contoh: nasi, ikan kembung, sayur bening bayam, pisang)</label>
                <textarea class="form-control" id="MPASI3" rows="7"></textarea>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Sebelumnya Sudah Pernah Berkonsultasi Dengan Konselor Menyusui atau Konsultan Laktasi?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="pernah-konsul" id="pernah-konsul1" value="Ya" checked>
                <label class="form-check-label" for="pernah-konsul1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="pernah-konsul" id="pernah-konsul2" value="Tidak">
                <label class="form-check-label" for="pernah-konsul2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah Selama Kehamilan Sudah Mengikuti Kelas Persiapan Menyusui atau Konseling Persiapan Menyusui?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="persiapan" id="persiapan1" value="Ya" checked>
                <label class="form-check-label" for="persiapan1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="persiapan" id="persiapan2" value="Tidak">
                <label class="form-check-label" for="persiapan2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah selama pemberian MPASI sudah mengikuti kelas MPASI atau konseling MPASI?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="MPASI2" id="MPASI2-1" value="Ya" checked>
                <label class="form-check-label" for="MPASI2-1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="MPASI2" id="MPASI2-2" value="Tidak">
                <label class="form-check-label" for="MPASI2-2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
                <label for="jenis" class="form-label">Konseling Yang Diinginkan Saat Ini</label>
                <select id="jenis" class="form-select">
                <option selected>Pilih</option>
                <option value="Konseling persiapan kehamilan dan persalinan">Konseling persiapan kehamilan dan persalinan</option>
                <option value="Konseling Menyusui">Konseling Menyusui</option>
                <option value="Konseling MPASI">Konseling MPASI</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="masalah" class="form-label">CERITAKAN Masalah menyusui atau Masalah MPASI yang sedang dihadapi saat ini?
            <br/>Harap anda menceritakan masalah anda sejelas mungkin untuk mempermudah proses konseling</label>
                <textarea class="form-control" id="masalah" rows="3"></textarea>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah dirumah ibu mendapatkan bantuan dari suami atau anggota keluarga lain dalam merawat bayi/mengurus rumah/mengurus anak yang lebih tua jika ada?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="bantuan" id="bantuan1" value="Ya" checked>
                <label class="form-check-label" for="bantuan1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="bantuan" id="bantuan2" value="Tidak">
                <label class="form-check-label" for="bantuan2">
                    Tidak
                </label>
                </div>
            </div>

            <hr class="hr" />

            <div class="mb-4">
            <label class="form-label">Apakah suami dan keluarga mendukung ibu untuk menyusui atau pemberian MPASI yang tepat sesuai anjuran?</label>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="dukung" id="dukung1" value="Ya" checked>
                <label class="form-check-label" for="dukung1">
                    Ya
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="dukung" id="dukung2" value="Tidak">
                <label class="form-check-label" for="dukung2">
                    Tidak
                </label>
                </div>
            </div>

            <div>
                <button type="submit" class="btn">Submit</button>
            </div>

            </form>
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