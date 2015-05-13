<?php
namespace Application\Service;

use Application\Model\PostInterface;

interface PostServiceInterface
 {
     public function findAllPosts();

     public function findPost($id);
 }
