<?php

$rhversion = "2.0.0";

$white    = "\033[97m";
$black    = "\033[30m\033[1m";
$yellow   = "\033[93m";
$orange   = "\033[38;5;208m";
$blue     = "\033[34m";
$lblue    = "\033[36m";
$cln      = "\033[0m";
$green    = "\033[92m";
$fgreen   = "\033[32m";
$red      = "\033[91m";
$magenta  = "\033[35m";
$bluebg   = "\033[44m";
$lbluebg  = "\033[106m";
$greenbg  = "\033[42m";
$lgreenbg = "\033[102m";
$yellowbg = "\033[43m";
$lyellowbg = "\033[103m";
$redbg    = "\033[101m";
$grey     = "\033[37m";
$cyan     = "\033[36m";
$bold     = "\033[1m";

function purple_gradient($text)
{
    $colors = [
        54,
        55,
        56,
        57,
        93,
        129,
        135,
        141,
        147
    ];

    $chars = str_split($text);
    $length = count($chars);

    if ($length === 0) {
        return "";
    }

    $output = "";

    for ($i = 0; $i < $length; $i++) {

        $char = $chars[$i];

        /*
         * Keep whitespace clean.
         */
        if ($char === " " || $char === "\n" || $char === "\r") {
            $output .= $char;
            continue;
        }

        $position = ($length > 1)
            ? $i / ($length - 1)
            : 0;

        $colorIndex = (int) round(
            $position * (count($colors) - 1)
        );

        $color = $colors[$colorIndex];

        $output .= "\033[38;5;" . $color . "m";
        $output .= $char;
    }

    $output .= "\033[0m";

    return $output;
}


function center_text($text, $width = 78)
{
    $length = strlen($text);

    if ($length >= $width) {
        return $text;
    }

    $padding = (int)(($width - $length) / 2);

    return str_repeat(" ", $padding) . $text;
}

function redhawk_banner()
{
    global $rhversion;
    $logo = [
        "         W   W  EEEEE  BBBB        EEEEE  AAAAA  GGGG   L      EEEEE",
        "         W   W  E      B   B       E      A   A  G      L      E",
        "         W W W  EEEE   BBBB        EEEE   AAAAA  G GGG  L      EEEE",
        "         W W W  E      B   B       E      A   A  G   G  L      E",
        "         W   W  EEEEE  BBBB        EEEEE  A   A  GGGG   LLLLL  EEEEE"
    ];

    echo "\033[0m";
    echo "\n";

    foreach ($logo as $line) {
        echo center_text(purple_gradient($line));
        echo "\n";
    }

    echo "\n";

    echo "\033[38;5;135m";
    echo center_text(
        ""
    );
    echo "\n";

    echo "\033[38;5;141m";
    echo center_text(
        "Web Security & Information Gathering Framework"
    );
    echo "\n";

    echo "\033[38;5;177m";
    echo center_text(
        "Website Scanning | Subdomain Scanning | CMS Detection"
    );
    echo "\n";

    echo "\033[38;5;177m";
    echo center_text(
        "SQL Injection | XSS | LFI | RCE | RFI | OSINT"
    );
    echo "\n";

    echo "\033[38;5;135m";
    echo center_text(
        "----------------------------------------------------------"
    );
    echo "\n";

    echo "\033[38;5;147m";
    echo center_text(
        "WEB EAGLE v" . $rhversion
    );
    echo "\n";

    echo "\033[38;5;141m";
    echo center_text(
        "ALBATANY | PUSH THE LIMITS!"
    );
    echo "\n";

    echo "\033[38;5;183m";
    echo center_text(
        "[$] Shout Out - You ;)"
    );
    echo "\n";

    echo "\033[38;5;135m";
    echo center_text(
        ""
    );
    echo "\n";

    echo "\033[0m";
    echo "\n";
}

redhawk_banner();

?>