<?php

interface Model
{
    public function insert($data);
    public function update($data, $id);
    public function select($data);
    public function delete();
}