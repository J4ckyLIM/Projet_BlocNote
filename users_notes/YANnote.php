<?php

Class YANnote {
    protected $_noteTitle;
    protected $_noteDescription;
    protected $_noteContent;



    public function __construct($noteTitle,$noteDescription, $noteContent){
        $this->setName($noteTitle);
        $this->setHP($noteDescription);
        $this->setAttack($noteContent);
    }

// Getter 
    public function getNoteTitle(){
        return $this->_noteTitle;
    }
    public function getNoteDescription() {
        return $this->_noteDescription;
    }
    public function getNoteContent() {
        return $this->_noteContent;
    }

// Setter
public function setNoteTitle($noteTitle) {
    if($noteTitle == "") {
        throw new Exception("You need a title for your note");
        return;
    }
    $this->_noteTitle = $noteTitle;
    }

public function setNoteDescription($noteDescription) {
    if($noteDescription == "") {
        throw new Exception("You need a description for this note");
        return;
    }
    $this->_noteDescription = $noteDescription;
}
public function setNoteContent($noteContent) {
    if($noteContent == "") {
        throw new Exception("It's empty here, maybe start writting ?");
        return;
    }
    $this->_noteContent = $noteContent;
}

public function displayNote(){
    // fonction d'affichage de la note -> titre/description/contenu
}

public function saveNote(){
    // fonction pour sauvegarder tout le contenu de la note
}