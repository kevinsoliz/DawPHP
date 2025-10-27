<style>
    body {
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif
    }
</style>
<h1>Este contador va del 1 al 100</h1>
<p>Se ha utilizado un bucle for</p>
<?php
for ($i = 1; $i <= 100; $i++) {
    echo "$i, ";
}
?>
<br>
<h1>Este contador va del 10 al 0</h1>
<p>Se ha utilizado un bucle while</p>
<?php
$contador = 10;
while ($contador > 0) {
    echo "$contador-";
    $contador--;
}
?>