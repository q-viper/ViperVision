<?php
echo"<h1>Dear Admin Do You Really Want To Delete This User?</br>";
echo"<a href='manageusers.php'><button>Cancel</button></a>"."            "."<a href=deleteuser.php?id=".$_GET['id']."><button>Yes Sure</button></a>";



?>