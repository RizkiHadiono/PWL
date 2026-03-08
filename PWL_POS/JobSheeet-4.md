## Praktikum 1 - $fillable:
Saat file dijalankan, data user dengan username manager_dua berhasil ditambahkan ke database dan tampil pada tabel di halaman web. Hal ini bisa terjadi karena teknik Mass Assignment digunakan, dan seluruh nama kolom yang akan disisipkan data (yaitu level_id, username, nama, dan password) telah didaftarkan ke dalam array properti $fillable pada file UserModel.php.
![image alt]()

Saat password dihapus dari $fillable dan program dijalankan ulang, akan terjadi error SQL (misalnya: Field 'password' doesn't have a default value atau data gagal tersimpan utuh). Ini membuktikan bahwa Laravel secara otomatis akan menolak / mengabaikan penyisipan data pada kolom yang tidak terdaftar di dalam $fillable. Fitur ini berfungsi untuk mencegah celah keamanan Mass Assignment Vulnerability, di mana user nakal mungkin bisa memanipulasi parameter form.
![image alt]()

## Praktikum 2.1 – Retrieving Single Models
Halaman web hanya menampilkan satu baris data pengguna (yaitu pengguna yang memiliki ID 1). Method find($id) di Eloquent ORM secara spesifik bekerja mencari record tunggal berdasarkan atribut Primary Key dari tabel tersebut.
![image alt]()

Halaman web menampilkan data pengguna dengan level_id bernilai 1. Meskipun di database mungkin ada banyak pengguna dengan level_id = 1, method first() akan membatasi query untuk hanya mengambil dan mengembalikan 1 baris record pertama yang ditemukan di database.
![image alt]()

Halaman web berubah menjadi halaman Error 404 Not Found. Ini terjadi karena pengguna dengan ID 20 tidak ada di database. Karena data tidak ditemukan, method findOr() langsung mengeksekusi fungsi closure di parameter keduanya, yaitu fungsi abort(404) yang memerintahkan aplikasi untuk menampilkan error Not Found.
![image alt]()

## Praktikum 2.2 – Not Found Exceptions
Data dengan ID 1 tampil secara normal. Berbeda dengan find() biasa yang akan mengembalikan nilai null jika data tidak ada, findOrFail() bertugas mengambil data, namun jika data tidak ditemukan, metode ini akan secara otomatis melempar ModelNotFoundException (yang diterjemahkan menjadi halaman 404).
![image alt]()

Halaman web menampilkan pesan error atau halaman 404 Not Found. Query gagal dieksekusi karena tidak ada record yang sesuai dengan kriteria username = manager9. Oleh karena itu, method firstOrFail() langsung melemparkan ModelNotFoundException sehingga eksekusi program dihentikan.
![image alt]()

## Praktikum 2.3 – Retreiving Aggregrates
Layar berubah menjadi halaman debug berlatar belakang hitam yang hanya menampilkan angka (misalnya angka 2). Angka ini merepresentasikan hasil perhitungan/jumlah baris pada tabel m_user yang memenuhi syarat level_id = 2. Fungsi dd() (Dump and Die) digunakan untuk mencetak hasil count tersebut dan mematikan/menghentikan script agar halaman view di bawahnya tidak dirender.
![image alt]()
![image alt]()

## Praktikum 2.4 – Retreiving or Creating Models
Halaman web berhasil menampilkan data pengguna 'manager'. Karena data tersebut memang sudah tersedia (karena kita membuatnya di praktikum sebelumnya/seeder), method firstOrCreate hanya menjalankan fungsi Retrieving (mengambil data pertama yang cocok) tanpa melakukan penambahan data baru ke database.
![image alt]()

Pada halaman web tampil data 'manager22', dan ketika dicek melalui phpMyAdmin pada tabel m_user, baris data baru untuk 'manager22' telah berhasil masuk. Karena method firstOrCreate() awalnya tidak menemukan username tersebut, method ini otomatis membuat (create) dan menyimpan (INSERT) record baru ke dalam database menggunakan array data yang diumpankan.
![image alt]()

Output yang dihasilkan identik dengan proses firstOrCreate. Karena data 'manager' sudah ada di database, method ini sekadar menarik instance datanya dan menampilkannya di halaman.
![image alt]()

Saat perintah dijalankan hanya menggunakan firstOrNew('manager33'), jika kita cek di phpMyAdmin, data 'manager33' belum bertambah di tabel. Hal ini terjadi karena firstOrNew hanya membuat instance/object data tersebut di dalam memori Laravel saja (belum di-INSERT ke MySQL).
![image alt]()

Setelah script $user->save(); ditambahkan ke dalam kode, barulah jika dicek di phpMyAdmin data 'manager33' muncul. Fungsi save() bertugas menjalankan query SQL INSERT secara manual untuk mengunci data yang tadi dibuat di memori masuk ke dalam tabel secara permanen.
![image alt]()

## Praktikum 2.5 – Attribute Changes
Output pada layar (hasil dari perintah dd) bernilai false. Pada alur kodenya, kita sempat mengubah state username menjadi 'manager56', yang membuat status model tersebut di memori menjadi Dirty (ada atribut yang berubah tapi belum tersimpan). Namun, karena dipanggil fungsi $user->save() sebelum fungsi dd(), maka status data sudah tersinkronisasi kembali dengan database sehingga model tersebut berubah kembali menjadi Clean. Oleh karena itu, pengecekan isDirty() di akhir menghasilkan nilai false.
![image alt]()

Output yang tampil bernilai true. Method wasChanged() memeriksa seluruh siklus eksekusi pada halaman tersebut. Karena username sempat dimanipulasi (dari 'manager11' menjadi 'manager12') lalu dieksekusi melalui save(), Laravel mencatat bahwa pada siklus request ini pernah terjadi perubahan atribut pada model tersebut, sehingga nilainya true.
![image alt]()

## Praktikum 2.6 – Create, Read, Update, Delete (CRUD)
Data pada halaman web kini berbentuk tabel yang melooping banyak data. Menggunakan method UserModel::all() (Read), Laravel akan mengambil seluruh data dari tabel m_user dan meneruskannya ke view untuk kemudian ditampilkan menggunakan perulangan @foreach.
![image alt]()

Setelah tombol simpan ditekan, halaman web otomatis me-redirect kembali ke halaman awal (/user) dan baris data di dalam tabel menjadi bertambah sesuai dengan isian form. Ini mengindikasikan bahwa method tambah_simpan() menerima tangkapan $request dari form, menggunakan Eloquent UserModel::create() untuk meng-insert data, dan fungsi redirect bekerja sempurna.
![image alt]()

Sama seperti create, halaman me-redirect ke /user. Namun alih-alih bertambah panjang, record tabel yang bersangkutan isinya akan diperbarui (Update). Metode HTTP yang digunakan adalah PUT, kemudian Eloquent menangkap data berdasarkan find($id), me-replace satu per satu kolom dengan variabel $request baru, dan akhirnya menembak query UPDATE ke database via $user->save().
![image alt]()

Ketika tombol ditekan, baris data user secara instan menghilang dari tabel. Hal ini membuktikan bahwa metode penghapusan berhasil. Controller menangkap ID via URL, mengambil spesifik modelnya lewat find($id), lalu mengeksekusi metode $user->delete() yang akan menjalankan query SQL DELETE di database berdasarkan Primary Key.
![image alt]()

## Praktikum 2.7 – Relationships
Tampilan debug dd menunjukkan susunan array objek dari UserModel. Jika setiap objek diekspansi (dilihat isinya), pada bagian atribut relations tidak lagi kosong. Terdapat koleksi objek model lain bernama level yang menempel pada data user. Ini menandakan fitur Eager Loading bekerja mengambil data user sekaligus melakukan query join ke tabel relasinya (LevelModel) secara otomatis dan efisien.
![image alt]()

Halaman tabel kini memiliki informasi yang lebih deskriptif, di mana atribut "Kode Level" (misal: MNG, ADM) dan "Nama Level" (misal: Administrator) ikut ditampilkan, alih-alih hanya sebuah angka abstrak dari level_id. Proses ini bisa dieksekusi karena kita memanggil $d->level->level_kode di view, di mana level di sini merujuk pada method level() yang ada di UserModel yang bertugas sebagai 'jembatan' (Relasi BelongsTo) menuju ke LevelModel.
![image alt]()
