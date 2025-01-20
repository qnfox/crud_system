<?php
class Db
{
    public static $handler;
    static function connect()
    {
        global $db_host,$db_user,$db_pass,$db_name;
        self::$handler = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
        if (self::$handler)
        {
            mysqli_set_charset(self::$handler,'utf8');
            return true;
        }
        return false;
    }
    static function close()
    {
        if (self::$handler){mysqli_close(self::$handler);}
        return true;
    }

    static function excute(string $query)
    {
        return mysqli_query(self::$handler,$query);
    }
    static function fetch($result)
    {
        $data = [];
        while ($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }
        return $data;
    }
    static function get_tables()
    {
        global $db_name;
        $results = self::fetch(self::excute('show tables'));
        $tables = [];
        for ($i=0; $i < count($results); $i++)
        { 
            $tables[] = $results[$i]['Tables_in_'.$db_name];
        }
        return $tables;
    }
    static function get_table_fileds(string $table_name)
    {
        $fileds = [];//Field
        $results = self::fetch(self::excute("DESCRIBE `$table_name`"));
        for ($i=0; $i < count($results); $i++) { 
            $fileds[] = $results[$i]['Field'];
        }
        return $fileds;
    }
    static function insert(string $table_name,array $data)
    {
        $keys = '';
        $values = '';
        foreach ($data as $key => $value)
        {
            $keys.= "`$key`,";
            $values.= "'$value',";
        }
        $keys = substr($keys,0,-1);
        $values = substr($values,0,-1);
        return self::excute("insert into `$table_name` ($keys) values ($values)");
    }
    static function update(string $table_name,array $data,int $id)
    {
        $query = "update `$table_name` SET ";
        foreach ($data as $key => $value) {
            $query.= "`$key`='$value',";
        }
        $query = substr($query,0,-1) ."WHERE `id`='$id'";
        return self::excute($query);
    }
    static function select(string $table_name,string $colmuns,string $query_plus)
    {
        return self::fetch(self::excute("select $colmuns from `$table_name` $query_plus"));
    }
    static function delete(string $table_name,int $id)
    {
        return self::excute("delete from `$table_name` WHERE `id`='$id'");
    }
}