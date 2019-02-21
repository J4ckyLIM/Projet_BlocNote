<?php
require_once "database.php";
class noteManager
{  
  function selectNote(){
    $bdd = new database();
    $bdd->connexion();
    $id = $_GET['id'];
    $query = $bdd->getBdd()->prepare('SELECT title, description, content FROM note WHERE id=:id');
    $array = array( 'id' => $id);
    $query->execute($array);
    if ($data = $query->fetch())
    {
      echo '<form action="index.php?page=notePage?id='.$data['id'].'" method="post">';
      echo '<input type="text" name="title_update" value="'.$data['title'].'"/>'.'</br>'.'</br>';
      echo '<input type="text" maxlength="20"name="description_update" value="'.$data['description'].'"/>'.'</br>'.'</br>';
      echo '<input type="text" name="content_update" value="'.$data['content'].'"/>'.'</br>'.'</br>';
      echo '<input type="submit" name="note_update" value="Modifier"/>';
      echo '</form>';
    }
    else
    {
      echo '<p>'."Aucun résultat trouvé.".'</p>';
    }
    $query->closeCursor();
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
      $query = $bdd->getBdd()->prepare('SELECT id, title, description, save_date FROM note WHERE note_author=:id');
      $array = array( 'id' => $_SESSION['id']);
      $query->execute($array);

      echo '<table class="noteTable">';
      echo '<tr>';
      echo '<th class="table-info">'."Titre".'</th>';
      echo '<th class="table-info">'."Description".'</th>';
      echo '<th class="table-info">'."Date".'</th>';
      echo '<th class="action">'.'<i class="fas fa-pencil-alt">'.'</i>'.'</th>';
      echo '<th class="action">'.'<i class="fas fa-trash-alt">'.'</i>'.'</th>';
      echo '</tr>';

      while ($data = $query->fetch()){
          echo '<tr>';
          echo '<th>'.$data['title'].'</th>';
          echo '<th>'.$data['description'].'</th>';
          echo '<th>'.$data['save_date'].'</th>';
          echo '<th>'.'<a id="link_update_note" href="index.php?page=noteListe?id='.$data['id'].'">'.'<input type="submit" class="btn-action" value="Modifier">'.'</a>'.'</th>';
          echo '<th>'.'<a id="link_delete_note" href="member/deleteNote.php?id='.$data['id'].'">'.'<button class="btn-action3" type="button" value="delete">'.'Supprimer'.'</button>'.'</a>'.'</th>';
      }
      echo '</table>';
      $query->closeCursor();
  }


  /* Fonction permettant de sauvegarder une note dans la BDD */
  function saveNote(){
    $bdd = new database();
    $bdd->connexion();
    // L'auteur de la note correspond a l'email de la session de l'utilisateur connecté
    $query = $bdd->getBdd()->prepare('INSERT INTO note(note_author, title, description, content) VALUES(:note_author, :title, :description, :content)');
    $array = array( 'note_author' => $_SESSION['id'],
                    'title' => $_POST['title'],
                    'description' => $_POST['description'],
                    'content' => $_POST['content']);
    $query->execute($array);
    $query->closeCursor();

    // Requête permettant de lier les notes aux utilisateurs l'ayant écrit.
    echo 'La note est enregistrée';  // ne fonctionne pas
    header('Location: index.php?page=noteListe');   
  }


  /* Fonction de modification de la note */
  function modifyNote(){
    $bdd = new database();
    $bdd->connexion();
    // L'auteur de la note correspond a l'email de la session de l'utilisateur connecté
    // On met à jour les données selons les modifications apportées dans les champs d'écriture
    $query = $bdd->getBdd()->prepare('UPDATE note SET title= :title, description= :description, content= :content WHERE note_author= :note_author');
    $array = array( 'note_author' => $_SESSION['id'],
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