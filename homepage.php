<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="homepage.css">
    <link href="bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<body>
    <div class="container-fluid d-flex p-0">
        <div class=" sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px; height: 100vh;">
            <div class="">
                <a href="dashboard.php">Dashboard</a>
                <a href="attendance_sheet.php">Attendance Sheet</a>
                <div class="dropdown">
                    <a href="#" class="student">Student</a>
                    <div class="dropdown-content">
                        <div class="dashboard-item">
                            <a href="viewstd.php">
                                <label>View student</label>
                            </a>
                        </div>
                        <div class="dashboard-item">
                            <a href="register1.php">
                                <label>Register</label>
                            </a>
                        </div>
                        <div class="dashboard-item">
                            <a href="Update12.php">
                                <label>Update</label>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="ms-4 me-4 mt-4 w-100" style="width: 280px; height: 100vh;  overflow: scroll;">
            <div class="d-flex mb-4 justify-content-between">
                <a class="back-button btn-back btn-secondary" style="padding:5px 10px; height:36px"
                    href="homepage.php">Back to
                    Home</a>
                <a href="login_form.php" class="btn btn-outline-primary back-button"
                    style="padding:5px 10px; height:36px">Logout</a>
            </div>
            <div id="imageSlider" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img src="slider2.png" class="d-block w-100" alt="Image 2">
                    </div>
                    <div class="carousel-item">
                        <img src="slider3.jpg" class="d-block w-100" alt="Image 3">
                    </div>
                    <!-- Add more carousel items as needed -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#imageSlider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageSlider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    <div class="section-title mt-2 d-flex justify-content-between mb-4">
                        <h3>News</h3>
                        <a href="https://tu.edu.np/news" class="btn btn-secondary"><i class="bi bi-plus me-2"></i>
                            More</a>
                    </div>
                    <div class="main-news-wrapper">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card shdow">
                                    <img src="https://portal.tu.edu.np/medias/journalism_2024_01_25_19_13_03.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="https://tu.edu.np/news/344">
                                            <h5 class="card-title">

                                                त्रिवि र युुइएसटिसी विच सहमति&nbsp;
                                            </h5>
                                            <div class="post-date"><i class="bi bi-calendar-check"></i> <span
                                                    id="nep_date">११ माघ २०८०</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card shdow">
                                    <img src="https://portal.tu.edu.np/medias/vccup_2024_01_23_11_39_24.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="https://tu.edu.np/news/343">
                                            <h5 class="card-title">

                                                उपकुलपति कप खेलकुद प्रतियोगिता प्रारम्भ&nbsp;
                                            </h5>
                                            <div class="post-date"><i class="bi bi-calendar-check"></i> <span
                                                    id="nep_date">७ माघ २०८०</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card shdow">
                                    <img src="https://portal.tu.edu.np/medias/Library_2024_01_05_16_54_35.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="https://tu.edu.np/news/330">
                                            <h5 class="card-title">

                                                त्रिवि केन्द्रीय पुस्तकालयको उद्घाटन सम्पन्न ।&nbsp;
                                            </h5>
                                            <div class="post-date"><i class="bi bi-calendar-check"></i> <span
                                                    id="nep_date">२० पौष २०८०</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card shdow">
                                    <img src="https://portal.tu.edu.np/medias/phdorientation2023_2023_12_31_16_50_57.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="https://tu.edu.np/news/322">
                                            <h5 class="card-title">

                                                विज्ञानका शोधार्थीहरुलाई विद्यावारिधि अभिमुखिकरण&nbsp;
                                            </h5>
                                            <div class="post-date"><i class="bi bi-calendar-check"></i> <span
                                                    id="nep_date">१३ पौष २०८०</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card shdow">
                                    <img src="https://portal.tu.edu.np/medias/IMG_0319_2023_12_18_15_33_41.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="https://tu.edu.np/news/316">
                                            <h5 class="card-title">

                                                त्रिभुवन विश्वविद्यालयको ४९ औं दीक्षान्त विश्व रेकर्ड कायम गर्न सफल
                                                &nbsp;
                                            </h5>
                                            <div class="post-date"><i class="bi bi-calendar-check"></i> <span
                                                    id="nep_date">२ पौष २०८०</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="card shdow">
                                    <img src="https://portal.tu.edu.np/medias/01_2023_12_07_11_50_05.jpg"
                                        class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <a href="https://tu.edu.np/news/308">
                                            <h5 class="card-title">

                                                Winter School on "Application of Field and Remote Sensing Techniques for
                                                Snow and Glacier"
                                                Inaugurated at Tribhuvan University
                                            </h5>
                                            <div class="post-date"><i class="bi bi-calendar-check"></i> <span
                                                    id="nep_date">३० मङ्सिर
                                                    २०८०</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="main-sidebar">
                        <div class="news-container">
                            <div class="box shadow-sm rounded bg-white mb-3">
                                <div class="col-lg-9 right">
                                    <div class="box shadow-sm rounded bg-white mb-3">
                                        <div class="box-title border-bottom p-3">
                                            <h6 class="m-0">Recent News</h6>
                                        </div>
                                        <div class="box-body p-0">
                                            <div
                                                class="p-3 d-flex align-items-center bg-light border-bottom osahan-post-header">
                                                <div class="font-weight-bold mr-3">
                                                    <div class="text-truncate">DAILY RUNDOWN: WEDNESDAY</div>
                                                    <div class="small">Income tax sops on the cards, The bias in VC
                                                        funding,
                                                        and other top news
                                                        for you</div>
                                                </div>
                                                <span class="ml-auto mb-auto">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-sm rounded"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button"><i
                                                                    class="mdi mdi-delete"></i> Delete</button>
                                                            <button class="dropdown-item" type="button"><i
                                                                    class="mdi mdi-close"></i> Turn
                                                                Off</button>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="text-right text-muted pt-1">3d</div>
                                                </span>
                                            </div>
                                            <div class="p-3 d-flex align-items-center osahan-post-header">
                                                <div class="dropdown-list-image mr-3">
                                                </div>
                                                <div class="font-weight-bold mr-3">
                                                    <div class="mb-2">We found a job at askbootstrap Ltd that you may be
                                                        interested in Vivamus
                                                        imperdiet venenatis est...</div>

                                                </div>
                                                <span class="ml-auto mb-auto">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-light btn-sm rounded"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                            <i class="mdi mdi-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button"><i
                                                                    class="mdi mdi-delete"></i> Delete</button>
                                                            <button class="dropdown-item" type="button"><i
                                                                    class="mdi mdi-close"></i> Turn
                                                                Off</button>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div class="text-right text-muted pt-1">4d</div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more news items as needed -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>