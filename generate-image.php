<?php
$path=__DIR__ . '/skillshup/public/uploads/skills';
$start=1;
$end=40;
$ext='png';
for($i = $start ; $i<=$end;$i++){
    copy("$path/$i.$ext","$path/$i.$ext");
    echo "img $i.$ext add successful";
}
?>