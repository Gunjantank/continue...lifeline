<?php
include "header.php";

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4 col-lg-7 col-md-7 col-sm-7">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">person</i>
                        </div>
                        <p class="card-category">VISITORS</p>
                        <h3 class="card-title">500</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-7 col-md-7 col-sm-7">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">comment</i>
                        </div>
                        <p class="card-category">Posted Requests</p>
                        <h3 class="card-title">42</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-7 col-md-7 col-sm-7">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">check</i>
                        </div>
                        <p class="card-category">Completed Requests</p>
                        <h3 class="card-title">75</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="slideshow-container">
                        <div class="mySlides fade">
                            <img src="slideshowimages/img1.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <img src="slideshowimages/img3.jpg" style="width:100%">
                        </div>
                        <div class="mySlides fade">
                            <img src="slideshowimages/img4.jfif" style="width:100%">
                        </div>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                    <br>
                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span>
                        <span class="dot" onclick="currentSlide(2)"></span>
                        <span class="dot" onclick="currentSlide(3)"></span>
                    </div>
                    <script>
                        var slideIndex = 0;
                        showSlides();
                        function showSlides() {
                            var i;
                            var slides = document.getElementsByClassName("mySlides");
                            for (i = 0; i < slides.length; i++) {
                                slides[i].style.display = "none";
                            }
                            slideIndex++;
                            if (slideIndex > slides.length) {
                                slideIndex = 1
                            }
                            slides[slideIndex - 1].style.display = "block";
                            setTimeout(showSlides, 3000); // Change image every 2 seconds
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
