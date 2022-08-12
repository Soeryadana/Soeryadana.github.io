<?php
function decryptVigenere($vigenereCipher, $vigenereKey){
    $key = strtolower($vigenereKey);
    
    $plainText = "";
    $keyLength = strlen($key);
    $keyIndex = 0;
    $cipherLen = strlen($vigenereCipher);

    for ($i=0; $i < $cipherLen; $i++) {
        if (ctype_alpha($vigenereCipher[$i])) {
            if (ctype_upper($vigenereCipher[$i])) {

                $chr = (ord($vigenereCipher[$i]) - ord('A')) - (ord($key[$keyIndex]) - ord('a'));
				
				if ($chr < 0)	{
                    $chr += 26;
				}
				
				$chr = $chr + ord('A');
				
				$plainText[$i] = chr($chr);
            } else {
                $chr = (ord($vigenereCipher[$i]) - ord('a')) - (ord($key[$keyIndex]) - ord('a'));
                    
                if ($chr < 0) {
                    $chr += 26;
                }
                    
                $chr = $chr + ord('a');
                    
                $plainText[$i] = chr($chr);
            }
            $keyIndex++;
            if ($keyIndex >= $keyLength){
                $keyIndex = 0;
            }
        } else {
            $plainText .= (string)$vigenereCipher[$i];
        }
    }
    return $plainText;
}

function decryptAffine($affineCipher, $affineK1, $affineK2) {
    $cipherLen = strlen($affineCipher);
    $vigenereCipher = "";
    $aInv = 0;
    $flag = 0;

    //find affineK1^-1 (inverse) in the group of integers modulo m
    for ($i=0; $i < 26; $i++) { 
        $flag = ($affineK1 * $i) % 26;

        //check if (affineK1*i)%26 == 1, then it will be the multiplicative intevrse of affineK1
        if ($flag == 1) {
            $aInv = $i;
        }
    }
	// echo $aInv;
	// echo $affineK2;
    for ($i=0; $i < $cipherLen; $i++) { 
        if (ctype_alpha($affineCipher[$i])) {
            /*Applying decryption formula affineK1^-1 ( x - affineK2 ) mod m
			{here x is affineCipher[i] and m is 26} and added 'A'
			to bring it in range of ASCII alphabet[ 65-90 | A-Z ] */
            if (ctype_upper($affineCipher[$i])) {
				$dec = ($aInv * ( ord($affineCipher[$i]) - ord('A') ) ) - ($aInv * $affineK2);
				$mod = $dec % 26;
				if ($mod < 0 ) {
					$mod += 26;
				}
                $chr = $mod + ord('A');
				
				$vigenereCipher[$i] = chr($chr);

			} else {
				$dec = ($aInv * ( ord($affineCipher[$i]) - ord('a') ) ) - ($aInv * $affineK2);
				$mod = $dec % 26;
				if ($mod < 0 ) {
					$mod += 26;
				}
                $chr = $mod + ord('a');
				
				$vigenereCipher[$i] = chr($chr);
			}
        } else {
            $vigenereCipher .= (string)$affineCipher[$i];
        }
    }
    return $vigenereCipher;
}

function steganoRecover($steganoImage) {
	// Read the file into memory.
    $img = imagecreatefrompng($steganoImage['tmp_name']);

    // Read the message dimensions.
    $width = imagesx($img);
    $height = imagesy($img);

    // Set the message.
    $binaryMessage = '';

    // Initialise message buffer.
    $binaryMessageCharacterParts = [];

    for ($y = 0; $y < $height; $y++) {
        for ($x = 0; $x < $width; $x++) {

            // Extract the colour.
            $rgb = imagecolorat($img, $x, $y);
            $colors = imagecolorsforindex($img, $rgb);

            $red = $colors['red'];
            $green = $colors['green'];
            $blue = $colors['blue'];

            // Convert the blue to binary.
            $binaryRed = decbin($red);
            $binaryGreen = decbin($green);
            $binaryBlue = decbin($blue);

            // Extract the least significant bit into out message buffer..

            $binaryMessageCharacterPartsRed[] = $binaryRed[strlen($binaryRed) - 1];
            $binaryMessageCharacterPartsGreen[] = $binaryGreen[strlen($binaryGreen) - 1];
            $binaryMessageCharacterPartsBlue[] = $binaryBlue[strlen($binaryBlue) - 1];


            if (count($binaryMessageCharacterPartsRed) == 8) {
                // If we have 8 parts to the message buffer we can update the message string.
                $binaryCharacter = implode('', $binaryMessageCharacterPartsRed);
                $binaryMessageCharacterPartsRed = [];
                if ($binaryCharacter == '00000011') {
                    // If the 'end of text' character is found then stop looking for the message.
                    break 2;
                } else {
                    // Append the character we found into the message.
                    $binaryMessage .= $binaryCharacter;
                }
            }
            if (count($binaryMessageCharacterPartsGreen) == 8) {
                // If we have 8 parts to the message buffer we can update the message string.
                $binaryCharacter = implode('', $binaryMessageCharacterPartsGreen);
                $binaryMessageCharacterPartsGreen = [];
                if ($binaryCharacter == '00000011') {
                    // If the 'end of text' character is found then stop looking for the message.
                    break 2;
                } else {
                    // Append the character we found into the message.
                    $binaryMessage .= $binaryCharacter;
                }
            }
            if (count($binaryMessageCharacterPartsBlue) == 8) {
                // If we have 8 parts to the message buffer we can update the message string.
                $binaryCharacter = implode('', $binaryMessageCharacterPartsBlue);
                $binaryMessageCharacterPartsBlue = [];
                if ($binaryCharacter == '00000011') {
                    // If the 'end of text' character is found then stop looking for the message.
                    break 2;
                } else {
                    // Append the character we found into the message.
                    $binaryMessage .= $binaryCharacter;
                }
            }
        }
    }

    // Convert the binary message we have found into text.
    $message = '';
    for ($i = 0; $i < strlen($binaryMessage); $i += 24) {
        $character = mb_substr($binaryMessage, $i, 24);
        $message .= chr(bindec($character));
    }

    return $message;
}

if (!empty($_FILES['steganoImage']['tmp_name'])) {

    $vigenereKey = $_POST['vigenereKey'];
    $affineK1 = $_POST['affineK1'];
    $affineK2 = $_POST['affineK2'];
    
    $vigenereKey = str_replace(' ', '', $vigenereKey);
    $affineCipher = steganoRecover($_FILES['steganoImage']);
    $vigenereCipher = decryptAffine($affineCipher, $affineK1, $affineK2);
    $plainText = decryptVigenere($vigenereCipher, $vigenereKey);
}
?>
