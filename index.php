<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mystikó.io</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="assets/img/Logo.png" type="image/x-icon">
</head>

<body>
    <nav class="navbar home fixed-top navbar-expand-lg ">
        <div class="container">
            <div class="logo-home">
                <a class="navbar-brand" href="index.php">
                    <img class="brand-white" src="assets/img/mystiko-white.png" alt="">
                    <img class="brand-color" src="assets/img/mystiko-brand.png" alt="">

                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="encrypt.php">Encrypt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="decrypt.php">Decrypt</a>
                    </li>
            </div>
        </div>
    </nav>

    <span class="background">
        <section class="landing-page">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <div class="landing-head">
                            <div class="landing-text">
                                <div class="text-container">
                                    <h1 class="landing-title">
                                        Secure your messages with cryptography and steganography!
                                    </h1>
                                    <p class="landing-p">
                                        At μystikό, we offer an additional layer of security to your messages.
                                    </p>
                                </div>
                                <div class="btn-container">
                                    <a href="encrypt.php" class="btn-item">GET STARTED</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="landing-body">
                            <div class="landing-image">
                                <!-- <img src="assets/img/772.jpg" alt=""> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </span>

    <section class="mystiko">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-5">
                    <div class="mystikko-head">
                        <div class="mystiko-img">
                            <img src="assets/img/626-1.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mystiko-body">
                        <div class="mystiko-head">
                            <img src="assets/img/mystiko.png" alt="">
                            <h2>What is μystikό?</h2>
                        </div>
                        <div class="mystiko-body">
                            <p class="mystiko-text">μystikό is a message security service that encrypt your messages with cryptography and encode them to an image with steganography for safer communication</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="places-page">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7">
                    <div class="places-head">
                        <div class="places-text">
                            <div class="places-title">
                                <img src="assets/img/everywhere.png" alt="" class="places-title-img">
                                <h2 class="places-title-text">
                                    Anywhere Anytime
                                </h2>
                            </div>
                            <h3 class="places-subtitle">
                                Encrypt and Encode your messages anywhere anytime
                            </h3>
                            <p class="places-p">
                                With μystikό web app based you can easily encrypt and encode your messages to any jpeg images from any devices through a browser. Stegano image will be downloaded to your local storage and can be send imidiately.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="places-body">
                        <div class="places-body-images">
                            <img src="assets/img/4901198-removebg-preview.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="algorithm">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-4">
                    <div class="card-container">
                        <div class="card-head">
                            <div class="img-container">
                                <img src="assets/img/vigenere.png" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body-title">
                                <a class="card-title" href="https://en.wikipedia.org/wiki/Vigen%C3%A8re_cipher">
                                    Vigenère Cipher
                                </a>
                            </div>
                            <div class="card-body-text">
                                <p class="card-text">The Vigenère cipher is a method of encrypting alphabetic text by using a series of interwoven Caesar ciphers, based on the letters of a keyword. It employs a form of polyalphabetic substitution.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-container">
                        <div class="card-head">
                            <div class="img-container">
                                <img src="assets/img/affine.png" alt="">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-body-title">
                                <a class="card-title" href="https://en.wikipedia.org/wiki/Affine_cipher">
                                    Affine Cipher
                                </a>
                            </div>
                            <div class="card-body-text">
                                <p class="card-text">The Affine cipher is a type of monoalphabetic substitution cipher, where each letter in an alphabet is mapped to its numeric equivalent, encrypted using a simple mathematical function, and converted back to a letter.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-container">
                        <div class="card-head">
                            <div class="img-container">
                                <img src="assets/img/lsb.png" alt="">
                            </div>
                        </div>
                        <div class="card-body" id="card-container-lsb">
                            <div class="card-body-title">
                                <a class="card-title" href="https://en.wikipedia.org/wiki/Bit_numbering">
                                    Least Significant Bit
                                </a>
                            </div>
                            <div class="card-body-text">
                                <p class="card-text">The least significant bit is the part of the binary data sequence (base two) that has the least significant/smallest value. It is located on the far right of the bit sequence.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <section class="biodata">
        <div class="container">
            <div class="biodata-head">
                <div class="biodata-image">
                    <img src="assets/img/logo unmul.png" alt="">
                </div>
            </div>
            <div class="biodata-body">
                <div class="biodata-text">

                </div>
            </div>
        </div>
    </section>

    <section class="footer-leg">
        <div class="footer-bar">
            <p>Copyright &copy; 2022 μystikό. All rights reserved</p>
        </div>
    </section>

    <script type="text/javascript" src="assets/js/nav.js"></script>

</body>

</html>