<html>
    <style>
        body
        {
            background-color: #B4CDE6;
        }
        #i
        {
            padding:10px;
            width:300px;
        }
        #s1,#s3
        {
            padding: 12px 22px 12px 22px;
            background-color: transparent;
            color:black;
            border:1px solid white;
            font-size: 17px;
	        font-family: serif;
            border-radius :5px;
        }
        #s1:hover
        {
            background-color:#182747;
            color: white;
        }
        .div1
        {
            background-color: white;
            padding: 20px;
        }
        .div2
        {
            background-color: #182747;
            color: white;
            padding: 20px 30px 20px 30px;
            border-radius: 10px 10px 0px 0px;
            margin: 50px 560px 0px 560px;
            align: center;
            font-size: 20px;
        }
        .div3
        {
            background-color: white;
            padding: 60px 30px 60px 50px;    
            border-radius: 0px 0px 10px 10px; 
            margin: 0px 560px 0px 560px;     
        }
        #s2
        {
            padding: 15px 25px 15px 25px;
            background-color: #646464;
            color:white;
            border:1px solid white;
            border-radius:3px;
        }
        #s3
        {
            margin-left: 780px;
            background-color: lightgrey;
        }
    </style>
    <script>
        function view_product()
        {
            window.location="view_product.php";
        }
        function view_orders()
        {
            window.location="view_orders.php";
        }
        function logout()
        {
            window.location="admin_login.php";
        }
    </script>
    <body>
        <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['upload_product']))
            {
                $product_name=$_POST['product_name'];
                $product_price=$_POST['product_price'];
                $description=$_POST['description'];
                $photo=$_POST['photo'];
                if($product_name=="" || $product_price=="" || $description=="" || $photo=="")
                {
                    echo "<script>alert('Please fill all the details')</script>";
                }
                else
                {
                    $sql="insert into products(product_name,product_price,description,photo)values('$product_name','$product_price','$description','$photo')";
                    if($conn->query($sql)==true)
                    {
                        echo '<script>alert("Product added successful")</script>';
                    }
                    else
                    {
                        echo '<script>alert("Product not added")</script>';
                    }
                }
            }
        ?>
        <div class="div1">
            <input type="button" id="s1" name="login" value="UPLOAD PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_product()" value="VIEW PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_orders()" value="VIEW ORDERS">
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2">
            <center>UPLOAD PRODUCT</center>
        </div>
        <form action='upload_product.php' method='post'>
            <div class="div3">
                <input id="i" placeholder="Product name" name="product_name"><br><br>
                <input id="i" placeholder="Price" name="product_price"><br><br>
                <Textarea id="i" placeholder="Description" name="description"></Textarea><br><br>
                <input type="file" accept=".jpg" id="i" name="photo"><br><br><br>
                <center><button id="s2" name="upload_product">Upload Product</button></center>
            </div>
        </form>
    </body>
</html>