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
            padding: 210px 140px 200px 420px;
            position: relative;
            border-radius: 10px;
            margin: 120px 0px 0px 485px;
        } 
        .div2
        {
            display:inline-block;
            background-color: white;
            padding: 200px 50px 180px 50px;
            position: relative;
            border-radius: 10px;
            margin: -470px 100px 0px 590px;
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
        function upload_product()
        {
            $password=document.getElementById('i').value;
            if($password=="Admin@123")
            {
                window.location="upload_product.php";
            }
            else
            {
                alert("Invalid password");
            }
        }
        function back()
        {
            window.location="index.html";
        }
    </script>
    <body>
        <button class="back" onclick="back()">BACK</button>
        <form>>
        <div class="div1">
        </div>
        <div class="div2">
            <input id="i" type="password" placeholder="Password" name="password" required><br><br><br><br>
            <center><input type="button" id="s2" name="login" value="Log in" onclick="upload_product()"></center>
        </div>
    </form>
    </body>
</html>