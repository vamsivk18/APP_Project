<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/nav_styles.css">
    <title>View Quotes</title>
</head>
<body>
    <?php include 'includes.php';R::ss();R::checkLogin();R::nav();
        $quotesObj = QuotesContr::getInstance();
        $quotes = $quotesObj->getSpecificQuotes();
    ?>
    <div class="mainbody">
    <h1 class="body-center">List of Quotes by <?php echo "$quotes[0]"?></h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Quote</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($quotes[1] as $row){
                    echo "
                    <tr>
                        <td>" . $row["quote"] . "</td>
                        <!-- <td>
                            <a class='btn btn-primary btn-sm' href='update'>Update</a>
                            <a class='btn btn-danger btn-sm' href='delete'>Delete</a>
                        </td> -->
                    </tr>";
                }
            ?>
        </tbody>
    </table>

    </div>
</body>
</html>