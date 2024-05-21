<?php

namespace App\Model;

use Nette;

final class PostFacade
{
    public function __construct(
        private Nette\Database\Explorer $database,
    ) {
    }

    public function getPublicArticles()
    {
        return $this->database
            ->table('posts')
            ->where('created_at < ', new \DateTime)
            ->order('created_at DESC');
    }

    public function getPostById(int $postId)
    {
        $post = $this->database
            ->table('posts')
            ->get($postId);
    
        if (!$post) {
            throw new Nette\Application\BadRequestException('Stránka nebyla nalezena');
        }
    
        return $post;
    }
    
    public function addView(int $postId){
        $post = $this->getPostById($postId);

        // Získání aktuálního počtu zhlédnutí
        $currentViews = $post->views ?? 0;

        // Inkrementace počtu zhlédnutí
        $newViews = $currentViews + 1;

        // Aktualizace počtu zhlédnutí v databázi
        $this->database->table('posts')
            ->where('id', $postId)
            ->update(['views' => $newViews]);
    }

    public function addComment(int $postId, string $name, string $content)
    {
        $this->database->table('comments')->insert([
            'post_id' => $postId,
            'name' => $name, // Insert name
            'content' => $content,
        ]);
    }


    public function getComments(int $postId)
    {
        return $this->database
            ->table('comments')
            ->where('post_id', $postId)
            ->order('created_at');
    }

    public function editPost(int $postId, $data)
    {
        // Implementace metody pro editaci příspěvku
        return $this->database
            ->table('posts')
            ->where('id', $postId)
            ->update($data);
    }

    public function insertPost($data)
    {
        // Implementace metody pro vložení nového příspěvku
        return $this->database
            ->table('posts')
            ->insert($data);
    }

    public function findPublishedArticles(): Nette\Database\Table\Selection
	{
		return $this->database->table('posts')
			->where('created_at < ', new \DateTime)
			->order('created_at DESC');
	}
}
