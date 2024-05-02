#Penjelasan Codingan :

- Index.php :
Penjelasan codingan di index.php :
Coding di atas adalah sebuah contoh implementasi PHP dan HTML untuk membuat aplikasi perpustakaan sederhana. Mari kita bahas bagian-bagian pentingnya:

1. Require Perpustakaan (require_once 'features/perpus.php';): Ini adalah baris yang mengimpor atau menyertakan file perpus.php yang berisi definisi kelas-kelas yang digunakan dalam aplikasi perpustakaan, seperti Library dan ReferenceBook.
2. Inisialisasi Perpustakaan ($library = new Library();): Baris ini membuat objek $library berdasarkan kelas Library. Objek ini akan digunakan untuk memanipulasi data buku dalam perpustakaan.
3. Data Buku ($dataBook = [...];): Ini adalah array multidimensi yang berisi informasi tentang beberapa buku. Setiap elemen array berisi detail buku seperti ID, judul, pengarang, tahun terbit, status (tersedia atau dipinjam), ISBN, dan penerbit.
4. Loop untuk Menambahkan Buku ke Perpustakaan (foreach ($dataBook as $book) { ... }): Dalam loop ini, setiap buku dari array $dataBook ditambahkan ke objek perpustakaan menggunakan metode addBook() dari kelas Library.
5. Pencarian Buku ($keyword = isset($_GET['keyword']) ? $_GET['keyword'] : ''; dan if (!empty($keyword)) { ... }): Baris pertama mengambil kata kunci pencarian dari URL jika ada. Baris kedua melakukan pencarian buku berdasarkan kata kunci jika kata kunci tidak kosong, atau menampilkan semua buku jika kata kunci kosong.
6. Form Pencarian di HTML (<form class="card card-sm">...</form>): Ini adalah bagian HTML untuk form pencarian buku berdasarkan judul atau pengarang.
7. Tabel Daftar Buku (<table class="table table-hover">...</table>): Ini adalah bagian HTML yang menampilkan daftar buku yang sesuai dengan hasil pencarian atau semua buku jika tidak ada kata kunci pencarian.
8. Tombol Aksi (<button type="submit" name="borrow" class="btn btn-outline-success">Pinjam</button> dan <button type="submit" name="return" class="btn btn-outline-success">Kembalikan</button>): Tombol ini memungkinkan pengguna untuk meminjam atau mengembalikan buku. Aksi ini diproses oleh PHP setelah pengguna mengklik tombol tersebut.
9. Script Bootstrap dan Font Awesome (<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> dan <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">): Ini adalah link untuk memuat CSS Bootstrap dan Font Awesome, yang digunakan untuk styling dan ikon pada halaman web.
Dengan kombinasi PHP untuk logika backend dan HTML untuk tampilan frontend, aplikasi ini memungkinkan pengguna untuk mencari, meminjam, dan mengembalikan buku dalam perpustakaan mini.

- perpus.php :
Penjelasan Codingan :
Kode PHP di atas mendefinisikan sebuah kelas bernama Library yang merepresentasikan sebuah perpustakaan. Berikut penjelasan dari setiap metode dan properti yang ada dalam kelas Library:

1. Properti:
a. $books: Sebuah array yang menyimpan daftar buku yang tersedia di perpustakaan.
b. $borrowedBooks: Sebuah array yang menyimpan daftar buku yang sedang dipinjam dari perpustakaan.
c. $borrowLimit: Batasan jumlah buku yang dapat dipinjam oleh satu pengguna.
d. $lateFeePerDay: Biaya keterlambatan per hari dalam peminjaman buku.
2. Metode:
a. addBook(ReferenceBook $book): Menambahkan buku baru ke dalam perpustakaan. Parameter $book harus merupakan objek dari kelas ReferenceBook.
b. searchBook($keyword): Mencari buku berdasarkan kata kunci yang diberikan dalam parameter $keyword. Metode ini mengembalikan array berisi buku-buku yang sesuai dengan kata kunci.

- buku.php :
Penjelasan Codingannya :

Kode di atas adalah contoh pembuatan sebuah class dalam bahasa pemrograman PHP yang bernama Book. Class ini memiliki beberapa properti (atau atribut) seperti $bookId, $title, $author, $year, dan $status yang digunakan untuk menyimpan informasi mengenai buku.
Selain properti, class Book juga memiliki sebuah method khusus yang disebut __construct(). Method ini adalah constructor, yang dipanggil secara otomatis ketika sebuah objek baru dari class Book dibuat. Constructor ini menerima lima parameter: $bookId, $title, $author, $year, dan $status. Ketika objek Book dibuat, nilai-nilai yang diterima dari parameter constructor akan disimpan ke dalam properti-properti yang sesuai dalam objek tersebut menggunakan syntax $this->nama_properti = nilai_parameter.
Dengan demikian, class Book ini dapat digunakan untuk membuat objek-objek buku dengan memberikan nilai-nilai yang sesuai saat objek tersebut dibuat. 

- referensi.php :
Penjelasan Codinganya :
Kode di atas merupakan contoh implementasi dari konsep inheritance dalam pemrograman berorientasi objek (OOP) menggunakan bahasa pemrograman PHP. Mari kita jelaskan setiap bagian dari kode tersebut:

1. require_once 'buku.php';: Ini adalah perintah untuk mengimpor file buku.php yang berisi definisi kelas Book yang menjadi induk dari kelas ReferenceBook.
2. class ReferenceBook extends Book: Ini adalah deklarasi kelas ReferenceBook yang merupakan turunan dari kelas Book. Dengan demikian, kelas ReferenceBook akan mewarisi semua properti dan metode dari kelas Book.
3. public $isbn; dan public $publisher;: Ini adalah deklarasi properti tambahan yang dimiliki oleh kelas ReferenceBook. Properti $isbn digunakan untuk menyimpan nomor ISBN buku, sedangkan properti $publisher digunakan untuk menyimpan penerbit buku.
4. function __construct($id, $title, $author, $year, $status, $isbn, $publisher): Ini adalah metode konstruktor kelas ReferenceBook. Metode konstruktor ini akan dieksekusi ketika objek ReferenceBook dibuat. Metode ini menerima beberapa parameter, yaitu $id, $title, $author, $year, $status, $isbn, dan  $publisher. Metode konstruktor ini juga memanggil metode konstruktor kelas induk (Book) menggunakan parent::__construct() untuk menginisialisasi properti yang diwarisi dari kelas Book dan menginisialisasi properti tambahan milik kelas ReferenceBook, yaitu $isbn dan $publisher.
Dengan demikian, kelas ReferenceBook digunakan untuk membuat objek buku referensi yang memiliki atribut tambahan seperti nomor ISBN dan penerbit, selain atribut yang diwarisi dari kelas Book seperti ID, judul, pengarang, tahun terbit, dan status.

- style.css :
Penjelasan Codingannya :
Kode CSS di atas mengatur tampilan dari sebuah halaman web dengan beberapa elemen yang berbeda. Mari kita bahas secara terperinci:

1. .hero::before: Ini adalah pseudo-element yang ditempatkan sebelum elemen dengan kelas "hero". Pseudo-element ini memiliki beberapa properti:
- content: '': Ini adalah konten pseudo-element, tetapi dalam hal ini tidak ada konten yang ditampilkan.
- position: absolute;: Pseudo-element ditempatkan secara absolut relatif terhadap elemen induknya.
- top: 0; left: 0; width: 100%; height: 50vh;: Pseudo-element ini menempati seluruh lebar dan setengah tinggi dari elemen induknya.
- background-image: url(../img/hero-bg.png);: Gambar latar belakang dari pseudo-element, diambil dari path '../img/hero-bg.png'.
- background-size: cover;: Gambar latar belakang akan menutupi seluruh area pseudo-element.
- background-position: center;: Posisi gambar latar belakang diatur menjadi tengah.
- background-repeat: no-repeat;: Gambar latar belakang tidak diulang.
- color: #1fb2e2;: Warna teks pada pseudo-element ini.
- z-index: -1;: Pseudo-element ini ditempatkan di bawah elemen lainnya.
2. .hero::after: Ini adalah pseudo-element yang ditempatkan setelah elemen dengan kelas "hero". Propertinya mirip dengan .hero::before dengan perbedaan sebagai berikut:
- background-color: rgba(0, 0, 0, 0.5);: Warna latar belakangnya adalah hitam dengan opacity sebesar 50%.
- width: 100vw;: Pseudo-element ini menempati seluruh lebar viewport.
3. .hero: Ini adalah kelas untuk elemen utama yang memiliki beberapa properti:
- color: #2b90c2;: Warna teks pada elemen utama.
- height: 50vh;: Tinggi elemen utama setengah dari viewport.
- text-align: center;: Teks diatur menjadi rata tengah.
4. .hero h1: Selector ini memilih elemen <h1> yang berada di dalam elemen dengan kelas "hero". Propertinya adalah:
- text-transform: uppercase;: Teks diubah menjadi huruf kapital.
- letter-spacing: 1.5px;: Jarak antar huruf ditambahkan sebesar 1.5 piksel.
5. Selain itu, ada beberapa aturan CSS untuk elemen body dan kelas .form-control-borderless yang mengatur latar belakang, serta tampilan input form saat dihover atau di-focus.
Kode CSS tersebut digunakan untuk mengatur tampilan halaman web dengan mengatur latar belakang, warna teks, dan tata letak elemen tertentu.






