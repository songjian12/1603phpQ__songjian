DB<?php
// namespace Model;
class DB
{

    function __construct()
    {

        $db=C('db');
        $host='mysql:host='.$db['host'].';dbname='.$db['dbname'].';charset='.$db['charset'].';';
        $username=$db['username'];
        $pwd=$db['password'];
        $pdo= new \PDO($host,$username,$pwd);

        return $pdo;
    }

    public function add($table,$values)
    {

        $pdo=$this->db();
        $val="";
        $bian="";
        foreach ($values as $k => $v) {
            $val.="`".$k."`".',';
            $bian.="'".$v."'".',';
        }
        $vals=rtrim($val,',');
        $binss=rtrim($bian,',');
        $sql="insert into $table ($vals) values($binss)";

        $gei=$pdo->exec($sql);
        return $gei;
    }

    public function select($table,$where = 1)
    {
        $pdo = $this->db();
        $sql = 'select * from '.$table.' where '.$where;
        $res = $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return $res;

    }
    public function selects($table)
    {
        $pdo = $this->db();
        $sql = "select * from $table";
        return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function delete($table,$where)
    {
        $pdo = $this->db();
        if(is_array($where)){
            foreach ($where as $key => $val) {

                $condition = $key.'='.$val;

            }
        } else {
            $condition = $where;
        }
        $sql = "delete from $table where id=$condition";
        //var_dump($sql);die;

        $pdo->query($sql);

        // return mysql_affected_rows($this->link);
    }
    public function deleteAll($table,$where)
    {
        if(is_array($where)){
            foreach ($where as $key => $val){
                if(is_array($val)){
                    $condition = $key.'in('.implode(',',$val).')';
                } else {
                    $condition =$key.'='.$val;
                }
            }
        } else{
            $condition = $where;
        }
        $sql = "delete from $table where $condition";
        var_dump($sql);die;
        $this->query($sql);
        return mysql_affected_rows($this->link);
    }


    // public function search($table,$val,$like)
    // {
    // $pdo=$this->db();
    // $where =" where 1";
    // $where.=" and $val like '%$like%'"
    // $sql = "select * from ".$table.$where;
    // var_dump($sql);die;
    // return $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);

    // }
    //

    public function selectes($table,$sou,$val)
    {
        $pdo = $this->db();
        // $sql = 'select * from '.$table.' where '.$where;
        // $res = $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        // return $res;
        $sql = "select * from ".$table." where ".$val." like "."'%".$sou."%'";
        // var_dump($sql);die;
        $res = $pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        //var_dump($res);die;
        return $res;
    }
}
