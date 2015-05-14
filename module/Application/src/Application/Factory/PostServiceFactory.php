<?php
// Filename: /module/Blog/src/Blog/Factory/PostServiceFactory.php
namespace Application\Factory;

 use Application\Service\PostService;
 use Zend\ServiceManager\FactoryInterface;
 use Zend\ServiceManager\ServiceLocatorInterface;

 class PostServiceFactory implements FactoryInterface
 {
     /**
      * Create service
      *
      * @param ServiceLocatorInterface $serviceLocator
      * @return mixed
      */
     public function createService(ServiceLocatorInterface $serviceLocator)
     {
         return new PostService(
             $serviceLocator->get('Application\Mapper\PostMapperInterface')
         );
     }
 }
