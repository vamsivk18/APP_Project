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
        $quotesObj = new QuotesContr();
        if(isset($_GET["un"])) $username = $_GET["un"];
        else $username = $_SESSION["username"];
        $quotes = $quotesObj->getAllQuotesUsername($username);
        $name = $quotesObj->getNamebyUsername($username);
    ?>
    <div class="mainbody">
        <h2 class="body-center">List of Quotes by <?php echo "$name"?></h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Quote</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($quotes as $row){
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
</body></html>