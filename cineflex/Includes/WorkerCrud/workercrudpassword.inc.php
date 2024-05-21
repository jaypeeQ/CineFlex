<?php

$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
$pass = array();
$alphaLength = strlen($alphabet) - 1;
for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
}
$password = implode($pass);
?>

<div class="mb-3 mt-3">
    <label class="form-label">Generated Password: </label>
    <input type="text" class="form-control" name="password" value="<?= $password ?>"
           placeholder="Password will be generated here" required>
</div>
