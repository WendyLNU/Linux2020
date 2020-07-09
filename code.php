<?

session_start();

require "_config.php";

$line_colors = preg_split("/,\s*?/", CODE_LINE_COLORS);
$char_colors = preg_split("/,\s*?/", CODE_CHAR_COLORS);
$fonts = collect_files(PATH_TTF, "ttf");

//imagecreatetruecolor -- 新建一个真彩色图像
//resource imagecreatetruecolor ( int x_size, int y_size)
//imagecreatetruecolor() 返回一个图像标识符，代表了一幅大小为 x_size 和 y_size 的黑色图像。 
$img = imagecreatetruecolor(CODE_WIDTH, CODE_HEIGHT);

//imagefilledrectangle -- 画一矩形并填充
//bool imagefilledrectangle ( resource image, int x1, int y1, int x2, int y2, int color )
//imagefilledrectangle() 在 image 图像中画一个用 color 颜色填充了的矩形，其左上角坐标为 x1，y1，右下角坐标为 x2，y2。0, 0 是图像的最左上角。 
imagefilledrectangle($img, 0, 0, CODE_WIDTH - 1, CODE_HEIGHT - 1, gd_color(CODE_BG_COLOR));

//$fonts = imageloadfont($fonts);

// Draw lines

for ($i = 0; $i < CODE_LINES_COUNT; $i++)
    imageline($img,
        rand(0, CODE_WIDTH - 1),
        rand(0, CODE_HEIGHT - 1),
        rand(0, CODE_WIDTH - 1),
        rand(0, CODE_HEIGHT - 1),
        gd_color($line_colors[rand(0, count($line_colors) - 1)])
    );


// Draw code

$code = "";
$y = (CODE_HEIGHT / 2) + (CODE_FONT_SIZE / 2);
for ($i = 0; $i < CODE_CHARS_COUNT; $i++) {
    $color = gd_color($char_colors[rand(0, count($char_colors) - 1)]);
    $angle = rand(-30, 30);
    $char = substr(CODE_ALLOWED_CHARS, rand(0, strlen(CODE_ALLOWED_CHARS) - 1), 1);
    $font = PATH_TTF . "/" . $fonts[rand(0, count($fonts) - 1)];
    $x = (intval((CODE_WIDTH / CODE_CHARS_COUNT) * $i) + (CODE_FONT_SIZE / 2));
    $code .= $char;
	//写 TTF 文字到图中
    imagettftext($img, CODE_FONT_SIZE, $angle, $x, $y, $color, $font, $char);
}

$_SESSION['__img_code__'] = md5($code);

//提示用户保存一个生成的 png文件（Content-Disposition 报头用于提供一个推荐的文件名，并强制浏览器显示保存对话框）
header("Content-Type: /images/png");
/*ImagePNG

建立 PNG 图型。

语法: int imagepng(int im, string [filename]);

返回值: 整数

函数种类: 图形处理

内容说明

本函数用来建立一张 PNG 格式图形。参数 im 为使用 ImageCreate() 所建立的图片代码。参数 filename 可省略，若无本参数 filename，则会将图片指接送到浏览器端，记得在送出图片之前要先送出使用 Content-type: image/png 的标头字符串 (header) 到浏览器端，以顺利传输图片。本函数在 PHP 3.0.13 版之后才支持。*/
//imagepng($img,"02.png");
imagepng($img);
//imagedestroy — 销毁一图像
imagedestroy($img);


function gd_color($html_color) {
    return preg_match('/^#?([\dA-F]{6})$/i', $html_color, $rgb)
      ? hexdec($rgb[1]) : false;
}


function collect_files($dir, $ext) {
    if (false !== ($dir = opendir($dir))) {
        $files = array();

        while (false !== ($file = readdir($dir)))
            if (preg_match("/\\.$ext\$/i", $file))
                $files[] = $file;

        return $files;

    } else
        return false;
}

?>