<?php

class Issue extends CI_Model{


  public $issue_id;
  public $issue_name;
  public $publication_id;
  public $issue_number;
  public $issue_date_publication;
  public $issue_cover;

  public function insert(){
    $this->db->insert('issues',$this);
    $this->issue_id=$thos->db->insert_id();
  }

  public function create(){
    $this->load->model('Issue');
    $issue->publication_id=$this->Publication->publication_id;
    $issue->issue_number=2;
    $issue->issue_date_publication=date('3-3-3');
    $issue->insert();
  }


}
?>
