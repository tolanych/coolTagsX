<?php

    $case = '
    <head>
    <title>Привет, #sam_sung</title>
    </head>
    <body>
    <p>
    <input value="#sams2ung">#samsung, как #делишки у тебя?</input>
    </p>
    <p>#samsong</p>
    </body>';

    preg_match('/<body.*\/body>/s',$case,$matches);


    if ($matches) {
        $out = $matches[0];
    } else {
        $out = $case;
    }

    $re = '/#[\w]{1,}(?=(?:[^"]*"[^"]*")*[^"]*$)/mu';

    preg_match_all($re, $out, $matches);

    var_dump($matches);

?>