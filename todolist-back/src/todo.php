<?php

class Todo
{
    private string $_title;
    private string $_description;
    private int $_id;
    private int $_listId;
    private bool $_done = false;

    /**
     * Commentaire PHPDoc
     * @param string $t Le titre de la tâche
     * @param string $d La description de la tâche
     * @return void 
    !*/

    function __construct(string $t, string $d)
    {
        $this->_title = $t;
        $this->_description = $d;
    }

    /**
     * Commentaire PHPDoc
     * @return string Le titre de la tâche 
    !*/

    public function getTitle(): string
    {
        return $this->_title;
    }

    /**
     * Commentaire PHPDoc
     * @return string La description de la tâche 
    !*/

    public function getDescription(): string
    {
        return $this->_description;
    }

    /**
     * Commentaire PHPDoc
     * @return bool true si la tâche est effectuée sinon false 
    !*/

    public function getDone(): bool
    {
        return $this->_done;
    }

    /**
     * Commentaire PHPDoc
     * @return int L'id de la tâche 
    !*/

    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * Commentaire PHPDoc
     * @return int L'id de la liste contenant la tâche 
    !*/

    public function getListId(): int
    {
        return $this->_listId;
    }

    /**
     * Commentaire PHPDoc
     * @param string $name Le nom de l'attribut
     * @param mixed $value La nouvelle valeur de l'attribut
     * @return void
    !*/

    public function __set(string $name, mixed $value)
    {
        if (is_string($value) and $name == '_title' or $name == '_description') {
            $this->$name = $value;
        } elseif ($name == '_done' and $value == 'true' or $value == 'false') {
            $this->$name = $value;
        } else {
            throw new \Exception('Not implemented');
        }
    }
}
