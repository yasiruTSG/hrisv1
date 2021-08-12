<?php
include('components/header.php');//header import
?>
<!--Custom Css-->
<link rel="stylesheet" href="../styles/profile-img-upload.css">
<section class="container p-5 mt-4" id="content">
    <div class="page-body">
        <form class="row g-3" id="acknowledmentForm" method="post">
            <div class="card text-center w-100 p-5">
                <div class="card-body">
                    <h3 class="card-title">Let's Get Started</h3>
                    <div class="row  g-4">
                        <div class="col">
                            <div class="card p-4">
                                <div class="text-center">
                                    <div class="profile-pic-wrapper">
                                        <div class="pic-holder">
                                            <!-- uploaded pic shown here -->
                                            <img id="profilePic" src="../images/image-upload.jpeg"
                                                 class="img-thumbnail img-fluid pic"
                                                 alt="Profile Picture" width="200" height="200">
                                            <label for="newProfilePhoto" class="upload-file-block">
                                                <div class="text-center">
                                                    <div class="mb-2">
                                                        <i class="fa fa-camera fa-2x"></i>
                                                    </div>
                                                    <div class="text-uppercase">
                                                        Update <br/> Profile Photo
                                                    </div>
                                                </div>
                                            </label>
                                            <Input class="uploadProfileInput" type="file" name="profile_pic"
                                                   id="newProfilePhoto" accept="image/*" style="display: none;"/>
                                        </div>
                                        </hr>
                                        <div class="badge bg-hris text-wrap text-center fs-7" >
                                            Note
                                        </div>
                                        <p class="card-text text-center fs-7">Attach a professional photograph, <br> which is similar to passport photo.</p>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-sm-4">
                                        </div>
                                        <div class="col-sm-2">
                                            <button href="#" class="btn btn-outline-primary">Save</button>
                                        </div>
                                        <div class="col-sm-2">
                                            <button href="#" class="btn btn-outline-dark">Skip</button>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<?php
include('components/default-imports.php');//import common js
?>
<!--Page js-->
<script src="../js/profile-img-upload.js" type="module"></script>
</body>
</html>
