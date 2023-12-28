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
            margin-left:780px;
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
            border:1px solid gray;
            border-radius:5px;
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
        function upload_product()
        {
            window.location="upload_product.php";
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
        <div class="div1">
            <input type="button" id="s1" name="login" onclick="upload_product()" value="UPLOAD PRODUCT">
            <input type="button" id="s1" name="login" value="VIEW PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_orders()" value="VIEW ORDERS">
            <input type="button" id="s2" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2">
            <center>PRODUCTS</center>
        </div>

        <div class="div3">
        <?php
            include_once '../Acmegrade project/config.php';
            if(isset($_POST['delete_product']))
            {
                $delete=$_POST['delete_product'];
                $sql1="delete from products where product_id=$delete";
                if($conn->query($sql1)==true)
                {
                    echo '<script>alert("Product deleted successful")</script>';
                }
                else
                {
                    echo '<script>alert("Product not deleted")</script>';
                }
            }
            $sql="select * from products";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                while($products=mysqli_fetch_assoc($data))
                {
                    echo "<div class='div4'><img src='".$products['photo']."' width='250px'><br><br><center><b>"
                            .$products['product_name']."<br></b></center><br>"
                            .$products['description']."<br><br><center>"
                            .$products['product_price']."/-</center>
                            <form action='view_product.php' method='post'>
                                <br><button id='b' name='delete_product' value=".$products['product_id'].">DELETE</button>
                        </div>
                </form>";
                }
            }
            ?>
        </div>
    </body>
</html>