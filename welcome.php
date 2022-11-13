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
    <?php include 'includes.php';R::ss();R::checkLogin();R::quoteStatusAlert();R::nav();?>
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
                $quotesObj = new QuotesContr();
                $quotes = $quotesObj->getAllQuotesUsername('-');
                foreach($quotes as $row){
                    echo "<tr>
                            <td>" . $row["quote"] . "</td>
                            <td class='col-sm-2'>" . $row["author"] . "</td>
                            <td class='col-sm-2'><div class='dropdown'>
                            <button class='dropbtn'>Action</button>
                            <div class='dropdown-content'>"
                            .($row["username"]==$_SESSION["username"] ?
                              '<a href="updatequote.php?updateid='.$row["id"].'">Update</a>
                              <a onclick="return confirm(\'Are you sure to Delete?\');" href="./includes/quotes.inc.php?deleteid='.$row["id"].'" class="delete">Delete</a>'
                            :
                            '<a href="profile.php?viewid='.$row['id'].'">View Profile</a>'
                            ).
                            "</div>
                          </div></td>
                            </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body></html>