<?php
namespace Levelab\Model\BlogEntry\Values;

class BlogEntryContent {
    private $title;
    private $description;
    private $content;

    public function __construct($title, $description, $content) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }
} 