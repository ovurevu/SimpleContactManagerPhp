<?php

class QueryBuilder {
    protected PDO $pdo; //Using type hinting

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    //Select All Query Function
    public function selectAll($table){
        $statement= $this->pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    //Select one by Id query function
    public function selectById($table, $id_column, $id_value){
        $sql = "SELECT * FROM {$table} WHERE {$id_column} = {$id_value}"; // Prepare a select statement
        $statement = $this->pdo->prepare($sql);  //Prepare Query
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    //Insert function
    public function insert($table, $parameters){
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':'.implode(', :', array_keys($parameters))
        );
        $statement = $this->pdo->prepare($sql);
        return $statement->execute($parameters);
    }

    //Update Function
    public function update($table, $id_column, $id_value, $parameters){
        $new_array = array_map(function ($key, $val){
            return $key." = '".$val."'" ;
        }, array_keys($parameters), array_values($parameters));
        $sql = sprintf(
            'update %s set %s where %s',
            $table,
            implode(', ', $new_array),
            $id_column.' = '.$id_value);
        $statement = $this->pdo->prepare($sql);
        return $statement->execute(); //would return true(success) or false(failure)
    }

    //Delete function
    public function delete($table, $id_column, $id_value){
        $sql = "delete from {$table} where {$id_column} = {$id_value}"; //Prepare SQL query
        $statement = $this->pdo->prepare($sql); //Prepare Query
        return $statement->execute(); //would return true(success) or false(failure)
    }
}