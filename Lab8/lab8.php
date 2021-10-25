<!DOCTYPE html>
<html>

<head>
<!DOCTYPE html>
<html>
<body>

<h2>Lab 8 - Book Order</h2>

<form action="ordersummary.php" method="post">
  <p>
  <h4>Book 1</h4>
  Title<br>
  <input type="text" id="book1title" name="book1title" value="HTML and CSS: Design and Build Websites"><br><br>
  Author<br>
  <input type="text" id="book1author" name="book1author" value="Jon Duckett"><br><br>
  Price<br>
  <input type="text" id="book1price" name="book1price" value="14.69"><br><br>
  </p>
  <p>
  <h4>Book 2</h4>
  Title<br>
  <input type="text" id="book2title" name="book2title" value="Eloquent JavaScript"><br><br>
  Author<br>
  <input type="text" id="book2author" name="book2author" value="Marijn Haverbeke"><br><br>
  Price<br>
  <input type="text" id="book2price" name="book2price" value="23.99"><br><br>
  </p>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
<?php
// tax amount is 7%
define("TAX", 0.07);

// 1. Add 3 properties to the Book class: $title, $author, and $price.
class Book {
// define properties
public $title;
public $author;
public $price;

// 2. Fill-in the following constructor method, so that it assigns values to the properties $title, $author, and $price
function __construct($title, $author, $price) {
// assign values to passed-in values
$this->title = $title;
$this->author = $author;
$this->price = $price;
}

// 3. Create a method called display(), which outputs a line for the current book with title, author, and price
// Method named "display"
function display() {
// print a line for present book object with its associated values
echo "Title: $this->title, <br> Author: $this->author,<br> Price: $this->price <br><br>";
}
}

// 4. Create a function called get_tax() that calculates the tax using the constant TAX defined above. Return the price * tax amount.
function get_tax($price) {
// return price * tax amt
return $price * TAX;
}

$book1 = new Book($_POST['book1title'], $_POST['book1author'], $_POST['book1price']);
$book1->display();

// 5. Create a second object called book2. Use the values posted from index.php to assign values to the properties of the book object. Display it.
$book2 = new Book($_POST['book2title'], $_POST['book2author'], $_POST['book2price']);
$book2->display();


// 6.
// Calculate cost for both books before tax, tax amount for both books, cost of books after tax by accessing the values on book1 and book2 objects
$total_cost_before_tax = $book1->price + $book2->price;
$tax = get_tax($total_cost_before_tax);
$cost_with_tax = $total_cost_before_tax + $tax;

// Display total cost before tax (both books), tax cost, and total cost with tax.
echo "Total cost before tax (both books): $total_cost_before_tax <br> Tax amount for both books: $tax <br> Total cost for both books after tax: $cost_with_tax <br>";

?>
</head>
<body>
</body>
</html>