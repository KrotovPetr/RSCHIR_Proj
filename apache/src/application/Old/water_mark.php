<?php
function create_water_mark($imageEx)
{
        $image1 = $imageEx;

        $image2 = 'images/water_mark.png';

        list($width, $height) = getimagesize($image2);
        $image1 = imagecreatefromstring(file_get_contents($image1));
        $image2 = imagecreatefromstring(file_get_contents($image2));
        imagealphablending($image2, false);
        imagesavealpha($image2, true);
        $alpha = round(127/255*127); 

        for ($x = 0; $x < $width; $x++) {
            for ($y = 0; $y < $height; $y++) {

                // get current color (R, G, B)
                $rgb = imagecolorat($image2, $x, $y);
                $r = ($rgb >> 16) & 0xff;
                $g = ($rgb >> 8) & 0xff;
                $b = $rgb & 0xff;

                // create new color
                $col = imagecolorallocatealpha($image2, $r, $g, $b, $alpha);

                // set pixel with new color
                imagesetpixel($image2, $x, $y, $col);
            }
        }
        imagecopy($image1, $image2, 50, 50, 0, 0, $width, $height);
        imagepng($image1, $imageEx);

}