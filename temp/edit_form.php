<form action="" class="form" onsubmit="return false">
<?php
foreach ($record as $key => $value) {
    echo "<input type='text' placeholder='$key' value='$value' onchange=\"form_data('$key',this.value)\">";
}
?>
<button class="btn" onclick="edit_record('<?=$table_name?>',<?=$record['id']?>)">Edit</button>
</form>