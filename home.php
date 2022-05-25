<?php require_once "control/controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM datas WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "Verified"){
            if($code != 0){
                header('Location: php/reset.php');
            }
        }else{
            header('Location: php/otp.php');
        }
    }
}else{
    header('Location: php/login.php');
}
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="css/home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">      
</head>
<body>
    
    <header>
        <div class="menu-side">
            <h1>Playlist</h1>
            <div class="playlist">
                <h4 class="active"><span></span><i class="bi bi-music-note-beamed"></i>Playlist</h4>
                <h4><span></span><i class="bi bi-music-note-beamed"></i>Last Listening</h4>
                <h4><span></span><i class="bi bi-music-note-beamed"></i>Recommended</h4>
            </div>
            <div class="menu-song">
                <li class="songItem">
                    <span>01</span>
                    <img src="img/1.webp" alt="ruth">
                    <h5>1
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="1"></i>
                    
                </li>
                <li class="songItem">
                    <span>02</span>
                    <img src="img/dandelions.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="2"></i>
                    
                </li>
                <li class="songItem">
                    <span>03</span>
                    <img src="img/1.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="3"></i>
                    
                </li>
                <li class="songItem">
                    <span>04</span>
                    <img src="img/dandelions.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="4"></i>
                    
                </li>
                <li class="songItem">
                    <span>05</span>
                    <img src="img/dandelions.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="5"></i>
                    
                </li>
                <li class="songItem">
                    <span>06</span>
                    <img src="img/dandelions.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="6"></i>
                    
                </li>
                <li class="songItem">
                    <span>07</span>
                    <img src="img/dandelions.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="7"></i>
                    
                </li>
                <li class="songItem">
                    <span>08</span>
                    <img src="img/dandelions.webp" alt="ruth">
                    <h5>Dandelions
                        <div class="subtitle">Ruth B.</div>
                    </h5>
                        <i class="bi playListPlay bi-play-circle-fill" id="8"></i>
                    
                </li>
            </div>
        </div>


        <div class="song-side">
            <nav>
                <ul>
                    <li>Discover <span></span></li>
                    <li>My Library </li>
                    <li>Radio</li>
                </ul>
                <div class="search">
                    <i class="bi bi-search"></i>
                    <input type="text" placeholder="Search Music...">
                </div>
                <div class="user">
                    <img src="img/ozil.webp" alt="User" title="sample">
                </div>
            </nav>
            <div class="content">
                <h1>Music Player</h1>
                <p>Music is the soundtrack of your life
                </p>
                <div class="buttons">
                    <button>PLAY</button>
                    <button>FOLLOW</button>
                </div>
            </div>
            <div class="popular-songs">
                <div class="h4">
                    <h4>Popular Song</h4>
                    <div class="btn-s">
                        <i id="left-scroll" class="bi bi-arrow-left-short"></i>
                        <i id="right-scroll" class="bi bi-arrow-right-short"></i>
                    </div>
                </div>
                <div class="pop-song">
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/1.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="9"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="10"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="11"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="12"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="13"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="14"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="15"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="16"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                    <li class="songItem">
                        <div class="img-play">
                            <img src="img/dandelions.webp" alt="ruth">
                            <i class="bi playListPlay bi-play-circle-fill" id="17"></i>
                        </div>
                        <h5>Dandelions
                            <br>
                            <div class="subtitle">Ruth B.</div>
                        </h5>
                    </li>
                </div>
            </div>
            <div class="popular-artists">
                <div class="h4">
                    <h4>Popular Artists</h4>
                    <div class="btn-s">
                        <i id="left-scroll" class="bi bi-arrow-left-short"></i>
                        <i id="right-scroll" class="bi bi-arrow-right-short"></i>
                    </div>
                </div>
                <div class="item">
                    <li>
                        <img src="img/101.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/102.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/103.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/104.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/105.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/106.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/107.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/108.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/109.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/110.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/111.webp" alt="ruth" title="ruth b">
                    </li>
                    <li>
                        <img src="img/112.webp" alt="ruth" title="ruth b">
                    </li>
                </div>
            </div>
        </div>

        <div class="master-play">
            <div class="wave">
                <div class="wave1"></div>
                <div class="wave1"></div>
                <div class="wave1"></div>
            </div>
            <img src="img/1.webp" alt="ruth" id="posterMasterPlay">
            <h5 id="title">Dandelions<br>
                <div class="subtitle">Ruth B.</div>
            </h5>
            <div class="icons">
                <i class="bi bi-skip-start-fill" id="back"></i>
                <i class="bi bi-play-fill" id="masterPlay"></i>
                <i class="bi bi-skip-end-fill" id="next"></i>
            </div>
            <span id="currentStart">0:00</span>
            <div class="bar">
                <input type="range" min="0" max="100" value="0" id="seek">
                <div class="bar2" id="bar2"></div>
                <div class="dot" id="dot1"></div>
            </div>
            <span id="currentEnd">0:00</span>

            <div class="vol">
                <i class="bi bi-volume-up-fill" id="vol-icon"></i>
                <input type="range" min="0" max="100" value="0" id="vol">
                <div class="vol-bar" id="vol-bar"></div>
                <div class="dot" id="vol-dot"></div>
            </div>
        </div>
    </header>








    <script src="js/home.js"></script>
</body>
</html>