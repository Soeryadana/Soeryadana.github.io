<?php include 'header.php' ?>

<section id="app">
    <div class="container encrypt-form-container" >
        <div class="card">
            <div class="card-body">
                <form id="encrypt-form" method="post" action="encrypt_act.php" enctype="multipart/form-data" class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea type="text" required name="plaintext" class="form-control"></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Vigenere Key</label>
                        <input type="text" required name="vigenereKey" class="form-control">
                    </div>

                    <p>Affine Key</p>
                    <div class="col-md-6">
                        <label class="form-label">K1/&#945</label>
                        <input id='k1' type="number" required name="affineK1" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">K2/&#946</label>
                        <input type="number" required name="affineK2" class="form-control">
                    </div>

                    <p>In order to acquire &#945 <sup>-1</sup>, the GCD of &#945 & <i>n</i> (in this case <i>n</i> = 26 based on Indonesian alphabet) must to be equal to 1. <i>gcd(&#945, n) = 1.</i>  </p>

                    <div class="mb-1">
                        <label for="formFile" class="form-label">Choose Cover Image</label>
                        <input required class="form-control" type="file" id="formFile" name="coverImage" accept="image/jpeg">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn" name="encryptButton">Encrypt</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/gcd.js"></script>
</section>

<?php include 'footer.php' ?>