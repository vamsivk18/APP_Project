<?php
class R{
    public static function ss(){
        session_start();
    }
    public static function nav(){
        print('<div><nav>
        <h2 class = "logo">Quotes</h2>
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="addquote.php">Add Quote</a></li>
            <li><a href="viewquotes.php">My Quotes</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="profile.php">Profile</a></li>
        </ul>
        <a class="logout" onclick="return confirm(\'Are you sure to Logout?\')" href="logout.php">Logout</a>
    </nav></div>');
    }
    public static function checkLogin(){
        if(!isset($_SESSION["username"])){
            session_destroy();
            header("location: ./login.php?ln=err");
            exit();
        }
    }
    public static function signupDataCheck(){
        if(isset($_SESSION["signuperror"])){
            print("<div class='login_error'>");
            $signuperror = $_SESSION["signuperror"];
            if($signuperror=="emptyinput"){
                print("<p>One or more fields is empty</p>");
            }else if($signuperror=="invalidusername"){
                print("<p>Invalid Username, please enter username with alphabets and numbers only.</p>");
            }else if($signuperror=="usernametaken"){
                print("<p>User with this username exists</p>");
            }else if($signuperror=="emailtaken"){
                print("<p>User with this email exists</p>");
            }else if($signuperror=="invalidpassword"){
                print("<p>Password is too short</p>");
            }else if($signuperror=="emailtaken"){
                print("<p>Password mismatch</p>");
            }
            print("</div>");
            unset($_SESSION["signuperror"]);
        }else print("<br>");
    }
    public static function loginDataCheck(){
        if(isset($_GET["ln"]) && $_GET["ln"]=='err'){
            print("<div  class='login_error'><p>Login or Sign Up first</p></div>");
        }
        if(isset($_SESSION["loginerror"])){
            $loginerror = $_SESSION["loginerror"];
            if($loginerror=="emptyinput"){
                print("<div  class='login_error'><p>One or more fields is Empty</p></div>");
            }else if($loginerror=="usernotfound"){
                print("<div class='login_error'><p>User doesnot exist</p></div>");
            }else if($loginerror=="passwordincorrect"){
                print("<div class='login_error'><p>Password is Incorrect</p></div>");
            }
            unset($_SESSION["loginerror"]);
        }else print("<br>");
    }
    public static function quoteStatusAlert(){
        if(isset($_SESSION["quotestatus"])){
            $alert = $_SESSION["quotestatus"];
            print("<script type='text/javascript'>
            alert('Quote ".$alert." successfully');
            </script>");
            unset($_SESSION["quotestatus"]);
        }
    }
}
?>