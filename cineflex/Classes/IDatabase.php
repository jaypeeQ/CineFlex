<?php

namespace OOP\Database;

interface IDatabase
{
    public function SelectAll($table);
    public function SelectAllWhere($table, $where);
    public function insert();
    public function delete();
    public function update();
}