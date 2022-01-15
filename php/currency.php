<!DOCTYPE html>

<html lang="en">

<head>
    <title>Currency Converter</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../javaScript/script.js"></script>
</head>
<body>
<script>
    addNavBar()
</script>
  <div class="content">
    <div id="top">
      <h1>Welcome to Our Currency Converter</h1>
    </div>
    <div id="data" class="currency-data">
      <fieldset>
      <form action="" method="post">
          <table class="centeredTable">
              <tr>
                  <td>
                      <label for="currency_amount">Amount: </label>
                  </td>
                  <td>
                      <input type="text" name="currency_amount" required aria-required="true">
                  </td>
              </tr>
              <tr>
                  <td>
                      <label for="convert_from">Convert From: </label>
                  </td>
                  <td name="convert_from">
                      <input type="radio" name="from_currency" value="CAD" required aria-required="true">
                          <label for="CAD"><?php echo selectFlag("CAD") ?>CAD</label>
                      <input type="radio" name="from_currency" value="USD" required aria-required="true">
                          <label for="USD"><?php echo selectFlag("USD") ?>USD</label>
                      <input type="radio" name="from_currency" value="EUR" required aria-required="true">
                          <label for="EUR"><?php echo selectFlag("EUR") ?>EUR</label>
                      <input type="radio" name="from_currency" value="GBP" required aria-required="true">
                          <label for="GBP"><?php echo selectFlag("GBP") ?>GBP</label>
                      <input type="radio" name="from_currency" value="CNY" required aria-required="true">
                          <label for="CNY"><?php echo selectFlag("CNY") ?>CNY</label>
                  </td>
              </tr>
              <tr>
                  <td>
                      <label for="convert_to">Convert To: </label>
                  </td>
                  <td name="convert_to">
                      <input type="radio" name="to_currency" value="CAD" required aria-required="true">
                          <label for="CAD"><?php echo selectFlag("CAD") ?>CAD</label>
                      <input type="radio" name="to_currency"value="USD" required aria-required="true">
                          <label for="USD"><?php echo selectFlag("USD") ?>USD</label>
                      <input type="radio" name="to_currency"value="EUR" required aria-required="true">
                          <label for="EUR"><?php echo selectFlag("EUR") ?>EUR</label>
                      <input type="radio" name="to_currency" value="GBP" required aria-required="true">
                          <label for="GBP"><?php echo selectFlag("GBP") ?>GBP</label>
                      <input type="radio" name="to_currency" value="CNY" required aria-required="true">
                          <label for="CNY"><?php echo selectFlag("CNY") ?>CNY</label>
                  </td>
              </tr>
              <tr>
                  <td colspan="2">
                      <input type="submit" class="button" value="Convert" name="convertSubmit">
                  </td>
              </tr>
          </table>
      </form>
      </fieldset>
    </div>
  </div>

    <?php
    if (isset($_POST["convertSubmit"])) {
        $amount = $_POST["currency_amount"];
        $from_currency = $_POST["from_currency"];
        $to_currency = $_POST["to_currency"];

        $exchangeRate = getExchangeRate($amount, $from_currency, $to_currency);
        $from_flag = selectFlag($from_currency);
        $to_flag = selectFlag($to_currency);
        try {
            echo "<div class='content' style='text-align: center'>
                    <p>$from_flag $from_currency $amount = $to_flag $to_currency " . ($amount * $exchangeRate) . "</p>
                  </div>";
        } catch (TypeError $e) {
            echo "<b>Warning: you must enter a number to perform a conversion<b>";
        }
    }

    function getExchangeRate(&$amount, $from_currency, $to_currency) {
        $exchangeRate = 0;

        if ($from_currency == $to_currency) {
          $exchangeRate = 1;
        } elseif ($from_currency == "CAD") {
            switch ($to_currency) {
            case "USD":
                $exchangeRate = 0.79;
                break;
            case "EUR":
                $exchangeRate = 0.69;
                break;
            case "GBP":
                $exchangeRate = 0.59;
                break;
            case "CNY":
                $exchangeRate = 5.08;
                break;
            }
        } elseif ($from_currency == "USD") {
            switch ($to_currency) {
                case "CAD":
                    $exchangeRate = 1.25;
                    break;
                case "EUR":
                    $exchangeRate = 0.87;
                    break;
                case "GBP":
                    $exchangeRate = 0.74;
                    break;
                case "CNY":
                    $exchangeRate = 6.38;
                    break;
            }
        } elseif ($from_currency == "EUR") {
            switch ($to_currency) {
                case "CAD":
                    $exchangeRate = 1.43;
                    break;
                case "USD":
                    $exchangeRate = 1.14;
                    break;
                case "GBP":
                    $exchangeRate = 0.85;
                    break;
                case "CNY":
                    $exchangeRate = 7.31;
                    break;
            }
        } elseif ($from_currency == "GBP") {
            switch ($to_currency) {
                case "CAD":
                    $exchangeRate = 1.68;
                    break;
                case "USD":
                    $exchangeRate = 1.34;
                    break;
                case "EUR":
                    $exchangeRate = 1.17;
                    break;
                case "CNY":
                    $exchangeRate = 8.57;
                    break;
            }
        } elseif ($from_currency == "CNY") {
            switch ($to_currency) {
                case "CAD":
                    $exchangeRate = 0.19;
                    break;
                case "USD":
                    $exchangeRate = 0.15;
                    break;
                case "EUR":
                    $exchangeRate = 0.13;
                    break;
                case "GBP":
                    $exchangeRate = 0.11;
                    break;
            }
        }

        return $exchangeRate;
    }

    function selectFlag($currency) {
        $flag = "#";
        if ($currency == "CAD") {
            $flag = "<img id='CAD_image' src='../img/ca-flag.jpg' alt='Canadian Flag' style='width: 2%'>";
        } else if ($currency == "USD") {
            $flag = "<img id='USD_image' src='../img/us-flag.jpg' alt='American Flag' style='width: 2%'>";
        } else if ($currency == "EUR") {
            $flag = "<img id='EUR_image' src='../img/germany-flag.jpg' alt='German Flag' style='width: 2%'>";
        } else if ($currency == "GBP") {
            $flag = "<img id='GBP_image' src='../img/uk-flag.png' alt='Great Britain Flag' style='width: 2%'>";
        } else if ($currency == "CNY") {
            $flag = "<img id='CNY_image' src='../img/china-flag.jpg' alt='Chinese Flag' style='width: 2%'>";
        }

        return $flag;
    }
    ?>

</body>
</html>
