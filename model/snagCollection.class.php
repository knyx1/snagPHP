<?php
class snagCollection
{
    public $snags = array();
    
    public function __construct() {
        
    }
    
    public function addSnag(snag $snag) {
        $this->snags[$snag->id] = $snag;
    }
}