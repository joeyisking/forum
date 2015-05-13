<?php
namespace Application\Mapper;

use Application\Model\PostInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Sql;
use Zend\Stdlib\Hydrator\HydratorInterface;
 
class ZendDbSqlMapper implements PostMapperInterface
 {
	 protected $hydrator;
     protected $postPrototype;
     protected $dbAdapter;

     public function __construct(
   		 AdapterInterface $dbAdapter,
         HydratorInterface $hydrator,
         PostInterface $postPrototype
     ) 
	 {
         $this->dbAdapter      = $dbAdapter;
         $this->hydrator       = $hydrator;
         $this->postPrototype  = $postPrototype;
     }

     public function find($id)
     {
         $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('posts');
         $select->where(array('id = ?' => $id));

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();

         if ($result instanceof ResultInterface && $result->isQueryResult() && $result->getAffectedRows()) {
             return $this->hydrator->hydrate($result->current(), $this->postPrototype);
         }

         throw new \InvalidArgumentException("Blog with given ID:{$id} not found.");
     }

     public function findAll()
     {
		 $sql    = new Sql($this->dbAdapter);
         $select = $sql->select('posts');

         $stmt   = $sql->prepareStatementForSqlObject($select);
         $result = $stmt->execute();

         if ($result instanceof ResultInterface && $result->isQueryResult()) {
             $resultSet = new HydratingResultSet(new \Zend\Stdlib\Hydrator\ClassMethods(), new \Blog\Model\Post());

             return $resultSet->initialize($result);
         }

         return array();
     }
 }
