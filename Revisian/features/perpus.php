<?php

require_once './model/referensi.php';
class Library
{
  public $books = [];
  public $borrowedBooks = [];
  public $borrowLimit = 3;
  public $lateFeePerDay = 0.5;

  public function addBook(ReferenceBook $book)
  {
    $this->books[] = $book;
  }

  public function searchBook($keyword)
  {
    $result = [];
    foreach ($this->books as $book) {
      if (stripos($book->title, $keyword) !== false || stripos($book->author, $keyword) !== false) {
        $result[] = $book;
      }
    }
    return $result;
  }

  public function sortBooksByYear()
  {
    usort($this->books, function ($a, $b) {
      return $a->year <=> $b->year;
    });
  }

  public function borrowBook($bookId)
  {
    $book = $this->findBookById($bookId);
    if ($book) {
      if (count($this->borrowedBooks) >= $this->borrowLimit) {
        return "Penuh";
      }
      if ($book->status == 1) {
        $book->status = 0;
        $this->borrowedBooks[$bookId] = $book;
        return "Sukses Dipinjam";
      } else {
        return "Buku Tidak Tersedia";
      }
    }
    return "Buku Tidak DiTemukan";
  }

  public function returnBook($bookId, $daysLate)
  {
    $book = $this->findBookById($bookId);
    if ($book) {
      if ($this->isBookBorrowed($bookId)) {
        $book->status = 1;
        unset($this->borrowedBooks[$bookId]);
        $lateFee = $daysLate * $this->lateFeePerDay;
        return $lateFee;
      } else {
        return "Buku Tidak Dipinjam";
      }
    }
    return "Buku Tidak Ditemukan";
  }

  private function findBookById($bookId)
  {
    foreach ($this->books as $book) {
      if ($book->bookId == $bookId) {
        return $book;
      }
    }
    return false;
  }

  private function isBookBorrowed($bookId)
  {
    return isset($this->borrowedBooks[$bookId]);
  }
}
