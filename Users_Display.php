<?php
    // =======Retrive Database From MySQL Table====
        $sql = mysqli_query($con,"SELECT * FROM user ORDER BY id DESC");
    // ====X===Retrive Database From MySQL Table===X===

?>
<!-- User Display Container -->
    <div class="container-user">
        <h2>Users Form Submitted Data <br> <a href="index.php">Clear Now</a> </h2>

        <div class="row_user_display">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Id</th>
                        <th>Country Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                         $i=1;
                        while($row = mysqli_fetch_assoc($sql)){
                    ?>
                        <tr>
                            <th><?php echo $i;?></th>
                            <td><?php echo $row['first_name'];?></td>
                            <td><?php echo $row['last_name'];?></td>
                            <td><?php echo $row['email_id'];?></td>
                            <td><?php echo $row['country_name'];?></td>
                            <td> <a href="?id=<?php echo $row['id']; ?>"><button>Edit</button></a></td>
                        </tr>
                    <?php
                       $i++; }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
<!--X- User Display Container -X-->