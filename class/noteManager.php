<?php
require_once "database.php";
class noteManager
{  
  /*function selectAllNote()
  {
      return 'SELECT title, description, content FROM note';
  } */

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

  /* Fonction qui permet de recuperer TOUTES les données des notes sous forme d'un tableau */
  function listAllNote(){
      $bdd = new database();
      $bdd->connexion();
      $query = $bdd->getBdd()->prepare('SELECT title, description, content FROM note');

      echo '<table>';
      echo '<tr>';
      echo '<th>'. "Titre".'</tr>';
      echo '<th>'. "Description".'</tr>';
      echo '<th>'. "Contenu".'</tr>';
      echo '<tr>';

      while ($data = $query->fetch()){
          echo '<tr>';
          echo '<th>'.$data['title'].'</tr>';
          echo '<th>'.$data['description'].'</tr>';
          echo '<th>'.$data['content'].'</tr>';
          echo '<th>'.'<a id="link_update_note" href="editNote.php?id='.$data['id'].'">'."Modifier".'</a>'.'</th>';
          echo '<th>'.'<a id="link_delete_note" href="member/deleteNote.php?id='.$data['id'].'">'."Supprimer".'</a>'.'</th>';
      }

      echo '</table>';
      $query->closeCursor();
  }


  // Fonction permettant de sauvegarder une note dans la BDD
  function saveNote(){
    $bdd = new database();
    $bdd->connexion();
    $query = $bdd->getBdd()->prepare('INSERT INTO note(title, description, content) VALUES(:title, :description, :content)');
    $array = array(
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content']);
    $query->execute($array);
    $query->closeCursor();
    header('Location: view/noteListe.php');
    echo 'La note est enregistrée';
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