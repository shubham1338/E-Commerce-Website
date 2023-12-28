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
            background-color: #182747;
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
            padding: 130px 500px 130px 100px;
            position: relative;
            margin:120px 400px 0px 400px;
            border-radius: 10px;
        }
        .div2
        {
            display:inline-block;
            background-color: white;
            padding: 110px 60px 100px 60px;
            margin:-460px 200px 50px 670px;
            position: relative;
            border-radius: 10px;
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
        function vendor_login()
        {
            window.location="vendor_login.php";
        }
        function back()
        {
            window.location="index.html";
        }
    </script>
    <body>
        <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['signup']))
            {
                $fullname=$_POST['fullname'];
                $password=$_POST['password'];   

                $email = $_POST['email'];
                $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
                preg_match($email_pattern, $email, $email_matches);

                $phoneno=$_POST['phoneno'];
                $phoneno_pattern='/^[0-9]{10}+$/';
                preg_match($phoneno_pattern, $phoneno, $phoneno_matches);

                if(!$email_matches || !$phoneno_matches)
                {
                    echo '<script>alert("Please enter valid details")</script>';
                }           
                else
                {
                    $sql="insert into signup(fullname,email,phoneno,password)values('$fullname','$email','$phoneno','$password')";
                    if($conn->query($sql)==true)
                    {
                        echo '<script>alert("Registration successful")</script>';
                    }
                    else
                    {
                        echo '<script>alert("Registration unsuccessful")</script>';
                    }
                }
            }
        ?>
        <button class="back" onclick="back()">BACK</button>
        <form action='vendor_signup.php' method='post'>
            <div class="div1">
                <p style="color:white;font-size: 20px; margin-left:8px;">Have an account?</p><br>
                <input type="button" id="s1" onclick="vendor_login()" value="Log in">
            </div>
            <div class="div2">
                <input id="i" placeholder="Full Name" name="fullname" required><br><br>
                <input id="i" placeholder="Email" name="email" required><br><br>
                <input id="i" placeholder="Phone No." name="phoneno" required><br><br>
                <input id="i" type="password" placeholder="Password" name="password" required><br><br><br><br>
                <center><button id="s2" name="signup">Sign up</button></center>
            </div>
        </form>
    </body>
</html>