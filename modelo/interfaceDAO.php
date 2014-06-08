<?php

/*
 * Interface que contiene métodos los cuales debieran de tener
 * las clases DAO
 */

/**
 *
 * @author Renato
 */
interface interfaceDAO {
    //put your code here
    public function findAll();
    public function finByExample($object);
    public function findByID($id);
    public function findLikeName($name);
}

?>
