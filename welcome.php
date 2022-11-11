<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/nav_styles.css">
    <title>Welcome</title>
</head>
<body>
    <?php include './reuse/Reuse.class.php';R::ss();R::checkLogin();R::quoteStatusAlert();R::nav();?>
    <div class="mainbody">
        <h1 class="body-center">List of Quotes</h1><br>
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
                              '<a href="updatequote.php?updateid='.$row["id"].'">Update</a>
                              <a onclick="return confirm(\'sure to delete !\');" href="./includes/quotes.inc.php?deleteid='.$row["id"].'" class="delete">Delete</a>'
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
    </div>
    <script>
        function searchQuotes(){
        let val = prompt("Please enter the Author name");
        if(!val) return false;
        let loc = "search.php?searchkey="+val;
        top.location.href = loc;
        }
    </script>
</body></html>