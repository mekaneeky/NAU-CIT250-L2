<html>
<?php
   $mysqli = mysqli_connect("localhost", "admin", "admin123", "pizza-db");

   $result = mysqli_query($mysqli, "
CREATE TABLE IF NOT EXISTS pizza_orders (
    order_id INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    flavor VARCHAR(255)
    pizza_count INT,
    nau_department VARCHAR(255),
    dob DATE,
    emergency_name VARCHAR(255) NOT NULL,
    emergency_number VARCHAR(20) NOT NULL,
    pizza_overload VARCHAR(500),
    super_spicy BOOLEAN,
    PRIMARY KEY (order_id)
);");
?>
<p> <?php
    if ($_POST["vegan_gluten"]) {
        echo "We don't make hipster pizza. Please uncheck the last item in the form";
        exit();
    } else {
        echo "Thank you for ordering, order being checked. Wait for confirmation";
    }
    ?>
</p>
    

<h3>
    <?php
       $result = mysqli_query($mysqli, "
        INSERT INTO tasks(name,pizza_count,flavor,nau_department,dob,emergency_name,emergency_number,
        pizza_overload, super_spicy)
        VALUES(
        {$_POST['name']},
        {$_POST['pizza_count']},
        {$_POST['flavor']},
        {$_POST['nau_department']},
        {$_POST['dob']},
        {$_POST['emergency_name']},
        {$_POST['emergency_number']},
        {$_POST['pizza_overload']},
        {$_POST['super_spicy']});
    ");
       if ($result) {
            echo "Order succesfully submitted. Delivery imminent";
        } else {
            echo "Order failed due to system glitch, please re-order";
        }    
        
    ?>
</h3>
</html>

