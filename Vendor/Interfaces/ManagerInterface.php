<?php

namespace Vendor\Interfaces;

interface ManagerInterface {

    public function create($article);

    public function getList();

    public function getOne($id);

    public function update($article,$id);

    public function delete($id);

}