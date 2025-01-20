<form class="form" action="" method="post" onsubmit="return false">
<?php
for ($i=0; $i < count($table_fileds); $i++) { 
    echo "<input type='text' placeholder='$table_fileds[$i]' onchange=\"form_data('$table_fileds[$i]',this.value)\">";
}
echo "<button class='btn' onclick=\"add_record('$table_name')\">Add</button>";

?>
</form>