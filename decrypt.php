<?php 
    include 'header.php'; 

    include 'decrypt_act.php';
?>

<section id="app">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form id="decrypt-form" method="post" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Vigenere Key</label>
                        <input class="form-control" type="text" required name="vigenereKey">
                    </div>

                    <p>Affine Key</p>
                    <div class="col-md-6">
                        <label class="form-label">K1/&#945</label>
                        <input class="form-control" type="number" required name="affineK1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">K2/&#946</label>
                        <input class="form-control" type="number" required name="affineK2">
                    </div>

                    <div class="mb-1">
                        <label for="formFile" class="form-label">Choose Stegano Image</label>
                        <input required class="form-control" type="file" id="formFile" name="steganoImage" accept="image/png">
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn" name="decryptButton">Decrypt</button>
                    </div>
                </form>

                <?php if (!empty($_FILES['steganoImage']['tmp_name'])) : ?>
                    <div class="decrypted mt-3" style="display: block;">
                        <div class="col-12">
                            <label class="form-label decrypt-field">Affine Ciphertext</label>
                            <textarea disabled class="form-control" type="text" required name="affineCiphertext"><?php echo $affineCipher; ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label decrypt-field mt-3">Vigenere Ciphertext</label>
                            <textarea disabled class="form-control" type="text" required name="vigenereCiphertext"><?php echo $vigenereCipher; ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label decrypt-field mt-3">Plaintext</label>
                            <textarea disabled class="form-control" type="text" required name="plaintext"><?php echo $plainText; ?></textarea>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php' ?>