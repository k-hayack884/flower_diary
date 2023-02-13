<?php

namespace Packages\infrastructures\Repositories\Diary;

use App\Exceptions\NotFoundException;
use App\Packages\Domains\Dairy\Diary;
use App\Packages\Domains\Dairy\DiaryCollection;
use App\Packages\Domains\Dairy\DiaryContent;
use App\Packages\Domains\Dairy\DiaryId;
use App\Packages\infrastructures\Diary\MockDiaryRepository;
use PHPUnit\Framework\TestCase;

class MockDiaryRepositoryTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->mockDiaryRepository = new MockDiaryRepository();
    }

    public function test_日記コレクションを返す()
    {
        $result = $this->mockDiaryRepository->find();
        $this->assertIsArray($result);
    }

    public function test_設定IDから検索して情報を取得する()
    {
        $DiaryId = new DiaryId('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $Diary = $this->mockDiaryRepository->findById($DiaryId);

        $this->assertSame($DiaryId->getId(), $Diary->getDiaryId()->getId());
    }

    public function test_存在しない設定IDから検索すると例外を出すこと()
    {
        $DiaryId = new DiaryId('111c1111-1a1d-11b1-af1e-11bff1111e11');

        $this->expectException(NotFoundException::class);
        $Diary = $this->mockDiaryRepository->findById($DiaryId);
    }

    public function test_設定を追加する()
    {
        $addDiary[]=
            new Diary(
                new DiaryId('893c1092-7a0d-40b0-af6e-30bff5975e31'),
                new DiaryContent('おっぱっぴー'),
            );
        $DiaryCollection=new DiaryCollection($addDiary);
        $this->mockDiaryRepository->save($DiaryCollection);

        $addDiaryArray=$this->mockDiaryRepository->find();
        $this->assertSame($addDiary[0]->getDiaryId(), $addDiaryArray[2]->getDiaryId());
    }

    public function test_設定を削除する()
    {
        $DiaryId = new DiaryId('983c1092-7a0d-40b0-af6e-30bff5975e31');
        $Diary=$this->mockDiaryRepository->findById($DiaryId);
        $this->mockDiaryRepository->delete($DiaryId);
        $this->expectException(NotFoundException::class);
        $Diary = $this->mockDiaryRepository->findById($DiaryId);
    }
}
