<?php
namespace Application\Controller;

use Application\Service\PostServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

 class ListController extends AbstractActionController
 {
     protected $postService;

     public function __construct(PostServiceInterface $postService)
     {
         $this->postService = $postService;
     }

     public function indexAction()
     {
         return new ViewModel(array(
             'posts' => $this->postService->findAllPosts()
         ));
     }
 }


