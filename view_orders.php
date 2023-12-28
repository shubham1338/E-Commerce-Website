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
            background-color: #182747;
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
            padding: 40px 30px 30px 30px;    
            border-radius: 0px 0px 10px 10px;          
        }
        #s2
        {
            margin-left: 780px;
            background-color: lightgrey;
        }
        .div5:hover
        {
            border: 2px solid rgb(132, 90, 157);;
        }
        #b
        {
            border:none;
            background-color:transparent;
        }
        th,td
        {
            padding:10px 20px 20px 10px;
            font-size:17px;
        }
        th
        {
            background-color:lightgray;
        }
        td
        {
            background-color:#FAFAFA;
        }
    </style>
    <script>
        function upload_product()
        {
            window.location="upload_product.php";
        }
        function view_product()
        {
            window.location="view_product.php";
        }
        function logout()
        {
            window.location="admin_login.php";
        }
    </script>
    <body>
        <div class="div1">
            <input type="button" id="s1" name="login" onclick="upload_product()" value="UPLOAD PRODUCT">
            <input type="button" id="s1" name="login" onclick="view_product()" value="VIEW PRODUCT">
            <input type="button" id="s1" name="login" value="VIEW ORDERS">
            <input type="button" id="s2" onclick="logout()" value="LOGOUT">
        </div>

        <div class="div2">
            <center>ORDERS</center>
        </div>

        <div class="div3">
        <?php
            include_once '../Acmegrade project/config.php';
            $sql="select * from confirm_order";
            $data=mysqli_query($conn,$sql);
            $total=mysqli_num_rows($data);
            if($total!=0)
            {
                ?>
                <div><table>
                <tr>
                <th>Order No.</th>
                <th>Phone No.</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>House No./Apartment Name - Flat No.</th>
                <th>Street Name</th>
                <th>Landmark</th>
                <th>Pincode</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Payment Mode</th>
                </tr>
                <?php
                while($confirm_order=mysqli_fetch_assoc($data))
                {
                    echo "<tr>
                    <td>".$confirm_order['orderno']."</td>
                    <td>".$confirm_order['phoneno']."</td>
                    <td>".$confirm_order['product_id']."</td>
                    <td>".$confirm_order['product_name']."</td>
                    <td>".$confirm_order['product_price']."</td>
                    <td>".$confirm_order['house_no']."</td>
                    <td>".$confirm_order['street_name']."</td>
                    <td>".$confirm_order['landmark']."</td>
                    <td>".$confirm_order['pincode']."</td>
                    <td>".$confirm_order['city']."</td>
                    <td>".$confirm_order['state']."</td>
                    <td>".$confirm_order['country']."</td>
                    <td>".$confirm_order['payment']."</td>
                    </tr>";
                }
            }
            ?>
        </div>
    </body>
</html>