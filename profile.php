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
    <?php include 'includes.php'; R::ss();R::checkLogin();R::nav();?>
    <div class="mainbody">
        <?php
        if(isset($_GET["viewid"])){
            $quotesContr = new QuotesContr();
            $username = $quotesContr->getUserNamebyId($_GET["viewid"]);
        }else $username = $_SESSION["username"];
        $profileContr = ProfileContr::getInstance($username);
        $userprofile = $profileContr->getuser();
        $name = $userprofile->getName();
        $username = $userprofile->getUsername();
        $email = $userprofile->getEmail();
        $password = $userprofile->getPassword();
        print('
        <div class="col-lg-8">
        <div class="card">
          <div class="card-header">
            <h3>General Information</h3>
          </div>
          <div>
            <table class="table table-bordered">
              <tr>
                <th width="30%">Username</th>
                <td width="2%">:</td>
                <td>'.$username.'</td>
              </tr>
              <tr>
                <th width="30%">Name</th>
                <td width="2%">:</td>
                <td>'.$name.'</td>
              </tr>
              <tr>
                <th width="30%">E-mail Address</th>
                <td width="2%">:</td>
                <td>'.$email.'</td>
              </tr>');
              if($_SESSION["username"]==$username)
              print('
              <tr>
                <th width="30%">Password</th>
                <td width="2%">:</td>
                <td>'.$password.'</td>
              </tr>');
            print('</table>
          </div>
        </div>
        <div class="profileoptions">
        <a class="button" href="viewquotes.php?un='.$username.'">View Quotes</a>
        ');
        if($username==$_SESSION["username"]){
            print('<a class="button" href="editprofile.php?">Edit Profile</a></div>');
        }else print("</div>");
        ?>
    </div>
</body></html>