<?php
namespace Levelab\Model\BlogEntry\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Levelab\Model\BlogEntry\Values\BlogEntryContent;
use Levelab\Model\Core\Types\Author;
use Levelab\Model\Core\Types\Comment;
use Levelab\Model\Core\Types\Commentable;
use Levelab\Model\Core\Types\Container;
use Levelab\Model\BlogEntry\Values\BlogEntryId;
use Levelab\Model\Core\Types\Content;

class BlogEntry implements Content, Commentable {
    /**
     * @var BlogEntryId
     */
    private $id;
    /**
     * @var Author
     */
    private $author;
    /**
     * @var Container
     */
    private $thematic;
    /**
     * @var BlogEntryContent
     */
    private $content;
    /**
     * @var ArrayCollection
     */
    private $comments;

    /**
     * @param BlogEntryId $id
     * @param Author $author
     * @param Container $thematic
     * @param BlogEntryContent $content
     */
    public function __construct(BlogEntryId $id, Author $author, Container $thematic, BlogEntryContent $content) {
        $this->id = $id;
        $this->author = $author;
        $this->thematic = $thematic;
        $this->content = $content;
        $this->comments = new ArrayCollection();
    }

    /**
     * @return Author
     */
    public function getAuthor() {
        return $this->author;
    }

    /**
     * @return BlogEntryId
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return Container
     */
    public function getThematic() {
        return $this->thematic;
    }

    /**
     * @param Comment $comment
     */
    public function addComment(Comment $comment) {
        $this->comments->add($comment);
    }

    /**
     * @param Comment $comment
     * @throws \Exception
     */
    public function removeComment(Comment $comment) {
        $commentFound = $this->comments->filter(function(Content $existingComment) use($comment) {
            return $existingComment->getId()->compareAgainst($comment->getId());
        })->first();

        if(!$commentFound) {
            throw new \Exception;
        }
        else {
            $this->comments->removeElement($commentFound);
        }
    }

    /**
     * @param BlogEntryContent $content
     */
    public function setContent(BlogEntryContent $content) {
        $this->content = $content;
    }

    /**
     * @return BlogEntryContent
     */
    public function getContent() {
        return $this->content;
    }
}