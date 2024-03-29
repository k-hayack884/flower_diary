<?php

namespace App\Packages\Domains\Comment;

use App\Packages\Domains\User\UserId;
use Carbon\Carbon;
use DomainException;

class Comment
{
    /**
     * @var CommentId
     * @var UserId
     * @var string $userName
     * @var string $userImage
     * @var CommentContent
     * @var Carbon
     */
    private CommentId $commentId;
    private UserId $userId;
    private string $userName;
    private string $userImage;
    private CommentContent $commentContent;
    private Carbon $createDate;

    /**
     * @param CommentId $commentId
     * @param UserId $userId
     * @param string $userName
     * @param string $userImage
     * @param CommentContent $commentContent
     * @param Carbon|null $createDate
     */
    public function __construct(CommentId $commentId, UserId $userId,string $userName,string $userImage, CommentContent $commentContent, Carbon $createDate = null)
    {
        $this->commentId = $commentId;
        $this->userId = $userId;
        $this->userName=$userName;
        $this->userImage=$userImage;
        $this->commentContent = $commentContent;
        if ($createDate === null) {
            $this->createDate = Carbon::now();;
        } else {
            $this->createDate = $createDate;
        }
    }

    /**
     * @param UserId $userId
     * @param string $content
     * @return void
     */
    public function updateComment(UserId $userId, string $content): void
    {
        if (!$this->userId->equals($userId)) {
            throw new DomainException('コメントのユーザーIDが一致しませんでした');
        }
        $commentContent = $this->commentContent->update($content);
        $this->commentContent = $commentContent;
    }

    /**
     * @return CommentId
     */
    public function getCommentId(): CommentId
    {
        return $this->commentId;
    }

    /**
     * @return UserId
     */
    public function getUserId(): UserId
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUserName():string
    {
        return $this->userName;

    }

    /**
     * @return string
     */
    public function getUserImage():string
    {
        return $this->userImage;

    }
    /**
     * @return CommentContent
     */
    public function getCommentContent(): CommentContent
    {
        return $this->commentContent;
    }

    /**
     * @return Carbon
     */
    public function getCreateDate(): Carbon
    {
        return $this->createDate;
    }
}
