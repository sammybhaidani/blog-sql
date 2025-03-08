<?php

require_once 'src/Entities/PostEntity.php';
class PostsModel
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
     * @return PostEntity[]
     */

    public function getAll(): array
    {
        $query = $this->db->prepare('SELECT `posts`.`id`, `categories`.`category`,`title`, `author_name`,
                                           `content`, `created_at`, `category_id`, `likes`, `dislikes` 
                                            FROM `posts`
                                            INNER JOIN `categories` ON `posts`.`category_id` = `categories`.`id`
ORDER BY `created_at` DESC ;');
        $query->setFetchMode(PDO::FETCH_CLASS, PostEntity::class);
        $query->execute();
        return $query->fetchAll();
    }
}