<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/nav_styles.css">
    <link rel="stylesheet" href="./styles/styles.css">
    <title>Search</title>
</head>
<body>
    <?php include './reuse/Reuse.class.php';R::ss(); R::checkLogin(); R::nav();?>
    <div class="mainbody">
        <form action="./includes/search.inc.php" method="POST">
            <div class="searchfield">
                <label>Search for </label>
                <select name="searchoption" class="searchselect">
                    <option value="quote" class="selectoption">Quotes</option>
                    <option value="author" class="selectoption">Author</option>
                </select>
                <label>containing</label>
                <input type="text" name="searchkey" placeholder="Enter your search input" class="searchbox">
                <input type="submit" name="search" value="Search" class="buttonsubmit">
            </div>
        </form>

        <h1>List of Quotes</h1><br>
        
                <?php 
                include "./classes/dbh.classes.php";
                include "./classes/search.classes.php";
                include "./classes/search-contr.classes.php";
                if(!isset($_SESSION["searchoption"]) || !isset($_SESSION["searchkey"])) $quotes = array();
                else{
                    $quotesContr = SearchContr::getInstance($_SESSION["searchoption"],$_SESSION["searchkey"]);
                    $quotes = $quotesContr->getsearchquotes();
                }
                $val = sizeof($quotes);
                if($val==0){
                    print("<h2>No Quotes to Show</h2>");
                }else{
                    echo "<table class='table'>
                    <thead>
                        <tr>
                            <th>Quote</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>";
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
                    echo "</tbody>
                    </table>";
                }
                
                ?>
    </div>
    
</body>
</html>