<html>
    <style>
        body
        {
            background-color: #B4CDE6;
        }
        #i
        {
            padding:10px;
            width:270px;
        }
        #s1
        {
            color:white;
            background-color: transparent;
            border:1px solid white;
            padding: 12px 22px 12px 22px;
            border-radius:3px;
        }
        #s2
        {
            padding: 15px 25px 15px 25px;
            background-color: #646464;
            color:white;
            border:1px solid white;
            border-radius:3px;
        }
        .div1
        {
            display:inline-block;
            background-color:#182747;
            padding: 110px 100px 130px 530px;
            position: relative;
            border-radius: 10px;
            margin: 120px 500px 0px 400px;
        } 
        .div2
        {
            display:inline-block;
            background-color: white;
            padding: 150px 55px 177px 55px;
            position: relative;
            border-radius: 10px;
            margin: -463px 0px 0px 460px;
        }
        .back
        {
            background-color:#B4CDE6;
            padding: 15px 25px 15px 25px;
            border:1px solid white;
            border-radius:3px;
        }
        .back:hover
        {
            background-color:#182747;
            color:white;
        }
    </style>
    <script>
        function vendor_signup()
        {
            window.location="vendor_signup.php";
        }
        function back()
        {
            window.location="index.html";
        }
    </script>
    <body>
    <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['login']))
            {
                $password=$_POST['password'];
                $phoneno=$_POST['phoneno'];
                $phoneno_pattern='/^[0-9]{10}+$/';
                preg_match($phoneno_pattern, $phoneno, $phoneno_matches);
                
                if(!$phoneno_matches)
                {
                    echo '<script>alert("Please enter valid phone number")</script>';
                }  
                else
                {
                    $sql="select * from signup where phoneno='$phoneno' and password='$password'";
                    $data=mysqli_query($conn,$sql);
                    $total=mysqli_num_rows($data);
                    if($total!=0)
                    {
                        echo "<script>window.location='vendor_view_product.php? phoneno=$phoneno'</script>";
                    }
                    else
                    {
                        echo '<script>alert("Details not available. Please register")</script>';
                    }
                }
            }
        ?>
        <button class="back" onclick="back()">BACK</button>
        <form action='vendor_login.php' method='post'>
            <div class="div1">
                <p style="color:white;font-size: 20px;">Don't have an account?</p><br>
                <input type="button" id="s1" onclick="vendor_signup()" value="Sign up">
            </div>
            <div class="div2">
                <input id="i" placeholder="Phone No." name="phoneno" required><br><br>
                <input id="i" type="password" placeholder="Password" name="password" required><br><br><br><br>
                <center><button id="s2" name="login">Log in</button></center>
            </div>
        </form>
    </body>
</html>