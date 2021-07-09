<?php
namespace App\ReturnedData;



class  CommunityPost  {
    public  $post;
    public $comments;
    public $media;
    public $votes;
    public $user;
     public function __construct($post,$media,$votes,$user)
     {
         $this->post =$post;
         $this->media = $media;
         $this->votes = $votes;
         $this->user =$user;
     }

}
