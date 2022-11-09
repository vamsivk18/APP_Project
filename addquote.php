<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>ADD QUOTE</title>
</head>
<body style="margin: 50px;">
<?php
session_start();
?>
    <div>
        <h2>ADD A QUOTE</h2>
        <p>Please fill in the quote.</p>
        <form action="includes/quotes.inc.php" method="post">
                <textarea name="quote" id="" cols="100" rows="5" placeholder="Enter your Quote"></textarea><br>
            <button class='btn btn-primary btn-sm' type="submit" name="submit">Submit Quote</button>
        </form>
    </div>
</body>
</html>