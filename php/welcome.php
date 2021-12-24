<!DOCTYPE html>

<html lang="en">

<head>
    <title>Welcome</title>
</head>
<style>
    * {
        background-color: #1663be;
    }
    h2 {
        text-align: center;
        color: #adadc9;
    }
</style>
<body>
    <h1>If you want a custom greeting message, please do the following: </h1>
 
    <fieldset>
        <ol>
            <li>In your address bar, append a '?' symbol </li>
            <li>Then write 'firstName=' with your first name next to it</li>
            <li>Then write '&' followed by 'lastName' with your last name next to it</li>
            <li>Hit ENTER and see your customized message in the greeting below</li>
        </ol>
    </fieldset>
    <h2>
        <?php
            if (isset($_GET['firstName']) || isset($_GET['lastName'])) {
                if (!empty($_GET['firstName'])) {
                    echo "Greeting: Howdy " . $_GET['firstName'] . "!!";
                } else if (!empty($_GET['lastName'])) {
                    echo "Greeting: Howdy " . $_GET['lastName'] . "!!";
                } else if (empty($_GET['firstName']) && empty($_GET['lastName'])) {
                    echo "Greeting: Howdy no names!!";
                }
            }
        ?>
    </h2>
</body>
</html>