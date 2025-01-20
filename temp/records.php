<div class="header container d-flex-b">
    <h2><?=$table_name?></h2>
    <button class="btn" onclick="get_add_form('<?=$table_name?>')">add</button>
</div>
<?php
echo '<div class="records container">';
for ($i=0; $i < count($records); $i++) { 
    $id = $records[$i]['id'];
    echo "<div class='record'>";
    foreach($records[$i] as $key => $value)
    {
        echo "
            <div class='key'>$key</div>
            <div class='value'>$value</div>";
    }
    echo "<div class='actions d-flex-b'>
        <button class='btn edit' onclick=\"get_edit_form('$table_name',$id)\">Edit</button>
        <button class='btn delete' onclick=\"delete_record('$table_name',$id)\">delete</button>
    </div>";
    echo "</div>";
}
echo '</div>';