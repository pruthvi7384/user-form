<?php 
    //===== Include Top File Here===
        include('top.php'); 
    //===== Include Top File Here===

        // ======Variabale Input=======
            $first_name = '';
            $last_name = '';
            $email_id = '';
            $country_name = '';
            $msg = '';
            $id='';
            $heading='';
            $required='required';

        // ======Edit User Info=====
            if(isset($_GET['id']) && $_GET['id']>0){
                $id = mysqli_escape_string($con,$_GET['id']);
            }
            // 
            // ====Heading Logic=====
                if($id && $id>0){
                    $required='';
                    $sql_featch = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM user WHERE id='$id'"));
                    $first_name = $sql_featch['first_name'];
                    $last_name = $sql_featch['last_name'];
                    $email_id = $sql_featch['email_id'];
                    $country_name = $sql_featch['country_name'];
                    $heading = 'Hey, '.$first_name. ' Edit Your Information';
                }else{
                    $heading = 'Please Fill The Form';
                }
            // ==X==Heading Logic==X===
    
        // ====X==Edit User Info===X==

            if(isset($_POST['submit'])){
                // ===Get Input From User====
                    $first_name = mysqli_escape_string($con,$_POST['first_name']);
                    $last_name = mysqli_escape_string($con,$_POST['last_name']);
                    $email_id = mysqli_escape_string($con,$_POST['email']);
                    $country_name = mysqli_escape_string($con,$_POST['country_name']);
                // ==X=Get Input From User==X==

                // ====Condition Added Here====
                    if($id>0){
                         mysqli_query($con,"UPDATE user SET first_name ='$first_name', last_name =' $last_name', email_id ='$email_id', country_name ='$country_name' WHERE id='$id'");
                         echo "<script>alert(`Hi, ${first_name} your Information Sussesfuly Updated !`)</script>";
                    }else{
                        $sql = mysqli_query($con,"SELECT * FROM user WHERE email_id = '$email_id'");
                        if(mysqli_num_rows($sql)>0){
                            $msg="<h2>Your Email Id Already Exists Plese Enter another Email Id</h2>";
                        }else{
                            // =====Added To Database====
                                 mysqli_query($con,"INSERT INTO user(first_name,last_name,email_id,country_name) VALUES('$first_name','$last_name','$email_id','$country_name')");
                                 echo "<script>alert('Your Form Submitted Sussesfuly')</script>";
                            // =====Added To Database====
                        }
                    }
                   
                // ====Condition Added Here====
            }
        // ====X==Variabale Input===X====
?>
    <!-- Form Container -->
        <div class="contener-form">
            <div class="row_heading">
                <h1><?php echo  $heading; ?></h1>
            </div>
            <div class="row_form d-flex">
               <?php echo $msg; ?>
                <form method="post" action="">
                    <div class="form-controall d-flex">
                        <div class="form_row">
                            <label for="">First Name</label>
                            <input type="text" value="<?php echo $first_name; ?>" name="first_name" placeholder="Enter Your First Name" <?php echo $required; ?>>
                        </div>
                        <div class="form_row">
                            <label for="">Last Name</label>
                            <input type="text" value="<?php echo $last_name; ?>" name="last_name" placeholder="Enter Your Last Name" <?php echo $required; ?>>
                        </div>
                    </div>
                    <div class="form-controall">
                        <label for="">Email Id</label>
                        <input type="email" value="<?php echo $email_id; ?>" name="email" placeholder="Enter Your Email Id" <?php echo $required; ?>/>
                    </div>
                    <div class="form-controall">
                        <label for="">Country Name</label>
                        <input type="text" value="<?php echo $country_name; ?>" name="country_name" placeholder="Enter Country Name" <?php echo $required; ?>/>
                    </div>
                    <div class="form-controall button-controal d-flex">
                        <button type="submit" name="submit">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
    <!-- Form Container -->

<?php 
    // ======User Display Here====
        include('Users_Display.php');
    // ===X==User Display Here==X==

    //===== Include Footer File Here===
        include('footer.php'); 
    //===== Include Footer File Here===
?>