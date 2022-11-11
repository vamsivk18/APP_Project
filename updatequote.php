<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/nav_styles.css">
    <title>ADD QUOTE</title>
</head>
<body>
<?php
include 'includes.php';R::ss();R::checkLogin();R::nav();
$quoteContr = QuotesContr::getInstance();
$row = $quoteContr->getQuote($_GET["updateid"]);
?>
    <div class="mainbody">
        <h2>UPDATE QUOTE</h2>
        <form action="includes/quotes.inc.php?updateid=<?php print($row["id"])?>" method="post">
                <textarea name="updatequote" id="" cols="100" rows="5"><?php print($row["quote"])?></textarea><br>
            <button class='btn btn-primary btn-sm' type="submit" name="updatequotebutton">Update Quote</button>
        </form>
    </div>
</body>
</html>