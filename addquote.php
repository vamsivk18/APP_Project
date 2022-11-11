<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/nav_styles.css">
    <title>ADD QUOTE</title>
</head>
<body>
<?php include 'includes.php';R::ss();R::nav();?>
    <div class="mainbody">
        <h2>ADD A QUOTE</h2>
        <p>Please enter your quote.</p>
        <form action="includes/quotes.inc.php" method="post">
                <textarea class="quotetextarea" name="quote" id="" cols="100" rows="5" placeholder="Quote goes here..."></textarea><br>
            <div style="width: 25%;"><button class='btn btn-primary btn-sm' type="submit" name="addquote">Submit Quote</button></div>
        </form>
    </div>
</body>
</html>