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
    /**
     * Metodo encargado de buscar todos los objetos de la tabla
     */
    public function findAll();
    /**
     * Metodo el cual busca objectos mediante un ejemplo
     * @param type $object
     */
    public function findByExample($object);
    /**
     * Busqueda realizada mediante un ID
     * @param type $id
     */
    public function findByID($id);
    /**
     * Busqueda mediante un parámetro (cohicidencias)
     * @param type $name
     */
    public function findLikeAtrr($name);
    /**
     * Metodo el cual guarda un objeto en la base de datos
     * @param type $object
     */
    public function save($object);
    /**
     * Método encargado de actualizar un objeto
     * @param type $object
     */
    public function update($object);
}

?>
