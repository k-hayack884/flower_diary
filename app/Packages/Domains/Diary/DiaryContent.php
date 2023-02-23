<?php

namespace App\Packages\Domains\Diary;

class DiaryContent
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
            throw new DomainException('日記の内容にに入力できる文字数は200字までです');
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
     * @param string|null $content
     * @return DiaryContent
     */
    public function update(string|null $content=null):DiaryContent
    {
        if (mb_strlen($content) > 20) {
            throw new DomainException('日記の内容にに入力できる文字数は200字までです');
        }
        if ($content === null) {
            $content = self::RESET;
        }
        return new self($content);
    }
}
