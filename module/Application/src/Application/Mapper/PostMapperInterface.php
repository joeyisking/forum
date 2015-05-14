<?php
namespace Application\Mapper;

 use Application\Model\PostInterface;

 interface PostMapperInterface
 {
     /**
      * @param int|string $id
      * @return PostInterface
      * @throws \InvalidArgumentException
      */
     public function find($id);

     /**
      * @return array|PostInterface[]
      */
     public function findAll();
 }
