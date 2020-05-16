<form method="post">
    <input type="submit" id="1" name="idVal" value="a" class"navbtnplace">
    <input type="submit" id="2" name="idVal" value="b" class"navbtnplace">
    <input type="submit" id="3" name="idVal" value="c" class"navbtnplace">
    <input type="submit" id="4" name="idVal" value="d" class"navbtnplace">
</form>

<?php

if(isset($_REQUEST['idVal'])) {
    ext($_REQUEST['idVal']);
}

function ext($id) {
   echo $id;
}