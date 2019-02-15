<?php

class noteManager
{  
  function selectAllNote()
  {
      return 'SELECT * FROM note';
  }

  function selectNoteId()
  {
      return 'SELECT * FROM note WHERE id= :id';
  }

  function updateNoteId()
  {
      return 'UPDATE note SET title= :title, description= :description, content= :content WHERE id= :id';
  }

  function deleteNoteId()
  {
      return 'DELETE FROM note WHERE id= :id';
  }
 

  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  /*public function addNote(note $note)
  {
    $q = $this->_db->prepare('INSERT INTO note(title, description, content) VALUES(:title, :description, :content)');

    $q->bindValue(':title', $note->setLastName());
    $q->bindValue(':description', $note->setFirstName(), PDO::PARAM_INT);
    $q->bindValue(':content', $note->setEmail(), PDO::PARAM_INT);

    $q->execute();
  }

  public function delete(member $member)
  {
    $this->_db->exec('DELETE FROM member WHERE id = '.$member->getId());
  }

  // fonction pour récuperer un membre
  public function get($id)
  {
    $id = (int) $id;

    $q = $this->_db->query('SELECT id, lastName, firstName, email FROM member WHERE id = '.$id);
    $data = $q->fetch(PDO::FETCH_ASSOC);

    return new member($data);
  }
/*
  public function getList()
  {
    $member = [];

    $q = $this->_db->query('SELECT id, lastName, firstName, email FROM member ORDER BY id');

    while ($data = $q->fetch(PDO::FETCH_ASSOC))
    {
      $member[] = new member($data);
    }

    return $member;
  }

  */
}