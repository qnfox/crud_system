<?php
require 'config.php';
require 'inc/db.php';
Db::connect();
if (isset($_GET['action']))
{
    $action = $_GET['action'];
    $table_name = $_POST['table_name'] ?? false;
    if (!$table_name){exit('select table');}
    if ($action == 'get_records')
    {
        $records = Db::select($table_name,'*','');
        require 'temp/records.php';
        Db::close();
        return;
    }
    elseif($action == 'get_add_form')
    {
        $table_fileds = Db::get_table_fileds($table_name);
        require 'temp/add_form.php';
        Db::close();
        return;
    }
    elseif($action == 'add_record')
    {
        unset($_POST['table_name']);
        echo Db::insert($table_name,$_POST) ? 'add record succiss' : 'add record faild';
        Db::close();
        return;
    }
    elseif($action == 'get_edit_form')
    {
        $record_id = $_POST['record_id'] ?? false;
        if (!$record_id){exit('select record_id');}
        $record = Db::select($table_name,'*',"WHERE `id`='$record_id'");
        if (count($record) == 0){exit('record not found');}
        $record = $record[0];
        require 'temp/edit_form.php';
        return;
    }
    elseif($action == 'edit_record')
    {
        $record_id = $_POST['record_id'] ?? false;
        if (!$record_id){exit('select record_id');}
        unset($_POST['table_name']);unset($_POST['record_id']);
        echo Db::update($table_name,$_POST,$record_id) ? 'edit record succiss' : 'edit record faild';
        Db::close();
        return;
    }
    elseif($action == 'delete_record')
    {
        $record_id = $_POST['record_id'] ?? false;
        if (!$record_id){exit('select record_id');}
        echo Db::delete($table_name,$record_id) ? 'delete record succiss' : 'delete record faild';
        Db::close();
        return;
    }
}
