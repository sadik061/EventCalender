<?php $page = 'settings';
include 'layout/header.php'; ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
    <section class="wrapper">
        <!-- Modal -->
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User profile</a>
                    <?php if ($_SESSION["role"]==1){ ?>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add new user</a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <h4>User Profile</h4>
                        <?php include 'php/database.php';
                        $query = "SELECT * FROM user where id=" . $_SESSION["userid"];
                        $statement = $connect->prepare($query);
                        $statement->execute();
                        $result = $statement->fetchAll();
                        foreach ($result as $row) {
                            ?>
                            <form class="form-horizontal style-form" action="php/profileupdate.php" method="post" enctype="multipart/form-data">
                                <div class="row ">
                                    <div class="col-md-5 profile-text mt mb centered">
                                        <div class="right-divider hidden-sm hidden-xs">
                                            <img src="img/<?php echo $row["image"] ?>" width="90%">
                                            <p>For best result try to upload square images</p>
                                            <input type="file" name="fileToUpload" id="fileToUpload" style="margin: 6%">
                                        </div>
                                    </div>
                                    <div class="col-md-7">


                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control fcc"  name="user_name" value="<?php echo $row["name"] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" value="<?php echo $row["email"] ?>" name="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="password" value="<?php echo $row["password"] ?>">
                                            </div>
                                        </div>

                                        <button type="submit" style="    margin-left: 15px;" class="btn btn-theme">Update</button>

                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php if ($_SESSION["role"]==1){ ?>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <h4>Add New User</h4>
                <br>
                <form class="form-horizontal style-form" action="php/adduser.php" method="post" enctype="multipart/form-data">
                    <div class="row ">

                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control fcc" name="auser_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="aemail">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-sm-2 control-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="apassword">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-theme">Add</button>
                </form>
                <hr>
                <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th style="width: 40%"> Name</th>
                        <th style="width: 40%"> Email</th>
                        <th> Remove</th>

                    </tr>
                </thead>
                <tbody>
                    <?php include 'php/database.php';
                    $query = "SELECT * FROM user";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach ($result as $row) { ?>
                            <tr>
                                <td><?php echo $row["name"] ?></td>
                                <td><?php echo $row["email"] ?></td>
                                <td><a href="php/removeuser.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a></td>
                            </tr>
                            <?php } ?>
                </tbody>
                </table>

            
            </div>

        </div>
        </div>
                    <?php } ?>
        </div>


        <div id="listt">

        </div>




    </section>
    <!-- /wrapper -->
</section>
<?php include 'layout/footer.php' ?>

<script>
    $(document).ready(function() {
        showInstitutes($("#ename").val(), $("#fname").val(), $("#oname").val(), $("#vname").val(), $("#month").val(), $("#year").val());
    })
</script>