<?php

class Model
{
    public static function select($champ, $table, $order, $limite, $where, $protectWhere)
    {
        require "pdo.php";
        $rq = $pdo->prepare("SELECT $champ FROM $table $order $limite $where");
        if ($protectWhere === "") {
            $rq->execute();
        } else {
            $rq->execute($protectWhere);
        }
        return $rq;
    }
    public static function insert($table, $champ, $values, $protectWhere)
    {
        require "pdo.php";
        $rq = $pdo->prepare("INSERT INTO $table ($champ) VALUES ($values)");
        $rq->execute($protectWhere);
    }
    //public static function update ($champ, $table, $values, $where){
    //$rq = $pdo->query("UPDATE $table SET $champ($values) $where );
    //}

}
