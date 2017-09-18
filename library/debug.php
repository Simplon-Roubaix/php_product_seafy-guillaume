<?php
function dd($variable){
    ?>
    <pre>
        <?php print_r($variable); ?>
    </pre>
    <?php
    die();
}