<?php
require_once 'features/perpus.php';

$library = new Library();

$dataBook = [
  [1, "Seni", "Ratna Ayu", 1925, 1, "12345-9990-00879-2", "Gramedia"],
  [2, "Ilmu Komputer", "Siska Pull", 1960, 1, "12345-9990-00879-2", "Gramedia"],
  [3, "17 Agustus 1945", "Pretty Zhinta", 1949, 1,"12345-9990-00879-2", "Gramedia"],
  [4, "Putri Salju", "Jane ", 1813, 1, "12345-9990-00879-2", "Gramedia"],
  [5, "Putri Ayu", "Santosos", 1951, 1, "12345-9990-00879-2","Gramedia"],

];

foreach ($dataBook as $book) {
  $library->addBook(new ReferenceBook($book[0], $book[1], $book[2], $book[3], $book[4], $book[5], $book[6]));
}

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Lakukan pencarian jika keyword tidak kosong
if (!empty($keyword)) {
  $searchResult = $library->searchBook($keyword);
} else {
  // Jika keyword kosong, tampilkan semua data buku
  $searchResult = $library->books;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['borrow'])) {
      $bookId = $_POST['book_id'];
      $message = $library->borrowBook($bookId);
      echo "<script>alert('$message');</script>";
  } elseif (isset($_POST['return'])) {
      $bookId = $_POST['book_id'];
      $lateFee = $library->returnBook($bookId, 0); // Anda dapat mengganti ID pengguna dengan ID yang sesuai
      if (is_numeric($lateFee)) {
          echo "<script>alert('Buku berhasil dikembalikan. Denda keterlambatan: $' + $lateFee);</script>";
      } else {
          echo "<script>alert('$lateFee');</script>";
      }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/style.css">
  <title>Perpustakaan Mini</title>
</head>

<body>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm">
                                <div class="card-body row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <i class="fas fa-search h4 text-body"></i>
                                    </div>
                                    <!--end of col-->
                                    <div class="col">
            <input name="keyword" type="text" class="form-control" id="Search" placeholder="Search title or author">
                                        <button class="btn btn-lg btn-success" type="submit">Cari</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
</div>

  <div class="container-fluid">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Judul</th>
          <th scope="col">Pengarang</th>
          <th scope="col">Tahun</th>
          <th scope="col">ISBN</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Status</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($searchResult as $book) { ?>
          <tr>
            <th scope="row"><?= $book->bookId ?></th>
            <td><?= $book->title ?></td>
            <td><?= $book->author ?></td>
            <td><?= $book->year ?></td>
            <td><?= $book->isbn ?></td>
            <td><?= $book->publisher ?></td>
            <td><?= $book->status ? "Tersedia" : "Dipinjam" ?></td>
            <td>
              <?php if ($book->status == 1) : ?>
                <form action="" method="POST">
                  <input type="hidden" name="book_id" value="<?= $book->bookId ?>">
                  <button type="submit" name="borrow" class="btn btn-outline-success">Pinjam</button>
                </form>
              <?php else : ?>
                <form action="" method="POST">
                  <input type="hidden" name="book_id" value="<?= $book->bookId ?>">
                  <button type="submit" name="return" class="btn btn-outline-success">Kembalikan</button>
                </form>
              <?php endif; ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>