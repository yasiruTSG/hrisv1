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
                            <?php
                            include('components/image-upload.php');//import common js
                            ?>
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
