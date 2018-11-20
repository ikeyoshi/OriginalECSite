<?php

function sanitize($before)
{
    foreach ($before as $key=>$value) {
        if (!is_array($value)) {
            $after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        } else {
            foreach ($value as $key2=>$value2) {
                $after2[$key2] = htmlspecialchars($value2, ENT_QUOTES, 'UTF-8');
            }
            $after[$key] = $after2;
        }
    }

    return $after;
}
// ランダムな文字列を生成 (英数字)
function makeRandStr($length)
{
    $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
    $r_str = null;
    for ($i = 0; $i < $length; $i++) {
        $r_str .= $str[mt_rand(0, count($str) - 1)];
    }

    return $r_str;
}
// ランダムな文字列を生成 (数字のみ)
function makeRandNum($length)
{
    for ($i = 0; $i < $length; $i++) {
        $num = round(mt_rand(0, 9));

        if ($i === 0 && $num === 0) {
            $num = round(mt_rand(1, 9));
        }

        $r_str .= $num;
    }

    return $r_str;
}
