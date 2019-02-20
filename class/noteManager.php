<?php
require_once "database.php";
class noteManager
{  

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
      $query = $bdd->getBdd()->prepare('SELECT title, description, content, save_date FROM note WHERE id=id');

      echo '<table class="noteTable">';
      echo '<tr>';
      echo '<th>'."Titre".'</th>';
      echo '<th>'."Description".'</th>';
      echo '<th>'."Date".'</th>';
      echo '</tr>';

      while ($data = $query->fetch()){
          echo '<tr>';
          echo '<th>'.$data['title'].'</th>';
          echo '<th>'.$data['description'].'</th>';
          echo '<th>'.$data['save_date'].'</th>';
          echo '<th>'.'<a id="link_update_note" href="editNote.php?id='.$data['id'].'">'."Modifier".'</a>'.'</th>';
          echo '<th>'.'<a id="link_delete_note" href="member/deleteNote.php?id='.$data['id'].'">'."Supprimer".'</a>'.'</th>';
      }
      var_dump($data);
      echo '</table>';
      $query->closeCursor();
  }


  /* Fonction permettant de sauvegarder une note dans la BDD */
  function saveNote(){
    $bdd = new database();
    $bdd->connexion();
    // L'auteur de la note correspond a l'email de la session de l'utilisateur connecté
    $query = $bdd->getBdd()->prepare('INSERT INTO note(note_author, title, description, content) VALUES(:note_author, :title, :description, :content)');
    $array = array( 'note_author' => $_SESSION['email'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content']);
    $query->execute($array);
    $query->closeCursor();

    // Requête permettant de lier les notes aux utilisateurs l'ayant écrit.
    echo 'La note est enregistrée';  // ne fonctionne pas
    header('Location: noteListe.php');   
  }


  /* Fonction de modification de la note */
  function modifyNote(){
    $bdd = new database();
    $bdd->connexion();
    // L'auteur de la note correspond a l'email de la session de l'utilisateur connecté
    // On met à jour les données selons les modifications apportées dans les champs d'écriture
    $query = $bdd->getBdd()->prepare('UPDATE note SET title= :title, description= :description, content= :content WHERE note_author= :note_author');
    $array = array( 'note_author' => $_SESSION['email'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content']);
    $query->execute($array);
    $query->closeCursor();

    // Requête permettant de lier les notes aux utilisateurs l'ayant écrit.
    echo 'La modification a été prise en compte';  // ne fonctionne pas
    header('Location: noteListe.php'); 
  }


  /* Fonction qui permet la suppression d'une note choisi au préalable */
  function deleteNote(){
    $bdd = new database();
    $bdd->connexion();
    // L'auteur de la note correspond a l'email de la session de l'utilisateur connecté
    $query = $bdd->getBdd()->prepare('DELETE FROM note WHERE id= :id'); // fonction à corriger
    $query->closeCursor();
    
    // Requête permettant de lier les notes aux utilisateurs l'ayant écrit.
    echo 'La note a été supprimé';  // ne fonctionne pas
    header('Location: noteListe.php'); 
  }
  
  
  
  
}