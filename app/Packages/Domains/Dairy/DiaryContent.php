<?php

namespace App\Packages\Domains\Dairy;

class DiaryContent
{
    public const RESET = '';
    public string $content;

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
     * @param string|null $note
     * @return FertilizerNote
     */
    public function update(string|null $note=null):DiaryContent
    {
        if (mb_strlen($note) > 20) {
            throw new DomainException('日記の内容にに入力できる文字数は200字までです');
        }
        if ($note === null) {
            $note = self::RESET;
        }
        return new self($note);
    }
}
