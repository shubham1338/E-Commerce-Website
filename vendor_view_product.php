<html>
    <style>
        body
        {
            background-color: #B4CDE6;
        }
        #s1,#s2
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
            background-color:  #182747;
            color: white;
            padding: 20px 30px 20px 30px;
            border-radius: 10px 10px 0px 0px;
            margin: 20px 0px 0px 0px;
            align: center;
            font-size: 20px;
        }
        .div3
        {
            background-color: white;
            padding: 40px 0px 30px 5px;    
        }
        #s2
        {
            margin-left:1000px;
            background-color: lightgrey;
        }
        .div4
        {
            background-color: rgb(231,231,231);
            width:245px;
            padding:20px;
            display: inline-block;
            font-size: 18px;
            position: relative;
            margin-left:8px;
            margin-bottom:10px;
            border-radius:5px;
            border:1px solid gray;
        }
        #b
        {
            width:250px;
            height:40px;
            background-color: #182747;
            border-radius:5px;
            color:white;
        }
    </style>
    <script>
        function logout()
        {
            window.location="vendor_login.php";
        }
    </script>
    <body>
    <form action='' method='post'>
        <div class="div1">
            <input type="button" id="s1" value="VIEW PRODUCT">
            <button id="s1" name="your_cart">YOUR CART</button>
            <input type="button" id="s2" onclick="logout()" value="LOGOUT">
        </div>
    </form>
        <div class="div2">
            <center>PRODUCTS</center>
        </div>

        <div class="div3">
        <?php
            include_once '../Acmegrade project/config.php';
            $sql="select * from products";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                while($products=mysqli_fetch_assoc($data))
                {
                    echo "<div class='div4'><img src='".$products['photo']."' width='250px'><br><br>
                    <center><b>".$products['product_name']."</b></center><br>
                    ".$products['description']."<br><br>
                    <center>".$products['product_price']."/-<br></center>
                    <form action='' method='post'>
                        <br><div class='div5'><button id='b' name='add_to_cart' value=".$products['product_id'].">ADD TO CART</button>
                        </div>
                    </div>
                </form>";
                }
            }
            $phoneno=$_GET['phoneno'];
            if(isset($_POST['add_to_cart']))
            {
                $add_to_cart=$_POST['add_to_cart'];
                
                $sql1="insert into orders(phoneno,product_id)values('$phoneno','$add_to_cart')";
                if($conn->query($sql1)==true)
                {
                    echo '<script>alert("Product added successfully")</script>';
                }
                else
                {
                    echo '<script>alert("Error")</script>';
                }
            }
            if(isset($_POST['your_cart']))
            {
                
                    echo "<script>window.location='your_cart.php? phoneno=$phoneno'</script>";
                
            }
            ?>
        </div>
    </body>
</html>