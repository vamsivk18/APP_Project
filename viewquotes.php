<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>View Quotes</title>
</head>
<body style="margin: 50px;">
    <?php 
        session_start(); 
        include "./classes/dbh.classes.php";
        include "./classes/quotes.classes.php";
        include "./classes/quotes-contr.classes.php";
        $quotesObj = new QuotesContr();
        $quotes = $quotesObj->getSpecificQuotes();
    ?>
    <!-- <a class='btn btn-primary btn-sm' href='addquote.php'>Add Quote</a>
    <a class='btn btn-primary btn-sm' href='viewquote.php'>View My Quotes</a>
    <a class='btn btn-danger btn-sm' href='logout.php'>Logout</a> -->
    <h1 class="body-center">List of Quotes by <?php echo "$quotes[0]"?></h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Quote</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($quotes[1] as $row){
                    echo "
                    <tr>
                        <td>" . $row["quote"] . "</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='update'>Update</a>
                            <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                        </td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>