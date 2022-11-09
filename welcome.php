<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Welcome</title>
</head>
<body style="margin: 50px;">
    <?php 
        session_start();
        if(isset($_SESSION["username"])){
    ?>
    <h1>Welcome 
        <?php 
            print($_SESSION["username"]);
        ?>
    </h1>
    <?php 
        } 
    ?>
    <a class='btn btn-primary btn-sm' href='addquote.php'>Add Quote</a>
    <a class='btn btn-primary btn-sm' href='viewquotes.php'>View My Quotes</a>
    <a class='btn btn-danger btn-sm' href='logout.php'>Logout</a>
    <h1 class="body-center">List of Quotes</h1>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Quote</th>
                <th>Author</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include "./classes/dbh.classes.php";
                include "./classes/quotes.classes.php";
                include "./classes/quotes-contr.classes.php";
                $quotesObj = QuotesContr::getInstance();
                $quotes = $quotesObj->getQuotes();
                foreach($quotes as $row){
                    echo "<tr>
                            <td>" . $row["quote"] . "</td>
                            <td class='col-sm-2'>" . $row["author"] . "</td>
                            <td class='col-sm-2'><div class='dropdown'>
                            <button class='dropbtn'>Action</button>
                            <div class='dropdown-content'>"
                            .($row["username"]==$_SESSION["username"] ?
                              "<a href='#'>Update</a>
                              <a href='delete.php?id=".$row['id']."' class='delete'>Delete</a>"
                            :
                            "<a href='#'>Modify</a>"
                            ).
                            "</div>
                          </div></td>
                            </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>