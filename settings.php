<?php $page = 'settings';
include 'layout/header.php'; ?>
<?php include 'layout/sidebar.php' ?>

<section id="main-content">
    <section class="wrapper">
        <div class="modal fade" id="Confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 400px;">
                <div class="modal-content" style="width: 400px;">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-4">
                                <img src="img/warning-gif.gif" style="width: 97px;">
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="row">

                            <div class="col-md-12">
                                <h3 style="text-align: center;margin:5% 0%;">Are you sure?</h3>
                                <p style="text-align: center;margin:5% 0%;">Do you really want to delete these records? This process can not be undone</p>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-6" style="text-align: center;margin:5% 0%;">
                                <button type="button" class="btn btn-primary red" data-dismiss="modal" id="yes">Delete</button>
                                <button type="button" class="btn btn-primary gray" data-dismiss="modal" id="no">Cancel</button>
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">User profile</a>
                    <?php if ($_SESSION["role"] == 1) { ?>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add new user</a>
                    <?php } ?>

                    <a class="nav-link" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="false">User Manual</a>



                </div>
            </div>
            <div class="col-9 ">
                <div class="tab-content scrollspy-example2" id="v-pills-tabContent">
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
                                                <input type="text" class="form-control fcc" name="user_name" value="<?php echo $row["name"] ?>">
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
                                    </div>
                                </div>

                            </form>
                        <?php } ?>
                    </div>

                    <?php if ($_SESSION["role"] == 1) { ?>
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
                                    </div>
                                </div>
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

                                            <td><a href="#" onClick="removee(<?php echo $row['id'] ?>)" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                                            </td>

                                            <!--<td><a href="php/removeuser.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a></td>
                                        -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>



                        </div>
                    <?php } ?>

                    <div class="tab-pane fade " id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                        <style>
                            .card {
                                height: auto;
                            }
                        </style>
                        <?php include 'usermanual.php' ?>


                        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


                    </div>

    </section>
    <!-- /wrapper -->
</section>
<?php include 'layout/footer.php' ?>

<script>
    $(document).ready(function() {
        showInstitutes($("#ename").val(), $("#fname").val(), $("#oname").val(), $("#vname").val(), $("#month").val(), $("#year").val());
    })

    function removee(id) {
        $('#Confirm').modal();
        $("#yes").unbind("click").click(function() {
            window.location.href = 'php/removeuser.php?id=' + id;
        })
    }
</script>