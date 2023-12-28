<html>
    <style>
        body
        {
            background-color: #B4CDE6;
        }
        #i
        {
            padding:10px;
            width:350px;
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
            font-size: 20px;
        }
        .div3
        {
            background-color: white; 
            border-radius: 0px 0px 10px 10px;  
            font-size:20px; 
            padding:7px;
        }
        #content1
        {
            margin: 20px 0px 0px 0px;
        }
        #s2
        {
            padding: 15px 25px 15px 25px;
            background-color: #646464;
            color:white;
            border:1px solid white;
            border-radius:3px;
        }
        .div4
        {
            background-color: rgb(231,231,231);
            width:468px;
            padding:15px 0px 15px 15px;
            display: inline-block;
            margin:4px;
            font-size: 18px;
            position: relative;
            border:1px solid gray;
            border-radius:5px;
        }
        #s3
        {
            margin-left:1000px;
            background-color: lightgrey;
        }
        .abc
        {
            display:inline-block;
            padding-right:50px;
        }
        .div6
        {
            height:2px;
            background-color:lightgray;
        }
        .div7
        {
            font-size: 17px;
	        font-family: serif;
            border:solid 1px lightgray;
            width:fit-content;
            padding:30px 100px 30px 100px;
        }
        #b
        {
            width:200px;
            height:40px;
            background-color: #182747;
            border-radius:5px;
            color:white;
        }
    </style>
    <script>
        function vendor_view_product()
        {
            window.location="vendor_view_product.php";
        }
        function logout()
        {
            window.location="vendor_login.php";
        }
    </script>
    <body>
        <div class="div1">
            <input type="button" id="s1" onclick="history.back()" value="VIEW PRODUCT">
            <input type="button" id="s1" value="YOUR CART">
            <input type="button" id="s3" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2" id="content1">
            <center>YOUR CART</center>
        </div>
        <div class="div3" id="content2">
        <?php
            include_once '../Acmegrade project/config.php';
            $phoneno=$_GET['phoneno'];
            $sql="select * from orders where phoneno='$phoneno'";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            $total_amount=0;
            if($total!=0)
            {
                while($orders=mysqli_fetch_assoc($data))
                {
                    $product_id=$orders['product_id'];
                    $sql1="select * from products where product_id='$product_id'";
                    $data1=mysqli_query($conn,$sql1);
                    $total1=mysqli_num_rows($data1);
                    if($total1!=0)
                    {
                        while($products=mysqli_fetch_assoc($data1))
                        {
                            echo "<div class='div4'>
                            <div class='abc'><img src='".$products['photo']."' width='150px'></div>
                            <div class='abc'>
                            Product Name: ".$products['product_name']."<br>
                            Price: ".$products['product_price']."/-<br><br><br>
                            <form action='' method='post'>
                                <button id='b' name='delete_product' value=".$orders['itemno'].">DELETE FROM CART</button>
                                </div>
                            </div>
                            </form>";
                            $total_amount=$total_amount+$products['product_price'];
                            $product_name=$products['product_name'];
                            $product_price=$products['product_price'];
                            if(isset($_POST['place_order']))
                            {
                                $house_no=$_POST['house_no'];
                                $street_name=$_POST['street_name'];   
                                $landmark = $_POST['landmark'];
                                $pincode=$_POST['pincode'];
                                $city=$_POST['city'];
                                $state=$_POST['state'];
                                $country=$_POST['country'];
                                $payment=$_POST['payment'];
                                if($house_no=="" || $street_name=="" || $landmark=="" || $pincode=="" || $city=="" || $state=="" || $country=="" || $payment=="")
                                {
                                    echo '<script>alert("Please enter all the details")</script>';
                                }           
                                else
                                {
                                    $sql="insert into confirm_order(phoneno,product_id,product_name,product_price,house_no,street_name,landmark,pincode,city,state,country,payment)values('$phoneno','$product_id','$product_name','$product_price','$house_no','$street_name','$landmark','$pincode','$city','$state','$country','$payment')";
                                    if($conn->query($sql)==true)
                                    {
                                        echo '<script>alert("Order confirmed")</script>';
                                        $sql3="delete from orders where phoneno=$phoneno";
                                        if($conn->query($sql3)==true)
                                        {

                                        }
                                    }
                                    else
                                    {
                                        echo '<script>alert("Unable to place order")</script>';
                                    }
                                }
                            }
                        }
                    }
                }
                
                }
                    if(isset($_POST['delete_product']))
                    {
                        $delete_product=$_POST['delete_product'];
                        
                        $sql2="delete from orders where phoneno='$phoneno' and itemno='$delete_product'";
                        if($conn->query($sql2)==true)
                        {
                            echo '<script>alert("Product deleted successful")</script>';
                        }
                        else
                        {
                            echo '<script>alert("Product not deleted")</script>';
                        }
                    }
            ?>
        
        <?php
            echo "<div class='div6'></div><br><center><div class='div7'><center>Total Amount : ₹".$total_amount;
            ?>
            <br><br><form action='' method='post'>
                <input id="i" placeholder="House No./Apartment Name - Flat No." name="house_no"><br><br>
                <input id="i" placeholder="Street Name" name="street_name"><br><br>
                <input id="i" placeholder="Landmark" name="landmark"><br><br>
                <input id="i" placeholder="Pincode" name="pincode"><br><br>

                <input id="i" placeholder="City" name="city"><br><br>
                <input id="i" placeholder="State" name="state"><br><br>
                <input id="i" placeholder="Country" name="country"><br><br>

                <input id="r" type="radio" name="payment" value="Google pay">Google pay
                <input id="r" type="radio" name="payment" value="Net Banking">Net Banking
                <input id="r" type="radio" name="payment" value="Cash on delivery">Cash on delivery<br><br><br>
                <button id="s2" name="place_order">Place Order</button></center>
                </div></center>
            </form>
    </body>
</html>