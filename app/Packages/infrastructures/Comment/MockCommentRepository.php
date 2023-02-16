<?php

namespace App\Packages\infrastructures\Comment;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Comment\Comment;
use App\Packages\Domains\Comment\CommentCollection;
use App\Packages\Domains\Comment\CommentContent;
use App\Packages\Domains\Comment\CommentId;
use App\Packages\Domains\User\UserId;

class MockCommentRepository implements \App\Packages\Domains\Comment\CommentRepositoryInterface
{
    private array $comments=[];
public function __construct()
{
    $commentA=
        new Comment(
            new CommentId('983c1092-7a0d-40b0-af6e-30bff5975e31'),
            new UserId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
            new CommentContent('とてもいい'),
        );
    $commentB=
        new Comment(
            new CommentId('333c1092-7a0d-40b0-af6e-30bff5975e31'),
            new UserId('111c1092-7a0d-40b0-af6e-30bff5975e31'),
            new CommentContent('ほげえ'),
        );
    $commentC=
        new Comment(
            new CommentId('777c1092-7a0d-40b0-af6e-30bff5975e31'),
            new UserId('111c1092-7a0d-40b0-af6e-30bff5975e31'),
            new CommentContent('ウェーイ'),
        );
    $this->comments[]=$commentA;
    $this->comments[]=$commentB;
    $this->comments[]=$commentC;
}

    public function find(): array
    {
        return $this->comments;
    }

    /**
     * @throws NotFoundException
     */
    public function findByCommentId(CommentId $commentId)
    {
        foreach ($this->comments as $comment) {
            if ($comment->getCommentId()->equals($commentId)) {
                return $comment;
            }
        }
        throw new NotFoundException('指定したコメントIDは見つかりませんでした (id:' . $commentId->getId() . ')');
    }
    public function findByUserId(UserId $userId)
    {
        $hitComments=[];
        foreach ($this->comments as $comment) {
            if ($comment->getUserId()->equals($userId)) {
                $hitComments[]=$comment;
            }
        }
        if(empty($hitComments)){
            throw new NotFoundException('指定したユーザーIDは見つかりませんでした (id:' . $userId->getId() . ')');
        }
        return $hitComments;
    }
    public function save(CommentCollection $comment)
    {
        $collectionArray = $comment->toArray();
        foreach ($collectionArray as $collectionValue) {
            $this->comments[] = $collectionValue;
        }    }

    public function delete(CommentId $commentId)
    {
        $deleteSetting = $this->findByCommentId($commentId);
        $index = array_search($deleteSetting, $this->comments);
        unset($this->comments[$index]);
    }
}
