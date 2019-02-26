<?php namespace App\Models\Concrete\Doctrine;

/**
 * Implements IGenericRepository
 * @package Application
 * @author Byron Beleris
 */

use App\Models\Contracts\IOrderable;
use \App\Models\Contracts\Repositories\IGenericRepository;
use App\Models\Objects\Entities\Form;
use LaravelDoctrine\ORM\Facades\EntityManager as EntityManager;
use Doctrine\ORM\QueryBuilder as Query;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;
use Input;
use App\Helpers\SettingHelper;
use \App\Models\Objects\Entities\Setting;
use \App\Helpers\DateHelper;

class DtGenericRepository implements IGenericRepository
{
    public $type;
    
    public function GetAll()
    {
        return $this->GetEntityRepository()->findAll();
    }

    public function GetById( $id )
    {
        if( is_numeric( $id ) )
        {
            return $this->GetEntityRepository()->findOneBy( array( "id" => $id ) );
        }
        return null;
    }
    
    public function Create( $entity )
    {
        EntityManager::persist( $entity );
        EntityManager::flush();
        return $entity;
    }
    
    public function Delete( $id )
    {
        if( is_numeric( $id ) )
        {
            $dbEntity = $this->GetEntityRepository()->findOneBy( array( "id" => $id ) );
            if( $dbEntity )
            {
                EntityManager::remove( $dbEntity );
                EntityManager::flush();
            }
        }
    }
    
    public function DeleteMultiple( $entities )
    {
        EntityManager::remove( $entities );
        EntityManager::flush();
    }
    
    public function Update( $entity )
    {
        EntityManager::persist( $entity );
        EntityManager::flush();
        return $entity;
    }

    public function MassUpdate( $entityArray )
    {
        foreach ($entityArray as $entity)
        {
            EntityManager::persist( $entity );
        }

        EntityManager::flush();
        return $entityArray;
    }
    
    /**
     * @return \Doctrine\ORM\EntityRepository
     */
    public function GetEntityRepository( $name = null )
    {
        if( is_null( $name ) )
        {
            $name = $this->type;
        }
         
        return EntityManager::getRepository( $name );
    }

    /**
     * @return \Doctrine\ORM\EntityManagerInterface|\Doctrine\ORM\EntityManager
     */
    public function GetEntityManager()
    {
        return \App::make('Doctrine\ORM\EntityManagerInterface');
    }
    
    public function GetEntityName()
    {
        return $this->type;
    }


}