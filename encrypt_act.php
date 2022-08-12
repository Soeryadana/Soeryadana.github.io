<?php
function steganoHide($coverImage, $affineCipher) {
	$binaryMessage = '';
    for ($i = 0; $i < mb_strlen($affineCipher); ++$i) {
        $character = ord($affineCipher[$i]);
        $binaryMessage .= str_pad(decbin($character), 8, '0', STR_PAD_LEFT);
    }

    // Inject the 'end of text' character into the string.
    $binaryMessage .= '00000011';

    // Load the image into memory.
    $img = imagecreatefromjpeg($coverImage['tmp_name']);
    // $img = imagecreatefrompng($coverImage['tmp_name']);

    // Get image dimensions.
    $width = imagesx($img);
    $height = imagesy($img);

    $messagePosition = 0;

    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {

            if (!isset($binaryMessage[$messagePosition])) {
                // No need to keep processing beyond the end of the message.
                break 2;
            }

            // Extract the colour.
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);

            $red = $colors['red'];
            $green = $colors['green'];
            $blue = $colors['blue'];
            $alpha = $colors['alpha'];

            // Convert the blue to binary.
            $binaryRed = str_pad(decbin($red), 8, '0', STR_PAD_LEFT);
            $binaryGreen = str_pad(decbin($green), 8, '0', STR_PAD_LEFT);
            $binaryBlue = str_pad(decbin($blue), 8, '0', STR_PAD_LEFT);

            // Replace the final bit of the blue colour with our message.
            $binaryRed[strlen($binaryRed) - 1] = $binaryMessage[$messagePosition];
            $newRed = bindec($binaryRed);
            $binaryGreen[strlen($binaryGreen) - 1] = $binaryMessage[$messagePosition];
            $newGreen = bindec($binaryGreen);
            $binaryBlue[strlen($binaryBlue) - 1] = $binaryMessage[$messagePosition];
            $newBlue = bindec($binaryBlue);
            // Inject that new colour back into the image.
            $newColor = imagecolorallocatealpha($img, $newRed, $newGreen, $newBlue, $alpha);
            imagesetpixel($img, $x, $y, $newColor);

            // Advance message position.
            $messagePosition++;
        }
    }

    // Save the image to a file.
    // Save image to a folder
	// $newImage = 'assets/img/stegano_image.png';
	// $newImage = 'C:\Users\I Dewa Gede Bagus S\Desktop';
	// imagepng($img, $newImage, 0);

    // Show the image in the browser
    // header('Content-type: image/png');

    // Download the image
    $newImage = 'Stegano Image.png';
	header("Content-Disposition: attachment; filename=$newImage");

	imagepng($img);

    // Destroy the image handler.
    imagedestroy($img);
}

function encryptAffine($vigenereCipher, $affineK1, $affineK2){
    $affineCipher = "";
    $textLength = strlen($vigenereCipher);

    for ($i = 0; $i < $textLength; $i++) {
        if (ctype_alpha($vigenereCipher[$i])) {
            if (ctype_upper($vigenereCipher[$i])) {
                $affineCipher[$i] = chr( ( ( ($affineK1 * (ord($vigenereCipher[$i]) - ord('A') ) + $affineK2) % 26) + ord('A') ) );
            } else {
                $affineCipher[$i] = chr( ( ( ($affineK1 * (ord($vigenereCipher[$i]) - ord('a') ) + $affineK2) % 26) + ord('a') ) );
            }
        } else {
            $affineCipher .= (string)$vigenereCipher[$i];
        }
    }

    return $affineCipher;
}

function encryptVigenere($plaintext, $vigenereKey)
{
    // change vgenereKey to lowercase for simplicity
    $key = strtolower($vigenereKey);
    
    // Initialize variables
    $vigenereCipher = "";
    $keyLength = strlen($key);
    $keyIndex = 0;
    $textLength = strlen($plaintext);

    // Iterate over each line in text
    for ($i = 0; $i < $textLength; $i++) {
        // If the letter is alpha, enrypt it
        if (ctype_alpha($plaintext[$i])) {
            if (ctype_upper($plaintext[$i])) {
                $vigenereCipher[$i] = chr(((ord($key[$keyIndex]) - ord('a') + ord($plaintext[$i]) - ord('A')) % 26) + ord('A'));
            } else {
                $vigenereCipher[$i] = chr(((ord($key[$keyIndex]) - ord('a') + ord($plaintext[$i]) - ord('a')) % 26) + ord('a'));
            }

            $keyIndex++;

            // Update the index of keyindex
            if ($keyIndex >= $keyLength) {
                $keyIndex = 0;
            }
        } else {
            $vigenereCipher .= (string)$plaintext[$i];
        }
    }

    return $vigenereCipher;
}


if (!isset($_POST['submit'])) {
    $plaintext = $_POST['plaintext'];
    $vigenereKey = $_POST['vigenereKey'];
    $affineK1 = $_POST['affineK1'];
    $affineK2 = $_POST['affineK2'];
    
    // Remove 'space' between words
    $vigenereKey = str_replace(' ', '', $vigenereKey);

    $vigenereCipher = encryptVigenere($plaintext, $vigenereKey);
    $affineCipher = encryptAffine($vigenereCipher, $affineK1, $affineK2);
    steganoHide($_FILES['coverImage'], $affineCipher);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">vigenere cipher</label>
    <?php 
        echo $vigenereCipher;
     ?>
    <br>
     <label for="">affien cipher</label>
     <?php 
        echo $affineCipher;
     ?>
</body>
</html>


