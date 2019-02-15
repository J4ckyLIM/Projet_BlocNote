    <?php

    function listAllMember(){
        $bdd = new database();
        $bdd->connexion();
        $query = $bdd->getBdd()->query($bdd->selecAllMember());

        echo '<table>';
        echo '<tr>';
        echo '<th>'. "ID".'</tr>';
        echo '<th>'. "Nom".'</tr>';
        echo '<th>'. "Prénom".'</tr>';
        echo '<th>'. "E-mail".'</tr>';
        echo '<tr>';

        while ($data = $query->fetch()){
            echo '<tr>';
            echo '<th>'.$data['id'].'</tr>';
            echo '<th>'.$data['lastName'].'</tr>';
            echo '<th>'.$data['firstName'].'</tr>';
            echo '<th>'.$data['email'].'</tr>';
            echo '<th>'.'<a id="link_update_member" href="edit.php?id='.$data['id'].'">'."Modifier".'</a>'.'</th>';
            echo '<th>'.'<a id="link_delete_member" href="member/delete.php?id='.$data['id'].'">'."Supprimer".'</a>'.'</th>';
        }

        echo '</table>';
        $query->closeCursor();
    }