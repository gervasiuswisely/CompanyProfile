<?php
include 'function.php';
$query=$pdo->query("select * from about,lowongan_kerja");
$query->execute();
$data=$query->fetchAll();


foreach($data as$value){
}
$lang=array(
    // index.php
    "title"=>"MYKI-Home",
    "judul"=>"PT.Marga Yasa Konstruksi Indonesia ",
    "home"=>"Beranda",
    "about"=>"Tentang Kami",
    "#about"=>"Tentang",
    "#legalitas"=>"Legalitas",
    "#targetfokus"=>"Target dan Fokus",
    'target_fokus'=>$value['target_fokus'],
    "#roof"=>"Atap",
    "#smartuss"=>"Smartuss",
    "#preenginereed-building"=>"Pre enginereed building",
    "#prefab"=>"Prefab Housing tile on Installation",
    "#pavment"=>"pavment installation",
    "service"=>"Layanan",
    "project"=>"proyek",
    "career"=>"karir",
    "eproc"=>"eproc",
    "ourprofile"=>"Tentang Kami",
    "our_profile"=>$value['our_profile'],
    "visih5"=>"Visi",
    "misih5"=>"Misi",
    "legalitash5"=>"Company Legacy",
    "visi"=>$value['visi'],
    "misi"=>$value['misi'],
    "misi2"=>$value['misi2'],
    "misi3"=>$value['misi3'],
    "legal1"=>$value['legal1'],
    "legal2"=>$value['legal2'],
    "legal3"=>$value['legal3'],
    "legal4"=>$value['legal4'],
    "legal5"=>$value['legal5'],
    "legal6"=>$value['legal6'],
    "legal7"=>$value['legal7'],
    "legal8"=>$value['legal8'],
    "target1"=>$value['target1'],
    "target2"=>$value['target2'],
    "target3"=>$value['target3'],
    "target4"=>$value['target4'],
    "link1"=>"Telusuri lainnya",
    "judul2"=>"Nama Proyek ",
    "klien"=>"Klien",
    "lokasi"=>"Lokasi",
    "tahun"=>"tahun",
    "lang_idn"=>"Indonesia",
    "lang_en"=>"English",
    "contact_us"=>"Kontak Kami :",
    "kontak"=>"Kontak Kami",
    "roof"=>"Pemasangan Atap / Tembok",
    "roofp"=>"Service ini brupa pemasangan atap / tembok",
    "smartuss"=>"Smartuss",
    "smartussp"=>"Service ini brupa pemasangan produk lysaght sperti Smartuss",
    "preenginereed"=>"Bangunan  Prekayasa",
    "prep"=>"servis ini berguna untuk membuat kerangka bangunan sebelum akan dibangun",
    "prefab"=>"Prefabrikasi Rumah",
    "prefabp"=>"service ini berguna untuk membuat rumah prefab ( rumah yang minimalis tp nyaman )",
    "pavment"=>"Pemasangan Paving",
    "pavmentp"=>"service ini brupa pemasangan paving",
    "posisi"=>"Posisi Tersedia",
    "posisith"=>"Posisi",
    "pendidikan"=>"Pendidikan",
    "pengalaman"=>"Pengalaman Kerja",
    "kriteria"=>"Kriteria Umum",
    "deskripsi"=>"Deskripsi Umum",
    "tahun"=>"Tahun",
    "jobkriteria"=>$value['job_criteria'],
    "jobdesc"=>$value['job_desc'],
    "job"=>"Pekerjaan",
    "bidang"=>"di bidang ini",
    "criteria"=>"Kriteria :",
    "back"=>"Kembali",
    "apply"=>"Kirim",
    "nama"=>"Nama",
    "email"=>"Email",
    "nohp"=>"No.Hp",
    "notranskrip"=>"No.Transkrip",
    "nosertifikat"=>"No.Sertifikat",
    "noijazah"=>"No.Ijazah",
    "nocv"=>"No.CV",
    "noktp"=>"No.KTP",
    "nokk"=>"No.Kartu Keluarga",
    "nosurat"=>"No. Surat Keterangan",
    "pasfoto"=>"Pas Foto",

    // login
    "mykilogin"=>"Halaman Login MYKI",
    "customerlogin"=>"Halaman Login Customer",
    "vendorlogin"=>"Halaman Login Vendor",
    "email-login"=>"Surat Elektronik",
    "password"=>"Password",
    "remember-login"=>"Mengingat Password",
    "dont"=>"Belum punya akun",
    "registerhere"=>"Daftar Disini",
    "login"=>"Masuk",

    // register
    "formregistercareer"=>"Form Register Calon Pegawai MYKI",
    "formregistervendor"=>" Form Register Vendor MYKI",
    "formregistercustomer"=>" Form Register Customer MYKI",

    "nama-register"=>"Nama",
    "jenisbadan"=>"Jenis Badan Usaha",
    "notelp"=>"No. Telp",
    "fax"=>"Fax",
    "kodepos"=>"Kode Pos",
    "password-register"=>"Password",
    "website"=>"Situs",
    "alamat"=>"Alamat",
    "kota"=>"Kota",
    "propinsi"=>"Propinsi",
    "email"=>"Surat Elektronik",
    "register"=>"Daftar",

    // request supply

    "formrequestproject"=>"Form Request Proyek MYKI",
    "formrequestvendor"=>"Form Request Supply MYKI",

    "no-request"=>"No.",
    "namaprojek"=>"Nama Proyek",
    "namaproduk"=>"Nama Produk",
    "kondisi"=>"Kondisi",
    "harga"=>"Harga",
    "minorder"=>"Order Minimal",
    "satuan"=>"Satuan",
    "gambar"=>"Gambar",
    "boq"=>"Build Of Quantity",
    "simpan"=>"Simpan",

    "kantorcabangmyki"=>"Kantor Cabang Myki di Indonesia",
    "cabangmojokerto"=>"Cabang Mojokerto",
    "cabangjakarta"=>"Cabang Jakarta",

    "project_id"=>" Id Projek ",
    "judul_projek"=>"Judul",
    "client_projek"=>"Klien",
    "alamat_projek"=>"Alamat",
    "tahun_projek"=>"Tahun",
    "image_path_projek"=>"Path Gambar",








    // about.php 
    
    );
?>