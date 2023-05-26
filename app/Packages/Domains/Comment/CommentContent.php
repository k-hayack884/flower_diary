<?php

namespace App\Packages\Domains\Comment;

use DomainException;

class CommentContent
{

    public const RESET = '';

    /**
     * @var string
     */
    public string $content;

    /**
     * @param string|null $content
     */
    public function __construct(string|null $content=null)
    {
        if (mb_strlen($content) > 200) {
            throw new DomainException('コメントの内容にに入力できる文字数は200字までです');
        }
        if ($content === null) {
            $this->content = self::RESET;
        } else {
            $this->content = $content;
        }
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->content;
    }

    /**
     * @param string|null $comment
     * @return CommentContent
     */
    public function update(string|null $comment=null):CommentContent
    {
        if (mb_strlen($comment) > 20) {
            throw new DomainException('コメントの内容にに入力できる文字数は200字までです');
        }
        if ($comment === null) {
            $comment = self::RESET;
        }
        return new self($comment);
    }
}
