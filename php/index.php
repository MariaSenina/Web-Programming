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
      background-image: url('../CSS/searchicon.png');
      background-size: contain;
      /* background-position: 10px 12px; */
      background-repeat: no-repeat;
      width: 100%;
      font-size: 16px;
      padding: 12px 20px 12px 50px;
      border: 1px solid #ddd;
      margin-bottom: 12px;
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
</head>

<body onload="hideListItems()">
  <script>	
    addNavBar()	
  </script>
  <div class="content">
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
        // Use echo to print to the screen the html and table start tags
        echo "<html><body><center><table id='itemList'>\n\n";

        // Open csv file
        $inputFile = fopen("input.csv", "r");

        $counter = 0;
        // Fetching data from csv file row by row
        while (($data = fgetcsv($inputFile)) !== false) {
          echo "<tr>";
          $rowLength = sizeof($data);
          for ($i = 0; $i < $rowLength; $i++) {
            if($counter == 0) {
              echo "<th>$data[$i]</th>";
            } else {
              echo "<td>$data[$i]</td>";
            }
          }
          echo "</tr>";
          $counter ++;
        }

        // Close the file
        fclose($inputFile);

        // Use echo to print to the screen the html and table end tags
        echo "\n</table></center></body></html>";
    ?>
  </div>
  <script>
    function hideListItems() {
      var list = document.getElementById('itemList');
      list.style.display = 'none';
    }

    function displayListItems() {
      var list = document.getElementById('itemList');
      list.style.display = 'block';
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
</body>

</html>
