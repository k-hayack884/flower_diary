<?php

namespace App\Packages\Domains\Comment;

use App\Exceptions\NotFoundException;
use Illuminate\Support\Collection;

class CommentCollection extends Collection
{
    /**
     * @param Comment[] $comments
     */
    public function __construct(array $comments = [])
    {
        foreach ($comments as $comment) {
            $this->addComment($comment);
        }
//        $this->sortDate();
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function addComment(Comment $comment): void
    {
        $this->put($comment->getCommentId()->getId(), $comment);
//        $this->sortDate();
    }

    /**
     * @return void
     */
    public function sortDate()
    {
        return $this->sortByDesc(function ($product,$key){
            return $product->getCreateDate();
        });
    }

    /**
     * @param CommentId $commentId
     * @return Comment
     * @throws NotFoundException
     */
    public function findById(CommentId $commentId):Comment
    {
        $comment= $this->get($commentId->getId());
        if (is_null($comment)) {
            throw new NotFoundException('指定したコメントIDが見つかりませんでした (id:' . $commentId->getId() . ')');
        }
        if (!$comment->getCommentId()->equals($commentId)) {
            throw new NotFoundException('指定したコメントIDが見つかりませんでした (id:' . $commentId->getId() . ')');
        }
        return $comment;
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function delete(Comment $comment):void
    {
        $this->forget($comment->getCommentId()->getId());
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->get($value);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return parent::toArray();
    }
}
