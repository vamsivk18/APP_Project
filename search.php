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
    <?php include 'includes.php';R::ss(); R::checkLogin(); R::nav();
    if(isset($_SESSION["searchkey"])) $val = $_SESSION["searchkey"];
    else $val = "";
    if(isset($_SESSION["searchoption"])) $selected = $_SESSION["searchoption"];
    ?>
    <div class="mainbody">
        <form action="./includes/search.inc.php" method="POST">
            <div class="searchfield">
                <label>Search for </label>
                <select name="searchoption" class="searchselect">
                    <option value="quote" class="selectoption" <?php if($selected=="quote") print("selected")?>>Quotes</option>
                    <option value="author" class="selectoption" <?php if($selected=="author") print("selected")?>>Author</option>
                </select>
                <label>containing</label>
                <input type="text" name="searchkey" placeholder="Enter your search input" class="searchbox" value=<?php print($val)?>>
                <input type="submit" name="search" value="Search" class="buttonsubmit">
            </div>
        </form>

        <h1>List of Quotes</h1><br>
        
                <?php 
                if(!isset($_SESSION["searchoption"]) || !isset($_SESSION["searchkey"])) $quotes = array();
                else{
                    //$quotesContr = SearchContr::getInstance($_SESSION["searchoption"],$_SESSION["searchkey"]);
                    $quotesContr = new SearchContr($_SESSION["searchoption"],$_SESSION["searchkey"]);
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
                    foreach($quotes as $quote){
                        echo "<tr>
                                <td>" . $quote->getquote() . "</td>
                                <td class='col-sm-2'>" . $quote->getauthor() . "</td>
                                <td class='col-sm-2'><div class='dropdown'>
                                <button class='dropbtn'>Action</button>
                                <div class='dropdown-content'>"
                                .($quote->getusername()==$_SESSION["username"] ?
                                  '<a href="updatequote.php?updateid='.$quote->getid().'">Update</a>
                                  <a onclick="return confirm(\'sure to delete !\');" href="./includes/quotes.inc.php?deleteid='.$quote->getid().'" class="delete">Delete</a>'
                                :
                                "<a href='profile.php?viewid=".$quote->getid()."'>View Profile</a>"
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