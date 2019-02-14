<?php

class Note
{
    private $id;
    private $title;
    private $description;
    private $content;


// Getter 
    public function getTitle(){
        return $this->_title;
    }
    public function getDescription() {
        return $this->_description;
    }
    public function getContent() {
        return $this->_content;
    }

// Setter
public function setTitle($title) {
    if($title == "") {
        throw new Exception("You need a title for your note");
        return;
    }else if(strlen($title) >= 50){
        throw new Exception("Your title needs to be shorter");
    }
    $this->_title = $title;
    }

public function setDescription($description) {
    if($description == "") {
        throw new Exception("You need a description for this note");
        return;
    }else if(strlen($description) >= 20){
        throw new Exception("The description is limited at 20 characters")
    }
    $this->_noteDescription = $noteDescription;
}
public function setContent($content) {
    if($content == "") {
        throw new Exception("It's empty here, maybe start writting ?");
        return;
    }
    $this->_noteContent = $noteContent;
}