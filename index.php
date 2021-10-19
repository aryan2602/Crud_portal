<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Crud Portal</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <div class="header mt-2 d-flex justify-content-between align-top">
            <div class="heading">
                <h3>Crud Panel</h3>
            </div>
            <div class="addbtn">
                <button type="button" name="addnewbtn" id="addnewbtn" class="btn btn-primary btn-sm" data-toggle="modal"
                    data-target="#Addusermodal">Add New</button>
            </div>
        </div>
        <hr class="p-0 mt-0">
        <div class="mainbody">

            <table class="table table-hover table-sm text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col" style="width: 140px;">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Age</th>
                        <th scope="col">Gender</th>
                        <th scope="col" style="width:50px;">Photo</th>
                        <th scope="col">Address</th>
                        <th scope="col" style="width:80px">Action</th>
                    </tr>
                </thead>
                <tbody id="showtable" style="font-size: 13px;">

                </tbody>
            </table>

            <!-- Add User Modal -->
            <div class="modal fade" id="Addusermodal" tabindex="-1" role="dialog" aria-labelledby="Addusermodaltitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Addusermodaltitle">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" id="adduserform">
                            <div class="modal-body">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                            required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" name="phone" id="phone"
                                            placeholder="Phone" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" name="age" id="age" placeholder="Age"
                                            required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="gender">Gender</label>
                                        <select id="gender" name="gender" class="form-control" required>
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="address" id="address"
                                            placeholder="Address" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" name="photo" id="photo"
                                            placeholder="Photo">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" id="clearbtn" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                                <input type="submit" id="savebtn" class="btn btn-primary" value="Save" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit User Modal -->
            <div class="modal fade" id="Editusermodal" tabindex="-1" role="dialog" aria-labelledby="Editusermodaltitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Editusermodaltitle">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="POST" id="edituserform">
                            <div class="modal-body">
                                <!-- id value -->
                                <input type="hidden" name="id" id="id" value="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="edit_name" id="edit_name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="tel" class="form-control" name="edit_phone" id="edit_phone" placeholder="Phone" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="age">Age</label>
                                        <input type="number" class="form-control" name="edit_age" id="edit_age" placeholder="Age" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="gender">Gender</label>
                                        <select id="edit_gender" name="edit_gender" class="form-control" required>
                                            <option value="" disabled selected>Choose...</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" name="edit_address" id="edit_address" placeholder="Address" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="imgpreviewbox">
                                            <img src="upload/test.com-user.png" alt="preview" id="preview_img">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control" name="edit_photo" id="edit_photo"
                                            placeholder="Photo">
                                    </div>
                                    <!-- old photo value -->
                                    <input type="hidden" name="old_photo" id="old_photo" value=""> 
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="editclearbtn" class="btn btn-secondary" data-dismiss="modal">Clear</button>
                                <input type="submit" id="updatebtn" class="btn btn-primary" value="Update" >
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer bg-secondary text-white text-center">
            <small>Copyright@<?php echo date('Y');?>&nbsp;|&nbsp;<a href="https://www.linkedin.com/in/dhiraj-deshmukh-2602" class=""
                    style="text-decoration: none;color:white">Dhiraj Deshmukh</a></small>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="jquery.js"></script>
    <script src="script.js"></script>
</body>

</html>