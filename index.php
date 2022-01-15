<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Home</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="../javaScript/script.js"></script>
  <style>
    * {
      box-sizing: border-box;
    }

    #myInput {
      background-image: url('img/searchicon.png');
      background-size: contain;
      background-repeat: no-repeat;
      width: 50%;
      font-size: 16px;
      padding: 12px 20px 12px 50px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
      border-color: #e26d5c;
    }

    #myUL {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    #myUL li a {
      border: 1px solid #ddd;
      margin-top: -1px;
      /* Prevent double borders */
      background-color: #f6f6f6;
      padding: 12px;
      text-decoration: none;
      font-size: 18px;
      color: black;
      display: block;
    }

    #myUL li a:hover:not(.header) {
      background-color: #eee;
    }
  </style>
  <?php require("php/init.php");
    $servername = getenv("DB_URL");
    $username = getenv("DB_USER");
    $password = getenv("DB_PASSWORD");
    $connection = createConnection($servername, $username, $password);

    initializeDatabase($connection);
  ?>
</head>

<body onload="hideListItems()">
  <script>
    addNavBar()
  </script>
  <div class="content" style="text-align: center">
    <h3 style="color: red"><script>greet()</script></h3>
    <h1>Welcome to our website!</h1>
    <p>You can search our products and services below:</p>
    <h2>Our Products and Services</h2>
    <input type="text" id="myInput" onkeyup="myFunction()" oninput="displayListItems()" placeholder="Search for names.." title="Type in a name">

    <?php
      class Item {
        public $itemNumber;
        public $name;
        public $type;
        public $model;
        public $brand;
        public $description;
      }
        $headers = getHeaders();

        $rowLength = getRowLength();

        printValuesFromItemsTable($connection, $headers, $rowLength);
    ?>
  </div>
  <script>
    function hideListItems() {
      var list = document.getElementById('itemList');
      list.style.visibility = 'hidden';
    }

    function displayListItems() {
      var list = document.getElementById('itemList');
      list.style.visibility = 'visible';
    }

    function myFunction() {
      var input, filter, itemList, row, data, txtValue, matchExists;

      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      itemList = document.getElementById("itemList");
      rows = itemList.getElementsByTagName("tr");
      matchExists = false;

      if (filter) {
        for (var i = 1; i < rows.length; i++) {
          var row = rows[i].getElementsByTagName("td");

          for (var j = 0; j < row.length; j++) {
            data = row[j];
            txtValue = data.textContent || data.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              rows[i].style.display = "";
              matchExists = true;
              break;
            } else {
              rows[i].style.display = "none";
            }
          }
        }
        if (matchExists == false) {
          hideListItems();
        }
      } else {
        hideListItems();
      }
    }
  </script>
  <footer>
    <?php closeConnection($connection) ?>
  </footer>
</body>

</html>
