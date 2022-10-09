<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <style>
         #preloader{
            background: rgb(227, 239, 244) url("https://media.giphy.com/media/xTk9ZvMnbIiIew7IpW/giphy.gif") no-repeat center center;
            background-size: 20%;
            height: 100vh;
            width: 100%;
            position: fixed;
            z-index: 100;
        }
        body {
    height: 100vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
    url("https://dynamic.placementindia.com/blog_images/20171027131359_image1.jpg");
    background-size: cover;
    background-position: center;
    text-shadow: 0 0.05rem 0.1rem rgba(0, 0, 0, 0.7);
    box-shadow: inset 0 0 5rem rgba(0, 0, 0, 0.7);
}
.cover-container {
  max-width: 60vw;
}

.nav-link {
    padding: 0.25rem 0;
    font-weight: 700;
    color: rgba(255,255,255,0.5);
    margin-left: 1rem;
    border-bottom: 0.25rem solid transparent;
}

.nav-link:hover{
    color: rgba(255,255,255,0.5);
    border-bottom-color:rgba(255,255,255,0.5);
}

.nav-link.active {
    color: white;
    border-bottom-color:white;

}

.btn-secondary, .btn-secondary:hover{
    color: #333;
    text-shadow: none;
}
    </style>
</head>

<body class="d-flex text-center text-white bg-dark">
    <div id="preloader"></div>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto">
            <div>
                <h3 class="float-md-left mb-0">Job Portal</h3>
                <nav class="nav nav-masthead justify-content-center float-md-right">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    <a class="nav-link" href="Login.php">Login</a>
                    <a class="nav-link" href="Register.php">Register</a>
                    
                </nav>
            </div>
        </header>
        <main class="px-3">
            <h1>Job Portal</h1>
            <p class="lead"> Welcome to Job Portal! <br> Jump right in and explore your desired job in your dream MNCs. <br>
                Feel free to apply if fulfilling required skills! </p>
            <a href="Login.php" class="btn btn-lg btn-secondary font-weight-bold border-white bg-white">Log In</a>
            <p>Login to continue</p>
        </main>

        <footer class="mt-auto text-white-50">
            <p>&copy; 2022 </p>
        </footer>


    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
        <script>
            var loader = document.getElementById("preloader");
            window.addEventListener("load",function(){
                loader.style.display="none";
            })
        </script>
</body>

</html>