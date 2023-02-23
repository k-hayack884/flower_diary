<?php

namespace App\Packages\Domains\Comment;

use App\Exceptions\NotFoundException;
use Illuminate\Support\Collection;

final class CommentCollection
{
    /**
     * @param Comment[] $comments
     */
    public function __construct(array $comments = [])
    {
        $this->comments= (new Collection)->collect([]);
        foreach ($comments as $comment) {
            $this->addComment($comment);
        }
        $this->sortDate();
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function addComment(Comment $comment): void
    {
        $this->comments->put($comment->getCommentId()->getId(), $comment);
        $this->sortDate();
    }

    /**
     * @return void
     */
    private function sortDate(): void
    {
        $sorted=$this->comments->sortByDesc(function ($product,$key){
            return $product->getCreateDate();
        });
        $this->comments=$sorted;

    }

    /**
     * @param CommentId $commentId
     * @return Comment
     * @throws NotFoundException
     */
    public function findById(CommentId $commentId):Comment
    {
        $comment= $this->comments->get($commentId->getId());
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
        $this->comments->forget($comment->getCommentId()->getId());
    }

    /**
     * @param int $value
     * @return Closure|null
     */
    public function getValue(int $value): ?Closure
    {
        return $this->comments->get($value);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->comments->toArray();
    }
}
