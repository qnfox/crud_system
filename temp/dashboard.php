<?php
$tables = Db::get_tables();
?>
<nav class="navbar container d-flex-b">
    <div class="brand">Brand</div>
    <div class="dropdwon">
        <div class="toggler" onclick="$('.navbar .dropdwon .list').toggle(500)">الجداول</div>
        <ul class="list">
            <?php
            for ($i=0; $i < count($tables); $i++)
            { 
                echo "<li onclick=\"get_records('$tables[$i]')\">".$tables[$i]."</li>";
            }
            ?>
        </ul>
    </div>
</nav>

<div class="table_content"></div>

<div class="modal-box">
    <div class="modal">
        <div class="overlay"></div>
        <div class="content">
            <span class="close" onclick="$('.modal-box').hide(500)">close</span>
            <div class="form"></div>
            <div class="result"></div>
        </div>
    </div>
</div>

<footer>
    <b>&COPY <?=date('Y')?> By Alqnasfox</b>
    <div class="sochial">
        <a href="https://facebook.com/alqnasfox" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.youtube.com/@alqnasfox" target="_blank"><i class="fa-brands fa-youtube"></i></a>
        <a href="https://wa.me/+249115785634" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
        <a target="blank" href="https://sd.linkedin.com/in/alqnasfox"><i class="fa-brands fa-linkedin"></i></a>
    </div>
</footer>

<script>

let crud_data = {
    form_data:{}
}
function form_data(key,val)
{
    crud_data.form_data[key] =val
}

function log_message(message)
{
    $('.result').hide()
    $('.result').html(message)
    $('.result').show(500)
}

function get_records(table_name)
{
    $('.table_content').load('actions.php?action=get_records',{'table_name':table_name})
}

function get_add_form(table_name)
{
    $('.result').html('')
    $.post('actions.php?action=get_add_form',{'table_name':table_name},function(response)
    {
        $('.modal .form').html(response)
        $('.modal-box').show(500);
    })
}

function add_record(table_name)
{
    var data = crud_data.form_data
    data['table_name'] = table_name;
    $.post('actions.php?action=add_record',data,function(response)
    {
        get_records(table_name)
        log_message(response)
    })
}

function get_edit_form(table_name,record_id)
{
    $('.result').html('')
    var data = {'table_name':table_name,'record_id':record_id};
    $.post('actions.php?action=get_edit_form',data,function(response)
    {
        $('.modal .form').html(response)
        $('.modal-box').show(500);
    })
}

function edit_record(table_name,record_id)
{
    var data = crud_data.form_data
    data['table_name'] = table_name;
    data['record_id'] =record_id;
    $.post('actions.php?action=edit_record',data,function(response)
    {
        get_records(table_name)
        log_message(response)
    })
}

function delete_record(table_name,record_id)
{
    var data = {}
    data['table_name'] = table_name;
    data['record_id'] = record_id;
    $.post('actions.php?action=delete_record',data,function(response)
    {
        get_records(table_name)
        alert(response)
    })
}
</script>