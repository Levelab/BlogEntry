<?php
namespace Levelab\Model\BlogEntry\Repository;

use Levelab\Model\BlogEntry\Entity\BlogEntry;
use Levelab\Model\BlogEntry\Values\BlogEntryId;
use Levelab\Model\Core\Types\Author;
use Levelab\Model\Core\Types\Container;

interface BlogEntryRepository {
    public function find(BlogEntryId $blogEntryId);

    public function findAll();

    public function add(BlogEntry $blogEntry);

    public function remove(BlogEntry $blogEntry);

    public function findByAuthor(Author $author);

    public function findByContainer(Container $container);
} 