from icrawler.builtin import BingImageCrawler
import csv

class Crawler:
    def __init__(self,file_name,max_num):
        # ファイル名を指定
        self.file_name = file_name
        # ダウンロードする画像の最大枚数
        self.max_num = max_num

    # テキストファイルから植物名を抽出
    def readText(self):
        rows = []
        with open(self.file_name+'.csv',encoding="utf-8") as f:
            reader = csv.reader(f)
            for row in reader:
                self.download(row[1],row[0]+' '+row[1])

    def download(self,dir,keyword):
        # クローラーの生成
        bing_crawler = BingImageCrawler(
            downloader_threads=4,
            storage={'root_dir': "image/"+dir})

        # キーワード検索による画像収集
        bing_crawler.crawl(
            keyword=keyword,
            max_num=self.max_num)

# ファイル名とダウンロードする画像の最大枚数を指定
plant = Crawler("plant",150)
plant.readText()