<?php namespace App\Models\Contracts\Repositories;

/**
 * Interace IGenericRepository
 * @package Application
 * @author Byron Beleris
 */

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder as Query;

interface IGenericRepository
{
    /**
     * Gets all records
     * @return \Doctrine\Common\Collections\ArrayCollection A collection
     */
    function GetAll();
    
    /**
     * Gets a record by the id
     * @param integer $id The id of the record
     * @return mixed
     */
    function GetById( $id );
    
    /**
     * Creates a Record
     * @param mixed $entity
     * @return mixed
     */
    function Create( $entity );

    /**
     * Updates a Record
     * @param mixed $entity
     * @return mixed
     */
    function Update( $entity );

    /**
     * Updates Multiple records
     * @param array $entityArray
     */
     function MassUpdate( $entityArray );
    
    /**
     * Deletes a Record
     * @param int $id
     */
    function Delete( $id );
    
    /**
     * Deletes multiple records
     * @param array $entities
     */
    function DeleteMultiple( $entities );
    
    /**
     * Gets an entity manager repository
     * @param string $name
     */
    function GetEntityRepository( $name = null );
    
    /**
     * Gets an entity manager
     * @return EntityManagerInterface
     */
    function GetEntityManager();

            
}
?>
