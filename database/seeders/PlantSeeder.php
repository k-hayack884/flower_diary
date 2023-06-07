<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class
plantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plants')->insert([
            [
//                'id'=>1,
                'name' => 'アサガオ',
                'scientific' => 'Ipomoea nil',
                'information' =>
                    'アサガオ（学名: Ipomoea nil）は、ヒルガオ科に属する一年生または多年生のつる性植物です。その美しい花や迅速な成長力から、庭園や公園で人気のある観賞植物として栽培されています。
                     アサガオの特徴的な特徴は、大きな花と豊かな色彩です。花の直径は通常5〜10センチメートルで、朝に開花し、夕方にはしぼんでしまいます。花の色は多様で、青、紫、ピンク、赤、白など、さまざまな品種が存在します。また、花弁には模様や斑点があることもあります。
                     この植物の名前は、日本語の「朝顔」からきており、花が朝に開くことに由来しています。また、アサガオのつるは非常に伸びるため、他の植物や物に絡まりつきます。この特性を活かし、垣根やトレリス、フェンスなどに絡ませることで、緑豊かな壁や美しいアーチを作り出すことができます。
                     アサガオは、日本を含む多くの地域で栽培されていますが、原産地はメキシコや中央アメリカとされています。暖かい気候を好み、十分な日光と水を必要とします。種を直接地面にまいて育てることもできますが、一般的には苗を育てることが一般的です。成長が速いため、観察するのも楽しみの一つです。
                     アサガオにはさまざまな文化的な意味や象徴があります。一部の地域では、朝に開花し夕方にしぼむことから、「はかない恋」や「過ぎ去る時間」の象徴とされています。また、アサガオは「勇気」という意味も持っており、花言葉としても使われます。',                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 2,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 0,
                'recommendWinterWaterTimes' => 0,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),
            ],
            [
//                'id'=>2,
                'name' => 'アジサイ',
                'scientific' => 'Hydrangea macrophylla',
                'information' => 'アジサイ（学名: Hydrangea）は、ヒルガオ科に属する美しい花を咲かせる植物です。その鮮やかな花色や独特の形状から、庭園や公園で人気のある観賞植物として知られています。

アジサイの特徴的な特徴は、豪華な花序（かじょ）です。花序は球状または円錐状で、小さな花が密集して咲きます。花の色は多様で、青、紫、ピンク、赤、白などのバリエーションがあります。また、一つの花序に同じ色の花だけでなく、複数の色の花が混ざって咲く品種もあります。

アジサイは、主に湿った環境を好みます。日本を含む多くの地域で自生しており、森林や湿地帯で見ることができます。また、庭園や公園での栽培も盛んに行われています。アジサイは水を好み、水の供給が不足すると花や葉がしおれてしまうことがあります。日陰や半日陰の場所での栽培が適しており、直射日光が当たりすぎると花色が劣化することがあります。

アジサイにはさまざまな品種があり、花の形や色、成長形態などが異なります。代表的な品種には「紫陽花（あじさい）」や「マクロフィラ（大葉）」などがあります。紫陽花は日本特有の品種で、その美しい花色と優雅な姿が日本の風景に欠かせない存在です。また、マクロフィラは大きな葉が特徴で、花と葉のコントラストが美しい品種です。

アジサイは、花の色や形、豪華さなどから花言葉としても広く知られています。一般的には「感謝」「誠実」「調和」「優雅」などの意味があります。また、アジサイの花色は土壌の酸性度によって変化するため、その変化が「変わりやすさ」「移り変わり」の象徴とされることもあります。

アジサイは、その美しい花と個性的な魅力で多くの人々を魅了してきました。庭園や公園、花壇などで育てることで、季節の美しい景色を楽しむことができます。また、花を切り花として楽しむこともできます。',

                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 2,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 2,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),
            ], [
//                'id'=>3,
                'name' => 'アネモネ',
                'scientific' => 'Anemone coronaria',
                'information' => '
                アネモネ（学名: Anemone）は、キンポウゲ科に属する美しい花を咲かせる植物です。その優雅で繊細な花姿から、庭園や花壇で人気のある観賞植物として知られています。

アネモネの特徴的な特徴は、独特の花形と多様な花色です。花の形は一重咲き、八重咲き、フリル状などさまざまで、美しい花弁が咲き乱れます。花色も多彩で、白、ピンク、赤、紫、青などのバリエーションがあります。また、花期もさまざまで、春から夏にかけて咲く種類や秋に咲く種類などがあります。

アネモネは、主に温暖な地域を好みますが、一部の種類は寒冷地でも育つことができます。日本を含む多くの地域で自生しており、森林や草原、山地などで見ることができます。また、庭園や花壇での栽培も行われており、その美しい花姿が庭を彩ります。

アネモネの栽培には、適切な環境と管理が必要です。十分な日光を受ける場所や排水の良い土壌が好ましいです。また、適度な水やりと肥料の与え方も大切です。花後にはしっかりと株の手入れを行い、次の年の花を迎える準備をしましょう。

アネモネは、花の美しさだけでなく、花言葉としても知られています。一般的には「愛」「希望」「感謝」「純潔」などの意味があり、特に純白のアネモネは純粋な愛や清らかさを表現するとされています。',
                'recommendSpringWaterInterval' => 2,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 0,
                'recommendSummerWaterTimes' => 0,
                'recommendAutumnWaterInterval' => 0,
                'recommendAutumnWaterTimes' => 0,
                'recommendWinterWaterInterval' => 3,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>4,
                'name' => 'アマリリス',
                'scientific' => 'Hippeastrum',
                'information' => 'アマリリス（学名: Hippeastrum）は、美しい花を咲かせる球根植物の一つです。その鮮やかな花色や立ち姿から、庭園や室内で人気を集める観賞植物として知られています。

アマリリスの特徴的な花は、大きく豪華でありながらも優雅な姿を持っています。一つの茎から複数の花が咲き、花弁は広がりながら鮮やかな色彩を放ちます。赤、ピンク、白、オレンジ、紫など、さまざまな花色が存在し、見る者を魅了します。花期は主に冬から春にかけてで、季節外れの鮮やかな花を楽しむことができます。

アマリリスの栽培は比較的容易であり、初心者でも楽しむことができます。球根を植える際には、適切な鉢や土壌を用意し、水やりと日光の調節を行うことが重要です。球根は十分な栄養を蓄えており、適切な環境下で育てると美しい花を咲かせます。

また、アマリリスは切り花としても人気があります。花が開花した後に茎を切り取り、花瓶に挿して楽しむことができます。鮮やかな色彩と立ち姿は、インテリアやテーブル装飾に華やかさを添えます。

アマリリスにはさまざまな花言葉がありますが、一般的には「誇り高さ」「魅力」「気品」「華やかさ」などの意味を持ちます。その美しい花姿から、贈り物や特別な場面での装飾にも適しています。

アマリリスは、その鮮やかな花色と優雅な姿で人々を魅了し、豪華さと気品を演出します。庭園や室内で育てることで、寒い季節に春の訪れを感じたり、華やかな雰囲気を演出したりすることができます。ぜひ、アマリリスの美しい花を通じて、自然の豊かさと生命力を感じてみてください。




',
                'recommendSpringWaterInterval' => 3,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 2,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 3,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 7,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>5,
                'name' => 'アヤメ',
                'scientific' => 'Iris sanguinea',
                'information' => '
アヤメは、アヤメ科に属する多年草で、主に日本やヨーロッパなどで自生しています。その特徴的な花は、直立した茎の上に咲き、6枚の花弁と3枚の萼片を持ち、鮮やかな色合いをしています。一般的には青紫色の花がよく知られていますが、他にも白やピンク、黄色などの品種もあります。また、花の中心には特徴的な斑点模様があり、その美しさから庭園や花壇で人気のある花となっています。
アヤメの栽培には、以下のポイントがあります。まず、日当たりの良い場所で栽培することが重要です。アヤメは日光を好みますので、できるだけ直射日光が当たる場所を選びましょう。土壌は排水性が良く、水はけのよい砂質の土が適しています。また、適度な水やりや定期的な肥料の施しを行い、根元から水が切れる前に水やりを行うことが大切です。
アヤメの花言葉は、「高潔」「誇り高き心」「美」「信頼」などです。その美しい花姿や鮮やかな色彩から、高貴な気品や美意識を象徴する花とされています。また、アヤメは6月から7月にかけて花が咲くことから、夏の訪れや希望、新たな始まりを象徴する花ともされています。
アヤメは、庭園や花壇での栽培だけでなく、切り花としても人気があります。その美しい姿と芳香は、さまざまな場面で活躍し、心を癒してくれることでしょう。
                ',
                'recommendSpringWaterInterval' => 2,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 2,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 7,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>6,
                'name' => 'アリウム',
                'scientific' => 'Allium',
                'information' => '

アリウムの特徴的な花は、球状の花序（カップのような形状）を持ち、細長い花弁が垂れ下がるように咲きます。花の色は種類によって異なり、紫やピンク、白、黄色などの美しい色合いをしています。また、アリウムの花序は直立して伸びるため、花壇や切り花としても魅力的な存在です。

アリウムの栽培には、以下のポイントがあります。まず、日当たりの良い場所で栽培することが重要です。アリウムは日光を好みますので、できるだけ直射日光が当たる場所を選びましょう。土壌は排水性が良く、水はけのよい砂質の土が適しています。球根は深さ2倍程度の穴に植え付け、水やりを適度に行いながら管理しましょう。

アリウムの花言葉は、「神秘」「高貴」「気品」「尊厳」などです。その美しい姿や独特の形状から、神秘的で高貴なイメージを持つ花とされています。また、アリウムの花は虫除けの効果もあるため、庭園や花壇に植えることで害虫の対策にもなります。

アリウムは、花壇や庭園だけでなく、切り花やドライフラワーとしても利用されます。その個性的な花姿は、アレンジメントやブーケにおいても魅力を放ちます。

以上がアリウムの特徴や育て方、花言葉などの解説でした。アリウムの美しい花を楽しんで、庭や室内を彩りましょう。',
                'recommendSpringWaterInterval' => 3,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),
            ], [
//                'id'=>7,
                'name' => 'アリッサム',
                'scientific' => 'Alyssum',
                'information' => '

アリッサムは、小さな花を密集させた総状花序を持ち、白、ピンク、紫、黄などの鮮やかな色合いをしています。花の形状は4弁花で、花弁は薄くて柔らかな質感を持ち、風に揺れる様子がとても可愛らしいです。また、アリッサムの花は芳香があり、甘く爽やかな香りを楽しむことができます。

アリッサムの栽培には、以下のポイントがあります。まず、日当たりの良い場所で栽培することが重要です。アリッサムは日光を好み、十分な光を受けることで花がより豊かに咲きます。土壌は排水性が良く、水はけの良い砂質の土壌が適しています。また、アリッサムは比較的耐寒性がありますが、極端な寒さには弱いため、寒冷地では冬の保護が必要です。

アリッサムの花言葉は、「希望」「祈りの花」「喜び」などです。その清楚で可憐な姿から、希望や祈りの象徴とされています。また、花の豊かな香りは喜びや幸福感を与えるとされています。

アリッサムは庭の花壇やロックガーデン、プランターや鉢植えなどさまざまな場所で楽しむことができます。特に、花壇やボーダーに植えると、一面に広がる美しい花畑を作り出すことができます。

以上がアリッサムの特徴や育て方、花言葉などの解説でした。アリッサムの優雅な花と香りを楽しみながら、癒しの空間を演出してみてください。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>8,
                'name' => 'アルストロメリア',
                'scientific' => 'Alstroemeria',
                'information' => '

アルストロメリアは、直立した茎から複数の花をつける姿が特徴です。花は多くの種類があり、赤、オレンジ、ピンク、紫、黄など、鮮やかな色合いを持ちます。花の形状は筒状で、内側には6本の花弁があり、外側には3本の小さな花弁があります。この独特の形状と色合いが、アルストロメリアの魅力となっています。

アルストロメリアの栽培には、以下のポイントがあります。まず、充分な日光を受ける場所で栽培することが重要です。アルストロメリアは日光を好み、日中の直射日光を浴びることで花がより鮮やかに咲きます。土壌は排水性が良く、水はけの良い砂質の土壌が適しています。また、アルストロメリアは耐寒性がありますが、寒さに弱いため、寒冷地では冬の保護が必要です。

アルストロメリアの花言葉は、「友情」「魅力」「豊かさ」などです。その美しい花姿と色鮮やかな花びらから、友情や魅力、豊かな生活の象徴とされています。また、アルストロメリアは切り花としても人気があり、花束やアレンジメントに使われることが多いです。

アルストロメリアは庭の花壇やコンテナ、切り花として楽しむことができます。特に花壇に植える場合は、複数の種類や色合いのアルストロメリアを組み合わせることで、美しい色彩の庭を演出することができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>9,
                'name' => 'アロエ',
                'scientific' => 'Aloe',
                'information' => '

アロエは、独特のロゼット状の葉を持つ植物で、鮮やかな緑色をしています。葉は厚くて肉厚であり、葉の表面には鋸歯状の突起があります。また、一部の種類では、葉に白い斑点や模様が入るものもあります。アロエはサボテンに似た外見を持っていますが、サボテンとは異なり、葉に多くのジューシーなゲルを含んでいます。

アロエの栽培には、以下のポイントがあります。まず、アロエは乾燥に強い植物であり、乾燥した環境を好みます。土壌は排水性が良く、水はけの良い砂質の土壌が適しています。また、日光を好むため、直射日光を浴びる場所で栽培することが望ましいです。水やりは控えめに行い、土が完全に乾いた後に水を与えます。

アロエには、さまざまな効能があります。主な効能としては、保湿・鎮静・消炎作用が挙げられます。アロエの葉に含まれるゲルは、肌を保湿し、乾燥から守ります。また、アロエには炎症を鎮める成分が含まれており、傷や虫刺されなどの症状を軽減する効果があります。さらに、アロエのゲルは日焼け後の肌の修復にも役立ちます。

アロエは、観葉植物として室内で育てられるほか、庭やベランダでも栽培することができます。また、アロエの葉からゲルを取り出して直接肌に塗布することもできます。ただし、アロエは多肉植物であるため、過剰な水やりや寒さには注意が必要です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>10,
                'name' => 'アンスリウム',
                'scientific' => 'Anthurium',
                'information' => '

アンスリウムは、南アメリカ原産の熱帯植物であり、花を中心にした見た目の美しさが特徴です。花は細長い形状をしており、赤やピンク、白などの鮮やかな色合いを持っています。また、花の中心には特徴的な構造である「仮の花茎」と呼ばれる部分があり、これがアンスリウムの個性的な姿を演出しています。

アンスリウムの栽培には、以下のポイントがあります。まず、アンスリウムは高温多湿な環境を好みます。日当たりの良い場所で育てることが重要であり、室内での管理が一般的です。また、鉢やプランターの中に水をためたトレイを敷くなど、湿度を保つ工夫が必要です。水やりは土の表面が乾いたら行い、葉に直接水をかけることも効果的です。

アンスリウムは、室内での観葉植物として人気がありますが、花が咲くためには適切な環境が必要です。充分な日光と高温多湿な環境を提供することで、美しい花を楽しむことができます。花が咲く期間は比較的短いですが、その美しさは一時的なものではありません。

アンスリウムの花言葉は「愛の思い」「誠実さ」「美」などであり、贈り物やインテリアとしても喜ばれます。また、アンスリウムの花は切り花としても人気があり、アレンジメントやブーケに使われることもあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>11,
                'name' => 'イチョウ',
                'scientific' => 'Ginkgo biloba',
                'information' => '
                イチョウは、ソテツ目イチョウ科に属する落葉広葉樹であり、主に中国や日本などの亜熱帯から温帯に分布しています。成長すると大きなサイズになり、高さ30メートル以上にも達することがあります。特徴的な扇形の葉は、夏季には鮮緑色を呈し、秋になると鮮やかな黄金色に変化します。この美しい葉の色づきは、多くの人々に魅力を与えます。

イチョウは、比較的丈夫で頑健な樹木であり、耐寒性や耐乾燥性があります。日当たりの良い場所や中性から弱アルカリ性の土壌を好みますが、比較的適応範囲が広いため、さまざまな地域で栽培されています。また、イチョウは空気中の汚染物質にも耐性を持ち、都市部の環境にも適しています。

イチョウの利用方法はさまざまです。一般的には観賞用の樹木として庭園や公園などで植えられ、四季折々の美しい景観を楽しむことができます。特に秋の黄金色の葉は風景に彩りを添え、人々の目を楽しませます。また、イチョウの葉は薬用としても利用されており、漢方薬や健康食品などに使用されることがあります。

さらに、イチョウは古代から珍重されており、文化的な意味合いも持っています。日本や中国では、イチョウの木は長寿や栄光の象徴とされ、寺院や神社の境内に植えられることがあります。また、イチョウの葉は化石化しやすい性質があり、化石燃料としても利用されます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>12,
                'name' => 'イベリス',
                'scientific' => 'lberis',
                'information' => '
                イベリスは、イベリス科に属する植物であり、地中海地域を中心に自生しています。花の形状は小さく、一重または半二重の花弁を持ち、花の色は白、ピンク、紫、黄色など多様です。花期は春から初夏にかけてで、鮮やかな花が密集した房状の花序を形成します。また、繊細な緑の葉は、花とのコントラストを引き立てます。

イベリスは日当たりの良い場所を好みますが、一部の種類は半日陰でも育つことができます。土壌は排水性が良く、やや乾燥気味の砂質などが適しています。耐寒性があり、比較的寒冷な地域でも栽培することができます。

庭園や花壇でイベリスを栽培すると、美しい花が広がる明るい景観を楽しむことができます。特に群生させると、一面に広がる花の絨毯が素晴らしい光景を創り出します。また、花壇やボーダー、岩庭など、さまざまな場所で利用されることがあります。

イベリスの花は切り花としても人気があり、花瓶やアレンジメントに使われます。また、花の香りがあり、蜜を求めて蜂や蝶が訪れることもあります。

さらに、イベリスは花期が長く、剪定や摘芯などの手入れが比較的簡単です。また、一部の種類は多年草として育てることができ、年々増えるため、長く楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>13,
                'name' => 'インパチェンス',
                'scientific' => 'Impatiens walleriana',
                'information' => '
                インパチェンスは、ツリフネソウ科に属する植物であり、主に熱帯や亜熱帯地域が原産です。花の形状は小さくて5弁で、一重または半二重の花弁を持ち、花の色は赤、ピンク、オレンジ、白など多様です。また、葉は深緑色で、繁茂する性質を持っています。
インパチェンスは、日陰から半日陰の場所を好みますが、一部の種類は日向でも育つことができます。耐寒性が低いため、寒冷地では室内で育てることが一般的です。土壌は水はけの良いものが適しており、湿度の高い環境を好みます。
庭や花壇でインパチェンスを育てると、鮮やかな花が広がり、華やかな雰囲気を演出します。特に花壇の縁取りやコンテナ植えに適しており、花壇やベランダなどで楽しむことができます。また、切り花としても人気があり、花瓶やアレンジメントに使われます。
インパチェンスは、水やりに注意が必要です。乾燥に弱く、土壌が乾いたら適度に水を与える必要があります。また、肥料を適切に与えることで、より美しい花を咲かせることができます。
さらに、インパチェンスは比較的病気や害虫に強い植物ですが、高温多湿の環境では病気になることがあるため、十分な換気が必要です。また、花が終わった後には枯れた部分を刈り取り、新しい花を促すことも重要です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>14,
                'name' => 'ウツボカズラ',
                'scientific' => 'Nepenthes',
                'information' => '
                ウツボカズラは、食虫植物の一種であり、ネペンテス科に属しています。その名前の由来は、ウツボ（靴下）に似た形状の捕虫袋（フラスコ）からきています。この捕虫袋は、昆虫や小さな節足動物を捕らえるための仕掛けが施されており、その特異な姿が魅力となっています。

ウツボカズラは、主に熱帯地域や亜熱帯地域が原産で、湿潤な環境を好みます。湿度が高く、日光が豊富な場所で最もよく育ちます。一部の種類は温室や屋内で栽培されることもあります。

この植物は、他の植物が生育しにくい貧栄養土壌に生息しています。捕虫袋は虫を誘引し、内部に消化酵素を分泌して昆虫を消化します。ウツボカズラは、栄養分を摂るために昆虫を捕らえるという独特な生態を持っています。

ウツボカズラの捕虫袋は、様々な形状やサイズをしており、花びらのような色と模様が特徴的です。これは、昆虫を引き寄せるための鮮やかなデザインであり、捕虫袋の内部には滑りやすい液体が充満しています。

栽培する際には、ウツボカズラにとって適切な環境を提供することが重要です。日光を十分に浴びる場所や湿度の高い環境を整えることが必要です。また、水やりは鉢土が乾いたら行い、栄養源として昆虫を供給することも可能です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>15,
                'name' => 'ウメ',
                'scientific' => 'Armeniaca mume',
                'information' => 'ウメは、バラ科ウメ属に属する落葉樹であり、春に美しい花を咲かせます。花は一重咲きや八重咲きなど、さまざまな品種があり、花の色も白やピンク、赤など多様です。特に、淡いピンク色の花がよく知られています。

日本では、ウメは非常に古くから親しまれてきました。古代から日本の歴史や文化に深く根付いており、春の象徴とされ、日本の伝統的な風景や詩歌にも頻繁に登場します。また、ウメの花は日本の美意識である「侘び寂び」を象徴するとされており、その繊細な姿と儚さが人々の心を打つのです。

ウメの栽培方法は比較的容易であり、日本全国で庭園や公園、神社などで見ることができます。ウメは寒さに強く、冬の寒い地域でも育つことができますが、十分な日照と排水の良い土壌を好みます。春の花を楽しむためには、十分な日光を受ける場所に植え、適切な剪定を行うことが重要です。

また、ウメは香りも特徴的であり、特に夜間に芳香を放ちます。その香りはさまざまな文学作品や和菓子などにも取り入れられ、日本の伝統的な文化と結びついています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>16,
                'name' => 'エビネ',
                'scientific' => 'Calanthe',
                'information' => 'エビネは、日本を含む北半球の温帯地域に自生しています。特に森林や湿地などの湿った場所に生息し、地下に塊茎を持つ植物です。塊茎は地上に細長い花茎を伸ばし、上部に花をつけます。花の形は蕾のような形状で、複数の花弁がくるくると巻きついたような独特の姿が特徴的です。花の色は白やピンク、紫など多様で、その美しさから観賞用に栽培されることもあります。

エビネは、一般的に春から初夏にかけて花が咲きます。自生地では、森の中や湿地の中に集団で咲く姿が見られます。自然界では、エビネは昆虫やキノコなどの生物との共生関係を築いており、花には特定の昆虫が寄生して受粉を行います。このような生態的な関係が、エビネの生育に重要な役割を果たしています。

エビネの栽培方法は、一般的な花とは異なります。塊茎を植え付ける際には、湿った環境と適度な日陰が必要です。土壌は水はけが良く、保水性がありながらも根腐れさせないことが重要です。また、冬季には塊茎を地中に保護するため、厚めのマルチや軽い保護材を利用することが推奨されます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),
            ], [
//                'id'=>17,
                'name' => 'エリカ',
                'scientific' => 'Erica',
                'information' => 'エリカの特徴的な点は、独自の形態と美しい花です。エリカの葉は針状で細長く、緑色や赤みを帯びた色合いを持ちます。花は小さくて鈴型で、白やピンク、赤などの色彩豊かなものがあります。花は集まって咲き、花序や房状になっていることが多いです。また、花期も様々で、春や夏に咲く種類から秋や冬に咲く種類まであります。

エリカは一般的に酸性の土壌を好みます。酸性土壌とは、pH値が5.5以下の土壌のことを指します。このため、一般的な庭園の土壌とは異なる場合があります。エリカを栽培する際は、酸性土壌を作り出すために腐葉土やピートモスを混ぜることが推奨されます。また、日当たりの良い場所や風通しの良い場所を選び、十分な水やりと適切な肥料を与えることも重要です。

エリカは、寒さにも比較的耐性があります。特に冬季に咲く種類は寒冷地でも育つことができます。ただし、強い寒さには弱く、凍結による損傷を受けることがあるため、霜に注意が必要です。寒冷地での栽培では、保護対策や冬期の管理が必要となります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>18,
                'name' => 'オキザリス',
                'scientific' => 'Oxalis',
                'information' => 'オキザリスの特徴的な点は、クローバーのような三つ葉を持つ姿と、小さな花が集まった傘状の花序です。葉は光沢があり、深緑色や紅紫色などのバリエーションがあります。花は直径数センチ程度で、ピンク、白、黄色などの色合いがあります。花の形状もさまざまで、星型やベル型などがあります。

オキザリスは、比較的育てやすい植物として知られています。一般的に日当たりの良い場所を好みますが、一部の種類は半日陰でも育つことができます。また、湿度に敏感であり、適度な湿度を保つことが育成のポイントです。土壌は水はけが良く、腐葉土やピートモスを混ぜた疎水性の土壌が適しています。

オキザリスは、春から夏にかけて花を咲かせます。花期は種類によって異なりますが、一部の種類では秋にも花を楽しむことができます。花期中は、適度な水やりを行い、乾燥を防ぐことが大切です。また、適切な肥料を与えることで花の豊かな開花を促すことができます。

オキザリスは、庭園の花壇やコンテナ、鉢植えなどで楽しむことができます。特に地植えでは増殖しやすく、繁茂した姿が見られます。また、切り花としても人気があり、花束やアレンジメントに利用されることもあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>19,
                'name' => 'オンシジューム',
                'scientific' => 'Oncidium',
                'information' => 'オンシジュームは、ラン科に属する多年生植物で、主に熱帯地域を原産としています。葉は肉厚でツヤがあり、直線状や披針形をしており、緑色や紫色などのバリエーションがあります。花は特徴的な形状で、蝶のような姿をしていることから「蝶蘭」とも呼ばれています。花色は多様で、ピンク、白、紫、黄色などさまざまな色合いがあります。

オンシジュームの栽培には、一定の条件が必要です。まず、明るい場所を好みますが、直射日光は避けるようにしましょう。また、高温多湿の環境を好むため、温度が適切で湿度の高い場所が適しています。乾燥を嫌うため、適度な水やりと湿度管理が重要です。また、通気性の良い栽培用培養土を使用し、肥料は定期的に与えることが推奨されます。

オンシジュームは、春から夏にかけて花を咲かせます。花期は種類によって異なりますが、一般的に長い間花を楽しむことができます。花が咲くときには、茎から複数の花が咲き出し、見事な花の密集した姿が鑑賞されます。花の咲き方や色合いは個体によって異なるため、その多様性も楽しめる特徴です。

オンシジュームは、花壇や庭園での栽培だけでなく、鉢植えや切り花としても人気があります。特に切り花としては、華やかな花姿と長い花期が魅力となり、フラワーアレンジメントやブーケに利用されることがあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),
            ], [
//                'id'=>20,
                'name' => 'カーネーション',
                'scientific' => 'Dianthus caryophyllus',
                'information' => 'カーネーションはキク科の植物であり、原産地は地中海沿岸地域です。花の形は丸くて複雑で、縮れた形状を持ち、一重咲きや八重咲きの品種があります。花弁の質感はしっかりとしており、滑らかな触り心地があります。花の色は多様で、ピンク、白、赤、黄色などの鮮やかな色合いがあります。また、花弁の縁には模様や斑点がある品種もあります。

カーネーションの栽培には、日当たりの良い場所と適度な水やりが必要です。耐寒性がありますが、寒冷な地域では冬季に保護することが推奨されます。適切な土壌や肥料の管理も重要で、通気性の良い土壌と定期的な施肥が花の健康な成長に役立ちます。

カーネーションの花は通常、春から夏にかけて咲きます。花期は品種によって異なりますが、長い間花を楽しむことができます。切り花としては特に人気があり、花束やアレンジメントに利用されます。花の持ちが良く、鮮やかな色合いが長く楽しめるため、贈り物やイベントの装飾に適しています。

また、カーネーションには花言葉があります。一般的には「愛情」「母の愛」「感謝」「幸福」などの意味を持ち、特に母の日やバレンタインデーなどの特別な日に贈られることが多いです。花言葉を添えて贈ることで、感謝や愛情を表現することができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>21,
                'name' => 'ガーベラ',
                'scientific' => 'Gerbera jamesonii',
                'information' => 'ガーベラは、南アフリカ原産の多年草で、暖かい気候を好みます。花の形は一重咲きで、円盤状の中心部に小さな筒状の花が集まっています。花弁は平たく、色鮮やかな品種が数多く存在します。ピンク、オレンジ、赤、黄色、白など、鮮やかで明るい色合いが特徴です。また、花の大きさも品種によって異なり、直径数センチから十数センチに及ぶものまであります。

ガーベラは、日光を好みますので、日当たりの良い場所で栽培することが重要です。また、排水性の良い土壌を好みますので、水はけの良い土壌を用意しましょう。水やりは適度に行い、土が乾燥しないように気を配ります。肥料も定期的に施し、健康な成長を促します。

ガーベラは、春から夏にかけて花を咲かせます。花期は品種によって異なりますが、適切な管理が行われれば長い間花を楽しむことができます。花の持ちが良く、カットフラワーとしても人気があります。花瓶に活けるだけで、華やかな雰囲気を演出することができます。

ガーベラは、その花言葉からも注目されています。一般的には「笑顔」「希望」「純粋な愛」といった意味を持ちます。その明るい色合いや愛らしい姿は、人々に元気や希望を与える力を持っています。贈り物やお祝いの場にふさわしい花としても選ばれています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>22,
                'name' => 'カエデ',
                'scientific' => 'Acer',
                'information' => 'カエデは、カエデ科の落葉広葉樹であり、世界中に約150種以上が存在します。日本では特に多くの種類が自生し、四季折々の美しい姿を見せてくれます。カエデの特徴的な葉は掌状に裂けており、その形状や模様は種類によって異なります。一般的には5つから9つの裂片から成る葉が特徴で、春には鮮やかな新芽が芽吹き、秋には紅葉して美しい色彩を見せます。

カエデの紅葉は、特に秋に見頃を迎えます。黄色やオレンジ、赤、紫など、多彩な色合いで葉が染まり、景色を一層華やかに彩ります。紅葉のピーク時には多くの人々が観光や散策に訪れ、美しい風景を楽しむことができます。

カエデは、日本庭園や公園、庭先などでよく栽培されています。その美しい姿と風情が空間に彩りを与え、和の雰囲気を醸し出します。また、庭木や盆栽としても人気があり、手入れを行いながら長い年月を共に過ごすことができます。

カエデの育て方は、一般的には日当たりの良い場所で栽培し、水はけの良い土壌を選びます。また、適度な水やりと適切な剪定を行うことで健康な成長を促します。さらに、肥料の施し方や害虫の対策なども重要です。環境によって異なるカエデの種類もあるため、栽培方法や管理のポイントには注意が必要です。

カエデは、日本の文化や風習にも深く根付いています。日本の紋章や旗、または日本の伝統的な建築物である「松の間」と呼ばれる茶室などで、しばしばカエデの紋様や意匠が用いられます。そのため、カエデは日本の象徴的な存在とも言えます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>23,
                'name' => 'ガジュマル',
                'scientific' => 'Ficus microcarpa',
                'information' => 'ガジュマル（学名：Ficus microcarpa）は、インドネシアや東南アジア原産の常緑樹であり、特に沿岸地域でよく見られる木です。その美しい姿と特異な幹の形状から、観賞用植物や庭木として広く栽培されています。

ガジュマルの特徴的な特徴は、複数の幹と融合した根（空気根）です。これにより、大きな幹や幹状の枝が地上に広がり、複雑な幹のネットワークを作り出します。この特異な形状は、ガジュマルを他の植物とは一線を画す存在にしています。

ガジュマルの葉は小さくて丸い形状で、濃い緑色をしています。葉は密集して生えており、茂っている姿は非常に美しいです。また、成長すると小さな果実もつけることがあります。

ガジュマルは、日光や水分に対して非常に耐性があります。そのため、日当たりの良い場所で栽培されることが多く、庭や公園、街路樹としてもよく見かけることがあります。また、鉢植えとしても人気があり、室内での栽培も可能です。

ガジュマルは、その特異な形状や独特の風合いから、風水や文化的な意味を持つこともあります。特に東南アジアでは、ガジュマルは縁起物として扱われ、繁栄や幸運を象徴する存在とされています。

ガジュマルの育て方は比較的簡単で、適度な日光と水分を与えることが重要です。土壌は水はけの良いものを選び、乾燥しないように注意しましょう。また、定期的な剪定や形成を行うことで、美しい姿を保つことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>24,
                'name' => 'カスミソウ',
                'scientific' => 'Gypsophila',
                'information' => 'カスミソウは小さな花をたくさん咲かせることで知られています。花は直径2〜3センチ程度で、単弁または重瓣（ちょうばん）の形状をしています。一般的なカスミソウの花の色はピンクや紫ですが、白や赤、さまざまな色の品種も存在します。花びらの配置や模様にも個体差があり、美しい花束や庭の彩りを楽しむことができます。

カスミソウは日当たりの良い場所を好みますが、一定の日陰でも育つことができます。耐寒性があり、比較的丈夫な植物ですが、寒冷地では霜に弱いため、適切な保護が必要です。

カスミソウは乾燥に強く、水やりの頻度は少なめで済みます。ただし、長い乾燥期間が続くと花の量や品質に影響が出るため、適度な水やりが必要です。また、土壌は排水性の良いものを選び、過剰な水はけを防ぐことが大切です。

カスミソウは観賞用だけでなく、医療や薬用としても重要な植物です。葉や花にはアルカロイドやアルカロイド誘導体が含まれており、抗がん作用や抗菌作用、降圧作用などの効果があるとされています。特に抗がん作用が注目され、がん治療の補助として利用されることもあります。

カスミソウは育てやすく、花壇や鉢植え、花壇の境界線などにも適しています。花の咲き始めから秋まで長い期間花を楽しむことができます。また、種子からの栽培も可能です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>25,
                'name' => 'カタセタム',
                'scientific' => 'Catasetum',
                'information' => 'カタセタム（学名：Catasetum）は、熱帯地域に自生するラン科の植物で、美しい花とユニークな花構造が特徴です。多くの種類が存在し、それぞれ独自の色や形を持っています。

カタセタムの花は大きくて派手であり、魅力的な色彩を放ちます。花びらや唇弁は様々な色に染まり、赤、黄、オレンジ、ピンク、紫などのバリエーションがあります。また、花の形も多様で、円錐形、星形、トランペット形などがあります。

カタセタムは性別分化した花を持つ特徴的な植物です。一部の種では、雄花と雌花が別々の花序につくられます。特に雄花は大きくて派手で、特徴的な形状をしています。雄花には花粉が多く含まれ、触れると花粉が散布される仕組みになっています。一方、雌花はより小さく地味な印象を受けますが、受粉を受け入れる役割を果たします。

カタセタムは熱帯地域の高温多湿な環境を好みます。日光を好むため、明るい場所で育てるとよいでしょう。また、風通しの良い環境も重要です。水やりは十分に行い、乾燥させないように注意しましょう。成長期には肥料を与えると健康的に成長します。

カタセタムはラン科の中でも栽培がやや難しいとされていますが、花の美しさと独特の花構造から多くの人々に人気があります。花が咲くまでの成長過程や花の開花時期によっても楽しみ方が異なるため、愛好家にとっては興味深い植物と言えます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>26,
                'name' => 'カトレア',
                'scientific' => 'Cattleya',
                'information' => 'カトレア（学名：Cattleya）は、派手で美しい花を咲かせるラン科の植物です。中南米原産であり、多くの種類が存在します。カトレアはラン科の代表的な花であり、その魅力的な花姿から園芸愛好家や花卉業界で人気があります。

カトレアの花は大きく、豪華で派手な色合いを持っています。花びらや唇弁は様々な色に染まり、赤、ピンク、紫、黄などの鮮やかな色彩が特徴です。花びらの形状も多様で、丸い形や放射状に広がる形などがあります。また、花の中心には唇弁があり、その形状や模様も個体によって異なります。

カトレアは光を好むため、明るい場所で栽培することが重要です。しかし、直射日光を避ける必要があります。温度にも注意が必要で、適度な日中の温度差が花の形成を促します。また、湿度も重要で、高い湿度を保つために霧吹きなどを使用すると良いでしょう。

水やりは適度に行い、土が乾いたら水を与えます。過湿にならないように注意し、通気性の良い土壌を用意します。肥料は成長期に適切な栄養素を与えると花が豪華に咲きます。

カトレアの花は一度に複数の花をつけることがあり、花期は数週間から数か月にわたることもあります。花が咲くと香りも楽しむことができ、花の持ちが良いのも特徴です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>27,
                'name' => 'カモミール',
                'scientific' => 'Matricaria chamomilla',
                'information' => 'カモミール（学名: Matricaria chamomilla）は、キク科の一年生または多年生の草本植物で、花を咲かせることで知られています。ヨーロッパ原産であり、世界中で広く栽培されています。

カモミールの花は小さくて白色であり、中心に黄色い円錐状の花頭があります。花びらは細かく切れ込んでおり、繊細で愛らしい印象を与えます。また、花には特有の強い甘い香りがあり、その香りはリラックス効果やストレス緩和に役立つとされています。

カモミールは古くから伝統的な薬草として利用されてきました。花や葉には抗炎症、抗菌、鎮静、消化促進などの効果があり、主に健康や美容に関する目的で使用されます。一般的に、カモミールはお茶として飲まれることが多く、リラックスや睡眠の促進、消化不良の緩和などに効果があるとされています。

カモミールの栽培は比較的容易であり、日当たりの良い場所と適度な水やりが必要です。多くの場合、種子を直接地面にまき、発芽させることが一般的です。成長した植物は地面に広がるように成長し、花を咲かせます。

カモミールは庭の装飾としても人気があります。その美しい花と独特の香りは、庭や花壇を彩り、蜜蜂や他の昆虫を引き寄せます。また、カモミールは他の植物の健康を促進する効果もあるため、他の植物との相性も良いです。

緑茶やハーブティー、エッセンシャルオイルなど、さまざまな形でカモミールを利用することができます。健康や美容に関心のある人々にとって、カモミールは自然な方法でリラックスや健康促進を目指すための重要な植物となっています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>28,
                'name' => 'カラー',
                'scientific' => 'Zantedeschia',
                'information' => 'カラー（Zantedeschia）は、美しい花と特徴的な葉を持つ球根植物です。その名前は、イタリアの博物学者であるガイウス・ザンテデスキにちなんで名付けられました。カラーの花は、カップ状のスプレースと呼ばれる構造であり、多くの品種が存在します。

カラーの花の色は多様で、白、クリーム、ピンク、赤、黄色、紫などのバリエーションがあります。また、花の形も品種によって異なります。花期は主に春から夏にかけてであり、優れた切花としても人気があります。

カラーは湿地や沼地などの水辺に自生していることが多く、湿潤な環境を好みます。そのため、水辺の庭や水生植物園などで見ることができます。また、一部の品種は寒冷地でも耐寒性があり、庭の彩りを添えることができます。

カラーは丈夫で育てやすい植物であり、適切な水やりと日当たりを確保することが重要です。湿潤な土壌を好むため、水はけの良い土壌を用意することが必要です。また、日陰から半日陰の場所を好むため、明るい場所で育てると良い結果が得られます。

カラーは花壇や庭の中で目を引く存在となり、美しい花と特徴的な葉が空間に彩りを添えます。また、切り花としても人気があり、花束やアレンジメントに使われることがあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>29,
                'name' => 'カランコエ',
                'scientific' => 'Kalanchoe',
                'information' => 'カランコエは、熱帯地方を原産とする多肉植物であり、主にアフリカやマダガスカルから多くの種が見つかっています。そのため、暖かい気候を好み、室内での栽培に適しています。特徴的な葉は、厚くて肉厚であり、多くの品種で葉の形や模様が異なります。

カランコエは、豊富な花を咲かせることで知られています。花は小さくてコンパクトであり、クラスター状に集まって咲くことがあります。花色は非常に多様で、赤、オレンジ、ピンク、黄色などの鮮やかな色合いがあります。また、花の形も品種によって異なり、星型や喇叭型などがあります。

カランコエは、育てやすい植物としても人気があります。乾燥に強い性質を持ち、乾燥した環境でも生育が可能です。また、日光を好むため、明るい場所で栽培すると良い結果が得られます。水やりは適度に行い、過剰な水やりは避けるようにします。土壌は排水性の良いものを選び、過湿にならないように注意します。

カランコエは、室内での栽培に適しています。小型でコンパクトな姿勢をしているため、観葉植物としての魅力があります。また、花壇や庭園での栽培にも適しており、鮮やかな花色が庭の彩りを添えます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>30,
                'name' => 'カンナ',
                'scientific' => 'Canna',
                'information' => 'カンナは、サトイモ科に属する多年草であり、茎は直立し、高さは数十センチから数メートルにもなることがあります。葉は大型で幅広く、緑色または紫色をしており、葉脈がはっきりと目立ちます。一部の品種では、葉に模様や斑点があり、さらに魅力を引き立てます。

しかし、最も特徴的な要素は、カンナの花です。花は大きくて美しく、一重または重ね咲きの形状をしています。花色は非常に多様であり、赤、オレンジ、黄色、ピンク、白など、鮮やかで目を引く色合いがあります。また、一部の品種では、花の中心部に対照的な色合いや模様が現れることもあります。

カンナは、日光を好む植物であり、明るい場所で栽培することが理想的です。十分な日光を浴びることで花がより美しくなります。土壌は水はけの良いものを選び、水やりは適度に行います。乾燥気味の環境を好むため、過剰な水やりは避けるようにします。

カンナは、寒冷地では一年草として育てられますが、温暖な地域では多年草として長く育てることができます。寒さに弱いため、寒冷地では冬季に室内に取り込んで越冬させることが一般的です。

庭園や庭先での栽培において、カンナは魅力的な要素となります。その鮮やかな花色と迫力のある姿は、庭の美しさを引き立てます。一部の品種では、切花としても利用され、花束や装飾に使われます。

カンナは、繁殖力があり、種子や株分けによって増やすことができます。また、交配によって新しい品種を作り出すことも可能です。

カンナは、美しい花を楽しむだけでなく、その根茎や花弁には一部の種類において薬効成分が含まれていることも知られています。伝統的に、一部の地域ではカンナの根茎を利用して薬草として使用されてきました。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>31,
                'name' => 'カンパニュラ',
                'scientific' => 'Campanula',
                'information' => 'カンパニュラは、一年生または多年生の草本植物であり、茎は直立し、高さは数センチから数メートルに及ぶものがあります。葉は対生し、形状は卵形から長楕円形までさまざまです。一部の品種では、葉には歯や鋸歯があり、装飾的な要素となります。

しかし、最も注目されるのは、カンパニュラの花です。花は鐘形または星形をしており、直立して咲きます。花の色は多様で、青、紫、ピンク、白などのバリエーションがあります。一部の品種では、花の中央に目立つ斑点や模様が現れ、花の美しさを一層引き立てます。

カンパニュラは、日光を好む植物であり、明るい場所で栽培することが望ましいです。また、水はけの良い土壌を好みます。適度な水やりと排水性の良い土壌を提供することで、健康な成長と花の豊富な咲き方を促すことができます。

カンパニュラは、一部の品種が耐寒性があり、寒冷地でも栽培が可能です。一年草や多年草の種類があり、地域の気候や環境に応じて適切な品種を選ぶことが重要です。

庭園や花壇での栽培において、カンパニュラは魅力的な要素となります。その美しい花と独特の形状は、庭園の景観や花壇のアクセントになります。また、一部の品種は切花としても利用され、花束や装飾に使用されることもあります。

カンパニュラは、種子や株分けによって増やすことができます。また、交配によって新しい品種を作り出すことも可能です。そのため、さまざまな形状や色合いのカンパニュラを楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>32,
                'name' => 'キキョウ',
                'scientific' => 'Platycodon grandiflorus',
                'information' => 'キキョウの特徴的な花は、円錐形や筒状の形をしており、直立して咲きます。花の色は多様で、青紫や白、ピンク、赤などのバリエーションがあります。また、一部の品種では花弁の中央に目立つ斑点や模様が現れることもあります。花の形や色彩は、季節によって異なる品種があり、それぞれ独自の美しさを持っています。

キキョウは、一年生または多年生の草本植物であり、茎は直立し、高さは数十センチから数メートルになることもあります。葉は互生し、形状は卵形や楕円形で、緑色の葉身が美しいコントラストを作り出します。一部の品種では、葉にも斑点や模様が現れ、観葉植物としても人気があります。

キキョウは、日光を好みますが、強い日差しや暑い気候にはやや弱い傾向があります。適度な光量と風通しの良い場所で育てることが望ましいです。また、水はけの良い土壌を好みますが、乾燥にもやや強く、過湿には弱い傾向があります。適切な水やりと排水性の良い土壌を提供することで、健康な成長と花の豊かな咲き方を促すことができます。

キキョウは、日本の伝統的な文化や花卉装飾において重要な位置を占めています。七夕の飾り物や花束、庭園の彩りなど、さまざまな場面で利用されています。また、切り花としても人気があり、鮮やかな花色と個性的な形状が、花束やアレンジメントに華やかさを与えます。

キキョウは、種子や球根を使って増やすことができます。種子は春に蒔き、球根は秋に植えることが一般的です。また、定期的な剪定や施肥を行うことで、植物の健康な成長と美しい花を楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>33,
                'name' => 'キョウチクトウ',
                'scientific' => 'Nerium oleander',
                'information' => '
                キョウチクトウの花は、鐘型または筒状で、花弁が独特の形状をしています。花弁の端が上に向かって開き、中央部分はしっかりと閉じています。花弁の色は、白やピンク、紫、赤、オレンジなど多彩であり、中には斑点や模様がある品種もあります。花の形状と色彩の組み合わせは、非常に美しく、視覚的な魅力を持っています。

キョウチクトウは多年生の草本植物であり、茎は直立して伸び、高さは数十センチから数メートルになることもあります。葉は互生し、形状は細長い楕円形で、緑色の葉が美しいコントラストを作り出します。また、一部の品種では、葉の形状や色が異なるため、観葉植物としても楽しむことができます。

キョウチクトウは、日光を好みますが、強い日差しや暑い気候にはやや弱い傾向があります。適度な光量と風通しの良い場所で育てることが望ましいです。土壌は水はけが良く、適度な湿度を保つことが大切です。また、耐寒性があり、寒冷地でも比較的よく育ちます。

キョウチクトウは、種子または株分けによって増やすことができます。種子は春に蒔き、適切な温度と湿度を保って発芽させます。株分けは秋に行うことが一般的で、健康な株から根を分けて植え付けます。適切な水やりと施肥を行いながら、成長をサポートしてください。

キョウチクトウは、その美しい花姿から庭園や花壇のアクセントとして人気があります。また、切り花としても利用され、花束やフラワーアレンジメントに華やかさを加えます。鮮やかな色彩と独特の形状は、観賞価値が高く、花の愛好家や庭師の間で広く栽培されています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>34,
                'name' => 'キンギョソウ',
                'scientific' => 'Antirrhinum majus',
                'information' => 'キンギョソウの花は、鮮やかな色彩を持ち、円錐形の花序に多くの花をつけます。花色は様々で、オレンジ、赤、黄色、ピンク、白などがあります。また、花びらの形状も多様で、円形や星型、絞り込まれた形などがあります。そのため、花の見た目が金魚に似ていることから、「金魚草」と呼ばれています。花期は春から夏にかけてであり、長い期間にわたって花を楽しむことができます。

キンギョソウは、直立した茎を持ち、高さは20〜50センチメートル程度になります。葉は対生し、長い楕円形で、深緑色の葉が美しいコントラストを作り出します。また、茎や葉には細かい毛があり、触れるとやわらかな感触があります。

キンギョソウは、日光を好みますが、強い直射日光にはやや弱い傾向があります。適度な光量と風通しの良い場所で育てることが望ましいです。土壌は水はけが良く、適度な湿度を保つことが重要です。乾燥に弱いため、定期的な水やりが必要です。また、肥沃な土壌や有機質の肥料を与えることで、健康的な成長を促すことができます。

キンギョソウは、種子または株分けによって増やすことができます。種子は春に蒔き、湿度と温度を適切に管理して発芽させます。株分けは秋に行うことが一般的で、健康な株から根を分けて植え付けます。成長した植物は、定期的な剪定や支柱を行うことで形を整えることができます。

キンギョソウは、庭園や花壇での景観づくりにおいて魅力的な存在です。その鮮やかな花色と特異な形状は、庭やテラスを華やかに彩ります。また、鉢植えとしても人気があり、インテリアやベランダなどに置いて楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>35,
                'name' => 'キンセンカ',
                'scientific' => 'Calendula',
                'information' => 'キンセンカの花は、一重または八重の形状を持ち、黄色、オレンジ、赤、ピンク、白などの鮮やかな色彩を持っています。花の中心部には黒や暗紫色の目立つ模様があり、独特の装飾効果を与えます。花期は春から初夏にかけてであり、長い間花を楽しむことができます。

キンセンカの植物は小型であり、高さは10〜30センチメートル程度になります。葉は対生し、細長い形状をしています。茎や葉には毛があり、触れるとやわらかな感触があります。また、キンセンカの花は切り花としても人気があり、鮮やかな色合いと長い持ちが特徴です。

キンセンカは、日光を好みますが、強い直射日光にはやや弱い傾向があります。適度な光量と風通しの良い場所で育てることが望ましいです。土壌は水はけが良く、適度な湿度を保つことが重要です。乾燥に弱いため、定期的な水やりが必要ですが、過湿にも注意が必要です。また、肥沃な土壌や有機質の肥料を与えることで、健康的な成長を促すことができます。

キンセンカは、種子または株分けによって増やすことができます。種子は春に蒔き、湿度と温度を適切に管理して発芽させます。株分けは秋に行うことが一般的で、健康な株から根を分けて植え付けます。また、キンセンカは寒さにやや強いため、寒冷地でも栽培が可能です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>36,
                'name' => 'クジャクサボテン',
                'scientific' => 'Epiphyllum',
                'information' => '
                クジャクサボテンは球形で、成長すると直径30〜90センチメートルにもなります。表面は濃い緑色をしており、独特のリブ（凹凸のある模様）があります。しかし、最も目を引くのはその黄色い棘です。数百本の鋭い棘が球体全体を覆い、まるでクジャクの尾羽根のように美しい光景を作り出します。

クジャクサボテンは、乾燥した砂漠地帯を原産地としており、乾燥に強く、日照条件が良い環境を好みます。日当たりのよい場所で栽培し、風通しの良い場所に置くことが重要です。耐寒性がありますが、極端な寒さから守るためには屋内に移動するなどの対策が必要です。

水やりに関しては、クジャクサボテンは乾燥に耐える能力が高いため、過剰な水やりは避けるべきです。春から秋にかけて、土の表面が完全に乾いたら、水を与えます。冬季は休眠期間であり、水やりを控えます。また、水を与える際は、葉の上部ではなく、根部に向けて行うことが望ましいです。

肥料は、成長期の春と夏に与えることが良いでしょう。石灰分を含まない肥料を使用し、薄めて与えます。過剰な肥料は根や茎を傷つける可能性があるため、注意が必要です。

クジャクサボテンは、一般的に種子やオフセット（株分け）によって増やすことができます。種子は春に蒔き、適切な湿度と温度を保って発芽させます。オフセットは成熟した株から分離し、新しい鉢に植え付けます。

最後に、クジャクサボテンは魅力的な見た目と丈夫さから、多くの人々に愛される観葉植物です。しかし、その鋭い棘には注意が必要ですので、扱う際には十分な注意を払ってください。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>37,
                'name' => 'クチナシ',
                'scientific' => 'Gardenia jasminoides',
                'information' => 'クチナシは、直径5〜8センチメートルほどの大きな白い花を咲かせます。花は一重または八重の形状で、中心部には黄色の雄蕊があります。花びらは柔らかく、繊細な質感を持ち、美しい形状と香りを楽しむことができます。クチナシの芳香は非常に強く、特に夜間に香りが高まります。その香りは爽やかで甘く、多くの人々に癒しとリラックスをもたらしてくれます。

クチナシの栽培には注意が必要です。日本の気候に適しており、日当たりの良い場所で育てることが理想的です。耐寒性がありますが、特に寒冷地では冬季の保護が必要です。土壌は酸性〜中性で、水はけが良く、湿度が適度な環境が好まれます。また、風通しの良い場所を選び、水やりには注意が必要です。適度な水やりを心掛け、土壌が乾燥しすぎないように管理しましょう。

クチナシは、庭園やベランダ、室内での観賞用として人気があります。花の美しさと香りは、庭や室内空間に優雅さと癒しをもたらしてくれます。花を楽しむだけでなく、クチナシの葉や枝は茶色に変色することがあるため、庭の緑のアクセントとしても利用されます。

また、クチナシには伝統的に特別な意味があります。日本では、クチナシの花は結婚式やお祭りなどの特別な場に使われ、幸福や祝福を象徴する花とされています。そのため、特別なイベントの装飾やギフトとしても人気があります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>38,
                'name' => 'グラジオラス',
                'scientific' => 'Gladiorus',
                'information' => 'グラジオラスは、直立した茎に多数の花をつける特徴があります。花はさまざまな色やパターンを持ち、鮮やかで美しい姿が特徴です。花びらは広がり、グラデーションや斑点模様などの魅力的なデザインを持つことがあります。花の形状も多様で、一重のものから八重のものまでさまざまなバリエーションがあります。

グラジオラスは夏に花を咲かせることが一般的です。成長には充分な日光と温暖な気候が必要です。直射日光を好むため、十分な日照が確保できる場所に植えることが重要です。土壌は排水性が良く、水はけの悪い場所は避けましょう。また、球根は凍結に弱いため、寒冷地では冬期に保護が必要です。

グラジオラスの球根は、春に植え付けられます。球根を土中に埋め、適切な深さと間隔を保ちます。成長期には水やりが重要で、土壌が乾燥しないように注意しましょう。また、肥料を適切に施し、病気や害虫の管理にも注意を払います。花が咲いた後は、枯れた花を摘み取ります。これによってエネルギーが球根に戻り、次の成長期に備えることができます。

グラジオラスは切り花としても人気があり、花瓶やアレンジメントに使用されます。花持ちが良く、美しい色と形状を長く楽しむことができます。また、グラジオラスは花壇や庭のアクセントとしても素晴らしい存在です。他の花や植物との組み合わせによって、美しい景観やカラフルな花壇を作り出すことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>39,
                'name' => 'クリスマスローズ',
                'scientific' => 'Helleborus',
                'information' => 'クリスマスローズは、多年生の草本植物であり、直立した茎と大きな花を特徴としています。花は5枚の花弁と多数の雄しべ、雌しべを持ち、豊富な色と模様を楽しむことができます。一般的な品種では、白やピンク、赤、紫などの花色が見られます。また、花びらには縞模様や斑点模様があることもあります。

クリスマスローズは寒冷地を好み、寒さに強い特性を持っています。寒冷地では冬季に花を咲かせることが一般的ですが、温暖な地域では春や秋にも花を楽しむことができます。半日陰から日陰の環境を好み、強い日光にさらされると花が傷んでしまうことがあります。また、湿度の高い環境を好みますので、適度な水やりと湿度管理が重要です。

クリスマスローズの栽培には、適切な土壌と日陰の場所が必要です。土壌は排水性が良く、水はけの悪い場所は避けましょう。また、有機質の豊富な土壌を好みますので、堆肥や腐葉土を混ぜて栽培すると良いでしょう。植え付けの際には、株間を適切に保ちながら根を傷つけないように注意しましょう。

クリスマスローズは比較的丈夫で病気に強いですが、時折、葉に病気や虫害が発生することがあります。定期的な点検と予防処置が必要です。花が終わった後は、古い葉を刈り取り、株を整理することで次の成長期に備えましょう。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>40,
                'name' => 'クレマチス',
                'scientific' => 'Clematis',
                'information' => 'クレマチスの花は、直径数センチメートルから数十センチメートルにもなる大きさで、一重の花や八重の花などさまざまな形態があります。花の色も豊富で、白、ピンク、紫、青、赤などの鮮やかな色合いを持つ品種が存在します。また、花びらには模様や斑点があるものもあり、花の美しさと多様性がクレマチスの魅力となっています。

クレマチスはつる性の植物であり、他の植物や支柱に絡まって成長します。庭やテラスのアーチや柵、壁などに植え付けると、美しいつるが伸びて鮮やかな花を咲かせる様子は素晴らしい光景となります。また、一部の品種では地面を這うように成長するものもあります。

クレマチスの栽培には、適切な土壌と日光の供給が重要です。日照が豊富な場所で育てることで、花の咲き具合や色合いがより美しくなります。土壌は排水性が良く、水はけの悪い場所は避けましょう。また、肥沃な土壌を好むため、堆肥や有機質の添加物を混ぜて植え付けると良いでしょう。

クレマチスは水を好みますので、乾燥しないように適度に水やりを行いましょう。特に成長期や花の咲く時期には水分をしっかりと供給する必要があります。また、肥料も定期的に施し、栄養を補給することが大切です。

クレマチスは強健な植物ですが、一部の品種では病気や害虫に対して敏感なことがあります。定期的な点検と予防処置を行い、病気や害虫の発生を防ぐようにしましょう。

クレマチスは春から夏にかけて花を咲かせることが多いですが、品種によっては秋にも花を楽しむことができます。豪華で華麗な花が庭やガーデンを彩り、美しい景観を作り出します。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>41,
                'name' => 'クロッカス',
                'scientific' => 'Crocus',
                'information' => 'クロッカスの花は、直径数センチメートル程度の小さな花でありながら、一重咲きや八重咲きなど多様な形状が存在します。花の色も多彩で、白、黄色、紫、青など鮮やかな色合いを持つ品種があります。また、一部の品種では花びらの先端に模様や斑点があるものもあり、花の美しさに加えて個性的な特徴も楽しむことができます。

クロッカスは早春に咲く花であり、冬の終わりから春の訪れを告げる存在として広く愛されています。花が地上に姿を現すと、まだ寒さの残る季節に一斉に彩りを添えます。そのため、庭や花壇の彩りを早い段階から楽しむことができるのです。

クロッカスの栽培には、適切な場所と土壌が重要です。日当たりの良い場所で栽培しましょう。また、排水性の良い土壌を好むため、水はけの良い土壌を用意することが大切です。土壌が湿り気を持ちすぎると球根が腐る恐れがあるため、適度な水やりと乾燥を防ぐことも忘れずに行いましょう。

クロッカスの球根は秋に植え付けることが一般的です。球根を適切な深さに植え、根がしっかりと張るようにします。冬期には地上部が枯れるため、保護のために落ち葉やマルチを敷くと良いでしょう。

クロッカスは比較的丈夫な植物ですが、害虫や病気に注意が必要です。特にネズミやウサギが球根を食べることがありますので、適切な対策を講じましょう。また、球根腐れやうどんこ病などの病気に感染しないよう、定期的な管理と注意が必要です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>42,
                'name' => 'クンシラン',
                'scientific' => 'Clivia miniata',
                'information' => 'クンシランは、大きな葉を持ち、長い花茎から複数の花を咲かせることが特徴です。花の色は多様で、白、ピンク、紫、黄色などのバラエティに富んだ色合いを持つ品種が存在します。また、花びらの模様や斑点があるものや、斑入りの葉を持つものなど、多彩なバリエーションが楽しめます。

クンシランは、涼しい気候を好む植物であり、一般的には寒冷地や高地の山岳地帯で自生しています。そのため、栽培する際には、日中の気温が高くなりすぎない場所や、夜間の冷涼な環境が重要です。直射日光は避け、明るい場所で適度な日陰を与えると良いでしょう。

土壌は、クンシラン特有の根の形状に合わせて、排水性の良い培養土を使用します。湿度が高い環境を好むため、通気性の良い容器や鉢に植え付けることも重要です。また、定期的な水やりや霧吹きによる湿度の調節も行いましょう。

クンシランは根が張りやすいため、鉢の植え替えは数年に一度程度で十分です。成長期の春から夏にかけては、肥料を与えて栄養を補給しましょう。花が終わった後は休眠期に入り、水やりや肥料を控えることが大切です。

病害虫の管理にも注意が必要です。特に根腐れや黒点病、葉食害を引き起こす害虫に対しては、早期発見と適切な対策を行いましょう。定期的な観察と管理を行うことで、健康なクンシランを育てることができます。

クンシランは、その美しい花姿と芳香によって多くの人々に愛されています。洋ランの中でも比較的栽培が容易であり、初心者でも楽しむことができる品種も存在します。ぜひ、クンシランの栽培に挑戦して、その魅力を堪能してください。






',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>43,
                'name' => 'コーヒーノキ',
                'scientific' => 'Coffea arabica',
                'information' => 'コーヒーノキは、高さ数メートルに達することもある落葉性の木で、丸くて光沢のある葉を持ちます。花は小さく白色で、短い花茎から集まった穂状の形で咲きます。花の香りは爽やかで甘く、特に朝に咲くことから「モーニングフラワー」とも呼ばれています。

コーヒーノキは、熱帯および亜熱帯地域の湿潤な環境を好みます。栽培する際には、日光を十分に浴びる明るい場所が適しています。土壌は水はけが良く、保水性がありながらも水loggingしないことが重要です。また、高温多湿な環境を好むため、湿度を保つことが必要です。

コーヒーノキの栽培には、定期的な水やりと適切な肥料の供給が必要です。土壌が乾燥し過ぎないように注意し、水やりは土壌表面が乾いたら行いましょう。また、窒素やカリウムなどの栄養素をバランス良く与えることで、健康な成長と豊かな収穫を促すことができます。

コーヒーノキは、花から実が成熟するまでに時間がかかります。一般的には2〜3年経過してから収穫が可能となります。実が完全に熟した状態で収穫することが重要であり、収穫後には適切な加工と乾燥を行い、コーヒー豆としての品質を確保します。

病害虫の管理も重要です。特にコーヒーノキにはコーヒーベリーボアや葉ハダニなどの害虫が影響を与えることがあります。定期的な観察と害虫駆除を行い、病気や虫害から木を守りましょう。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>44,
                'name' => 'コスモス',
                'scientific' => 'Cosmos bipinnatus',
                'information' => '
                コスモスの特徴的な花は、直径数センチメートルから十数センチメートルにもなり、一重または八重の形態を持ちます。花の色はさまざまで、ピンク、オレンジ、黄色、白など、明るく鮮やかな色合いが特徴です。花の中心部には黒い目があり、華やかさを引き立てています。また、コスモスの花は長い茎に集まって咲くため、花壇や庭の中で立ち姿が美しく映えます。

コスモスは日本をはじめとする多くの地域で栽培されており、比較的育てやすい植物です。日当たりの良い場所を好み、適度な水やりと肥料の供給が必要です。耐寒性がありますが、寒冷な地域では霜に弱いため、寒い季節には保護が必要です。

種から育てる場合、コスモスの種は比較的大きく扱いやすいため、初心者でも挑戦しやすいです。種まきは春や夏に行い、種子を浅く土にまき、軽く覆土をかけます。発芽後は間隔を十分にとり、健康な苗が育つようにします。

コスモスは草丈が高くなるため、支柱やつるを使って支えることもあります。花が咲き終わったら、枯れた部分を刈り取り、剪定して新しい芽が出るように促します。これにより、長く花を楽しむことができます。

コスモスは蜜をたくさんつけるため、蝶やハチなどの昆虫を引き寄せます。自然の生態系においても重要な役割を果たし、庭や周辺の生物多様性を豊かにする助けとなります。

コスモスは、秋の花としても知られており、季節の移り変わりを彩る存在です。その美しい姿と花言葉の「愛の証」から、愛や友情の象徴としても贈り物に選ばれることがあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>45,
                'name' => 'コチョウラン',
                'scientific' => 'Phalaenopsis',
                'information' => 'コチョウランの特徴的な花は、大きくて立体的な形状を持ち、豊富な色彩を楽しむことができます。花の色は白、ピンク、紫、黄色などさまざまで、中には斑点や斑紋のあるものもあります。また、花びらの質感は滑らかで上品であり、優雅さを演出します。一つの茎に複数の花がつくこともあり、花の咲き乱れる姿は見事です。

コチョウランは熱帯地方に自生しているため、高温多湿な環境を好みます。室内では明るい場所を選び、直射日光を避けながら、十分な光を受けるようにします。また、高い湿度を保つために、霧吹きや水を散布することが重要です。水やりは土が乾いたら行い、根腐れを防ぐためにも排水性の良いポットや培養土を選びます。

肥料は、栄養分を豊富に含む専用のラン用肥料を使用し、月に一度程度与えます。花が咲いている時期は特に、栄養補給が必要です。また、定期的に葉の裏側や茎に溜まったほこりを取り除くことも大切です。

コチョウランは、温暖な環境を好むため、冬季には十分な保温を行います。寒冷地では室内で管理し、温度が下がらないように注意します。花芽が出る時期には、温度差があると花芽が形成されにくくなるため、一定の温度管理が求められます。

繁殖方法としては、株分けや種子からの栽培が一般的ですが、初心者には株分けがおすすめです。成長した株から側芽を切り離し、新しい鉢に植え付けることで増やすことができます。

コチョウランは、美しい花を楽しむだけでなく、室内の空気を浄化する効果もあります。そのため、インテリアとしても人気があります。手入れが比較的容易であり、長い花期を楽しむことができるため、多くの人に愛されています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>46,
                'name' => 'サクラ',
                'scientific' => 'Cerasus',
                'information' => 'サクラの花は、5枚の花びらを持ち、優美な形状をしています。花の色は、一般的には淡いピンク色や白色ですが、種類によっては濃いピンクや薄紅色の花も存在します。花弁の端には薄い色合いの斑点や筋が入り、美しい模様を作り出します。また、花の香りは独特で、桜の花の香りは多くの人々に愛されています。

サクラの花は、春になると一斉に咲きます。花の咲き始めから満開までの期間は短く、数日から一週間ほどですが、その一瞬の美しさと儚さが桜の魅力となっています。特に日本では、春の訪れを告げる花として親しまれ、桜の開花がニュースや予報として注目されます。

桜の花は、日本の文化や伝統とも深い関わりを持っています。桜の花は、日本の象徴的な花として広く認知されており、古くから詩や絵画、歌にも歌われてきました。また、桜の花見は日本の風物詩として知られており、家族や友人と一緒に桜の木の下でピクニックを楽しむ慣習があります。

サクラの木自体も美しい姿を持っており、成長すると大きな枝を広げ、優雅な姿を見せてくれます。枝垂れや円錐形の形状をした桜の木があり、庭や公園、街路樹としてもよく植えられています。

サクラの栽培には、適切な日当たりと風通しの良い場所が必要です。また、土壌は水はけの良い砂質のものが適しており、水logging（水の滞留）を避けるためにも排水が良い環境が重要です。花が咲く時期には十分な日光を受けることで、美しい花を楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>47,
                'name' => 'サクラソウ',
                'scientific' => 'Primula sieboldii',
                'information' => 'サクラソウは、直立した茎と多数の小さな花を持つ花序を特徴としています。花は5枚の花弁を持ち、一重咲きまたは半八重咲きの形状をしています。一般的な色は淡いピンク色であり、花の中心には淡い黄色の雄しべが集まっています。花弁の形状や色合いは品種によって異なり、一部では白や濃いピンクの花も見られます。

サクラソウは主に山岳地帯や草原、森林などで野生の状態で見られます。日本全国の様々な地域で自生しており、特に高山地帯でよく見られます。この花は、涼しい気候と湿度の高い環境を好みます。日当たりの良い場所や半日陰の環境で育つことが適しています。

サクラソウの花は、通常は春に咲きます。咲く時期は地域によって異なりますが、一般的には3月から5月にかけて見られます。花期は比較的短く、数週間から1か月ほどですが、その間に多くの花が一斉に咲く様子は圧巻です。

サクラソウは、その美しい花姿や香りから観賞用の植物としても人気があります。日本の庭園や公園、または庭の一角に植えられ、春の訪れを感じさせてくれます。また、サクラソウの花は切り花としても利用され、花瓶や生け花で楽しまれます。

サクラソウの栽培には、適切な土壌と水やりが必要です。日本の風土に適応しているため、一般的には育てやすい植物です。適度な水はけの良い土壌を用意し、日当たりの良い場所に植え付けることが重要です。また、花が終わった後には適切な剪定を行い、株の健康な成長を促すことも大切です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>48,
                'name' => 'サザンカ',
                'scientific' => 'Camellia sasanqua',
                'information' => 'サザンカは、ツバキ科に属する常緑低木で、茎や葉は光沢があります。葉は細長くて先が尖り、暗緑色をしています。花は一重咲きや八重咲きの形態を持ち、花弁の色は白やピンク、赤など様々です。一般的には芳香があり、爽やかな香りを放ちます。花の中心には黄色い雄しべが集まっており、花弁の間からのぞく様子が美しいです。

サザンカは、主に日本や中国などのアジア地域に自生しています。日本では、暖かい気候を好み、特に沿岸部や暖地の山岳地帯で見られます。サザンカは耐寒性があり、比較的寒さに強い植物です。そのため、冬の季節に花を楽しむことができます。一般的には10月から12月にかけて花が咲き始め、春になる前に花期を終えます。

サザンカは、庭園や公園で観賞用として栽培されることが多く、美しい花姿と香りを楽しむことができます。また、切り花としても人気があり、花瓶に活けてインテリアや季節感を演出することができます。

サザンカの栽培には、適切な土壌と日当たりが必要です。サザンカは酸性土壌を好み、保水性の高い土壌が適しています。また、充分な日当たりを受けることで花の開花を促すことができます。水やりは乾燥しないように適度に行い、肥料も適切に与えることが大切です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),
            ], [
//                'id'=>49,
                'name' => 'サツキ',
                'scientific' => 'Rhododendron indicum',
                'information' => 'サツキは、直立した茎と葉が密集した樹形を持ちます。葉は細長く、深緑色で光沢があります。花は直径数センチメートルから十数センチメートルにもなる大きさで、花弁は五弁で、一重や八重咲きなどのさまざまな品種が存在します。花の色は紅色、白色、ピンク色、紫色などがあり、美しい模様や斑点が入る品種もあります。

サツキは、春から初夏にかけて花を咲かせます。花期は長く、長い間楽しむことができます。また、寒さにも比較的強く、耐寒性があるため、冬季でも花を楽しむことができます。

サツキは湿度の高い環境を好みます。日当たりが良く、風通しの良い場所で栽培すると最も良い結果が得られます。また、酸性の土壌を好むため、培土には酸性の土や酸性肥料を使用すると良いでしょう。

サツキは、庭園や鉢植えとして栽培されることが一般的です。庭園では、花壇や石組みなどに組み合わせて植えられ、美しい景観を作り出します。鉢植えでは、ベランダやテラスなどに置いて季節の花として楽しむことができます。

サツキは、日本の伝統行事である「お茶会」や「花見」などにも欠かせない花として重要な役割を果たしています。また、サツキは日本の美意識や四季の移り変わりを象徴する花として、文学や絵画などの文化的な表現でも頻繁に登場します。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>50,
                'name' => 'サルスベリ',
                'scientific' => 'Lagerstroemia indica',
                'information' => 'サルスベリは、美しい花と独特の葉が特徴の落葉樹です。学名は"Lagerstroemia"で、サルスベリ属に属する植物の総称です。主に温暖な地域で栽培され、庭園や公園の景観によく利用されています。

サルスベリの花は夏から秋にかけて咲きます。花は小さくて密集した房状の形をしており、一房に多数の花が咲くことが特徴です。花の色は多様で、ピンク、紫、白、赤などさまざまな色があります。花期が長く、鮮やかな花を楽しむことができます。

また、サルスベリの葉も美しい特徴の一つです。葉は細長い楕円形で、緑色の葉肉があります。葉の表面は滑らかで光沢があり、裏面はやや灰白色を帯びています。葉が茂り、美しい緑のカーテンを作り出すため、観葉植物としても人気があります。

サルスベリは日当たりの良い場所を好みますが、適度な日陰でも育つことができます。また、水はけの良い土壌を好むため、排水性の良い土壌を用意することが重要です。適切な水やりと肥料管理を行うことで、健康な成長と豊かな花を楽しむことができます。

さらに、サルスベリは耐寒性がありますが、極寒地では冬季の保護が必要です。寒冷地ではマルチや保護材を使用して根元を覆い、凍害から保護することが推奨されています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>51,
                'name' => 'サルビア',
                'scientific' => 'Salvia',
                'information' => 'サルビア（学名: Salvia）は、ユリ科サルビア属に属する花であり、世界中で広く栽培されている観賞植物です。サルビアは美しい花と独特の香りで知られており、庭園や花壇で人気があります。

サルビアの花は多様な色彩を持ち、鮮やかな紅色、青色、紫色などがあります。花の形もさまざまで、筒状や唇状の形態を持つものがあります。また、サルビアの葉も特徴的で、多くの種類が葉の形や質感で個性を発揮します。

サルビアは日光を好み、暖かい環境でよく育ちます。耐寒性のある品種もありますが、一般的には温暖な気候での栽培が適しています。土壌の排水性が良く、水はけの良い環境を好みます。

この花は蜜をたくさんつけるため、蜂や蝶などの昆虫によってよく訪れられます。そのため、庭にサルビアを植えることで、自然の生態系を活性化させることもできます。

また、サルビアには薬用としての効能もあります。一部の種類は伝統的な薬草として利用されており、抗炎症や抗酸化作用などの健康効果が期待されています。

サルビアは育てるのが比較的容易であり、花壇や鉢植えなどで楽しむことができます。適切な管理と手入れを行うことで、長い間美しい花を楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>52,
                'name' => 'ジギタリス',
                'scientific' => 'Digitalis',
                'information' => 'ジキタリス（学名: Digitalis）は、キツネノボタン科に属する美しい花です。その優雅な姿と鮮やかな花色で人々を魅了します。

ジキタリスは高さがあり、まっすぐに伸びる茎に集まった花が特徴的です。花の形状は筒状であり、内側に模様や斑点が入ることもあります。主な花色はピンク、紫、白、黄色など多様で、美しい花序が一つの茎に連なって咲き誇ります。

この花は一般的には二年草として知られています。最初の年には葉が発生し、次の年に花が咲く特徴があります。また、一部の種類は多年草として育ち、毎年美しい花を楽しむことができます。

ジキタリスは日当たりがよく、排水の良い土壌を好みます。庭や花壇で栽培されることが一般的であり、美しいアクセントとなります。また、切り花としても人気があり、花束やフラワーアレンジメントに使用されることもあります。

ただし、ジキタリスには毒性があるため、取り扱いには注意が必要です。花や葉を誤って摂取すると健康に悪影響を及ぼす可能性があるため、子供やペットの手の届かない場所に置くことが重要です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>53,
                'name' => 'シクラメン',
                'scientific' => 'Cyclamen persicum',
                'information' => 'シクラメン（学名: Cyclamen）は、ユキノシタ科に属する美しい冬花の代表的な植物です。その独特な花形と鮮やかな花色が人々を魅了し、寒い季節に華やかさをもたらします。

シクラメンの花は優雅で特徴的な形状をしており、薄いペタルが反り返って花弁を作り出します。花色はピンク、紫、白、赤など様々で、中には斑入りやストライプ模様のある品種も存在します。花の中心には目立つ黄色や白色のくぼみがあり、そこから花粉をまき散らす様子が美しいです。

シクラメンは球根植物で、地上部は花が咲く時期に出てきます。一般的には冬から春にかけて花を咲かせることが多いため、寒い季節に庭や室内で楽しむことができます。葉は心形で美しく、花とのコントラストを引き立てます。

この花は適度な湿度と涼しい環境を好みます。日当たりの良い場所や半日陰が適しており、乾燥した環境や直射日光は避けるべきです。また、水やりにも注意が必要で、過湿や水をため込むことで根腐れの原因となります。

シクラメンは室内の観葉植物や寄せ植え、鉢植えとして人気があります。また、切り花としても利用され、花束やインテリアアレンジメントに彩りを添えます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>54,
                'name' => 'ジニア',
                'scientific' => 'Zinnia',
                'information' => 'ジニア（学名: Zinnia）は、キク科に属する一年生または多年生の花で、鮮やかな花色と豪華な花形が特徴的です。その美しい花姿から庭園や花壇、切り花として人気があります。

ジニアの花は一つの茎に多数の花を咲かせる特徴があります。花の形は一重咲きから八重咲きまでさまざまであり、直立した姿勢で立ち上がる花茎に密集した花が咲き誇ります。花色も多彩で、赤、ピンク、オレンジ、黄色、紫など、明るく鮮やかな色合いを持っています。

ジニアは日当たりのよい場所を好み、比較的乾燥にも耐性があります。そのため、夏の日差しにも強く、暑い季節にも美しい花を楽しむことができます。また、土壌の肥沃さや排水性にも注意が必要です。十分な水やりと適切な肥料の管理を行うことで、花の成長と花付きを促すことができます。

ジニアは花壇や庭園の他にも、切り花としても利用されます。花束やフラワーアレンジメントに取り入れることで、鮮やかな色彩と豪華な花形が一層引き立ちます。また、ジニアの花は蝶やハチなどの昆虫にも人気があり、庭に飛来するさまは自然の営みを感じさせます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>55,
                'name' => 'シバザクラ',
                'scientific' => 'Phlox subulata',
                'information' => 'シバザクラ（学名: Phlox subulata）は、ポロックス科に属する多年草の一種です。和名の「シバザクラ」は、花の形状や咲く時期が桜に似ていることから名付けられました。主に北アメリカ原産であり、その美しい花と地を覆うように広がる姿が魅力とされています。

シバザクラは、低木のように地を這う性質を持ち、繁茂した茎や葉が地上を覆いつくす姿が特徴です。葉は針状で細長く、緑色をしており、一面を覆うように広がっています。花は小さく五弁の星形で、直径は約2〜3センチメートルほどです。花の色は多様で、ピンク、パープル、白、赤などさまざまな色があり、花期は春から初夏にかけて咲きます。

シバザクラは、日当たりの良い場所での栽培が好まれます。耐寒性があり、寒冷地でも比較的よく育ちます。また、排水性の良い土壌を好みますが、乾燥にも強く、比較的手入れが簡単です。繁殖は種子や株分けによって行われ、庭や花壇、岩ガーデンなどに植えられることが一般的です。

シバザクラは、その美しい花と広がる姿が魅力で、庭園や公園の地被植物としてよく使われます。地面を覆いつくすように広がり、花の群れが美しい景観を作り出します。また、斜面の固定や石積みの間に植えることで、自然な雰囲気を演出することもできます。

シバザクラは、その耐寒性と美しい花のため、寒冷地を含む広範な地域で人気があります。花の色と密集した咲き方が、庭や花壇に鮮やかな色彩をもたらし、春の訪れを告げる存在として愛されています。さらに、花の香りもある品種があり、庭に芳香を漂わせることができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>56,
                'name' => 'シャクナゲ',
                'scientific' => 'Rhododendron subgenus Hymenanthes',
                'information' => 'シャクナゲ（学名: Rhododendron subgenus Hymenanthes）は、日本を含むアジア地域に自生する落葉性の低木であり、美しい花を咲かせる植物です。シャクナゲは、その豪華な花形と鮮やかな色合いから、庭園や公園の人気のある花木として広く栽培されています。

シャクナゲの花は、鐘形や扇形などの独特な形をしており、花弁が5つから10個程度で構成されています。花の色はさまざまで、ピンク、赤、紫、白などの色合いがあります。花が咲く時期は一般的に春から初夏であり、桜の季節と重なることが多いため、日本の春の花としても親しまれています。

シャクナゲは一般的に酸性土壌を好みます。また、湿度の高い環境や日陰を好み、日差しの強い場所では花や葉が傷つくことがあります。適切な環境下で育てることで、健康的な樹形と美しい花を楽しむことができます。

シャクナゲは観賞用の植物として栽培される一方で、一部の種は薬用や食用としても利用されてきました。葉や花には、アントシアニンやフラボノイドといった様々な成分が含まれており、抗酸化作用や抗炎症作用があるとされています。また、一部の種は伝統的な漢方薬や民間薬にも使用されてきました。

シャクナゲは美しい花を楽しむだけでなく、花言葉としても知られています。一般的に、シャクナゲの花は「おしゃべり」「やさしさ」「内面の美しさ」などの意味を持ち、人々に優しさや美しさを伝える存在として捉えられています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>57,
                'name' => 'シャクヤク',
                'scientific' => 'Paeonia lactiflora',
                'information' => 'シャクヤク（学名: Paeonia lactiflora）は、日本や中国などで広く栽培されている多年草の花です。その美しい花姿と華やかな花色から、庭園や花壇で人気のある花として愛されています。

シャクヤクの花は、大きな花弁を持つ球形の花を形成します。花弁の色は純白やピンク、赤など、さまざまなバリエーションがあります。また、一部の品種では花弁に斑点や模様が入ることもあり、さらに魅力を引き立てています。

シャクヤクは、一般的に春から初夏にかけて花を咲かせます。花期は短いですが、花の美しさと豪華さは見る者を魅了します。花が咲く前には蕾が大きく膨らみ、待ちわびた感じを与えます。そして花が開花すると、立派で存在感のある姿を見せてくれます。

シャクヤクは、日本の伝統的な庭園や仏教寺院の庭にもよく植えられています。その美しい花姿と高貴なイメージから、富と繁栄、幸福を象徴する花としても重要な存在です。また、中国では古くからシャクヤクが栽培され、文化や芸術にも深く根付いています。

シャクヤクの栽培には、適切な環境と手入れが必要です。日当たりの良い場所や緩やかな斜面が適しており、土壌は水はけの良い肥沃なものが好まれます。また、適度な水やりや施肥が必要です。

花が終わった後もシャクヤクは美しい姿を保ちます。葉が茂り、夏には緑のカーテンを形成します。秋には葉が色づき、紅葉のような美しい景観を楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>58,
                'name' => 'シロタエギク',
                'scientific' => 'Senecio cineraria',
                'information' => 'シロタエギク（学名: Senecio cineraria）は、キク科に属する一年草または多年草の植物です。和名の「シロタエギク」は、その葉の色が銀白色であることに由来しています。別名として、シルバーランタンとも呼ばれます。

シロタエギクは、葉が銀白色で繊細な葉状の形状をしており、特徴的な美しい姿が魅力です。葉は柔らかく毛状で、全体的に銀灰色の毛で覆われています。直立した茎から多数の葉が放射状に伸び、密生して茂ります。花は小さく黄色をしており、夏に咲きますが、シロタエギクの魅力は主にその銀白色の葉にあります。

シロタエギクは、地中海地域原産であり、暖かい気候を好みます。乾燥にも比較的耐性があり、日当たりの良い場所でよく育ちます。また、排水性の良い土壌を好みますが、耐寒性はやや弱いため、寒冷地では保護が必要です。繁殖は種子や株分けによって行われます。

シロタエギクは、その銀白色の葉が特徴的で、庭園や花壇、コンテナなどで装飾的な用途に使われます。他の植物とのコントラストをつけるためのアクセントや、銀色の葉が美しい観葉植物としても人気があります。また、切り花としても利用され、ドライフラワーアレンジメントにも適しています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>59,
                'name' => 'シンビジューム',
                'scientific' => 'Cymbidium',
                'information' => 'シンビジューム（学名: Cymbidium）は、ラン科に属する多年生の花で、美しい花姿と独特の香りで知られています。シンビジュームは、主に熱帯および亜熱帯地域に分布しており、世界中で広く栽培されています。

シンビジュームの花は、大きくて立派な形状をしており、一つの茎に複数の花がつきます。花の色はさまざまで、ピンク、白、黄色、赤などの色合いがあります。花弁や唇弁の形状もバラエティに富んでおり、その美しさは花愛好家や園芸愛好家に広く愛されています。

シンビジュームは、日光や温度の変化に敏感であり、栽培には注意が必要です。十分な光を与え、温度や湿度を適切に管理することが育成のポイントです。また、根には水分をたくさん蓄える能力があり、乾燥にも比較的耐性があります。

この花は、長い間咲き続けることができるため、観賞価値が高く、花壇や庭園、室内の観葉植物として人気があります。また、花束やアレンジメントにも使用され、華やかな雰囲気を演出します。

シンビジュームは、花言葉として「優美」「気品」「高潔」などを持っています。その優雅で美しい姿勢は、多くの人々に感銘を与え、上品さと気品を象徴する存在となっています。

また、シンビジュームは、着実な成長と花の咲き方を象徴することから、目標の達成や幸運の象徴ともされます。そのため、贈り物としても喜ばれ、特別な場にふさわしい花として選ばれることがあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>60,
                'name' => 'スイートピー',
                'scientific' => 'Lathyrus odoratus',
                'information' => 'スイートピー（学名: Lathyrus odoratus）は、キンポウゲ科に属する一年生または多年生の花で、その美しい花姿と豊かな香りで人々を魅了しています。スイートピーは、主に温帯地域原産であり、世界中で観賞用やカットフラワーとして栽培されています。

スイートピーの花は、優雅な形状で、一つの茎に複数の花が集まります。花の色は多様で、ピンク、白、紫、黄色などの鮮やかな色合いがあります。また、花びらには模様や斑点が入ることもあり、個性的で魅力的な花です。

香りもスイートピーの特徴の一つであり、フローラルで甘い香りがあります。特に夕方や夜になると香りが増し、花壇や庭、ベランダに漂う香りは心地よく、リラックス効果もあります。

スイートピーは、日当たりの良い場所や肥沃な土壌を好みます。種から育てることが一般的であり、種を直接地面にまいて発芽させることができます。また、鉢植えやコンテナでも栽培することができ、庭やベランダ、テラスなどで楽しむことができます。

花期は春から夏にかけてであり、長い間花を楽しむことができます。花の切り花としても人気があり、花束やアレンジメントに使用されることが多いです。また、スイートピーの花言葉は「幸福な思い出」や「純粋な愛」などであり、特別な日やイベントの贈り物としても選ばれます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>61,
                'name' => 'スイセン',
                'scientific' => 'Narcissus',
                'information' => 'スイセン（学名: Narcissus）は、ヒガンバナ科に属する球根植物で、美しい花と強い香りで知られています。春に咲くスイセンの花は、庭園や公園、花壇などでよく見かけることができます。

スイセンの花は、一つの茎から複数の花が咲く集散花序で、花の形状は星のような形をしています。花の色は黄色や白を基調とし、中にはオレンジやピンクの色合いを持つ品種もあります。花びらは六弁で、中央にはトランペットのような形をした「冠」があります。

スイセンは、寒冷地から亜熱帯地域まで幅広い環境に適応しており、耐寒性があります。球根を地中に植え、春になると美しい花を咲かせます。また、スイセンの栽培は比較的容易であり、初心者でも育てやすい花の一つです。

スイセンの花言葉は「再生」や「希望」などであり、春の訪れや新たな始まりを象徴する花としても知られています。その美しい花姿と芳しい香りは、庭や公園、花壇に華やかさと生命力をもたらします。

一般的に、スイセンの花は切り花としても人気があり、花瓶やアレンジメントに使用されます。その鮮やかな色合いと独特の香りは、室内を彩り、空気を清々しくする効果があります。

ただし、注意点としてスイセンの球根や花は食べることができません。一部の品種には毒性成分が含まれており、摂取すると健康に害を及ぼす可能性があるため、注意が必要です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>62,
                'name' => 'スイレン',
                'scientific' => 'Nymphaea',
                'information' => 'スイレン（学名: Nymphaea）は、睡蓮科に属する美しい水生植物であり、その鮮やかな花と葉の姿が特徴です。スイレンは主に淡水の池や湖、流れる川などの静水域に生育しており、世界中で観賞用に栽培されています。

スイレンの花は大きく、直径10センチメートル以上にもなることがあります。花弁は多くの品種があり、白、ピンク、黄色、赤などさまざまな色合いを持ちます。また、花弁の形も多様で、シングルフラワーやダブルフラワーなどが存在します。花は水面に浮かび、優雅に広がった花びらと黄色や白色の雄しべが美しいコントラストを生み出します。

スイレンの葉は大きくて丸みを帯びた形状をしており、直径30センチメートル以上にもなることがあります。葉は水上に浮かび、緑色で光沢があります。葉の表面は撥水性が高く、水滴が滑り落ちるような特徴があります。また、葉の裏面には多数の気孔があり、水中での光合成を助けています。

スイレンは水中に根を下ろして生育し、根は長くて太く、泥や水底にしっかりと張り付いています。これにより、スイレンは水の中から栄養を吸収し、安定した状態で成長することができます。

スイレンの花は水上に浮かぶため、水辺の景観や庭園において美しいアクセントとなります。また、スイレンは水の浄化作用も持っており、水中の有害物質を取り除き、水質を改善する効果があります。そのため、生態系のバランスを保つためにも重要な存在となっています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>63,
                'name' => 'スノードロップ',
                'scientific' => 'Galanthus',
                'information' => 'スノードロップ（学名: Galanthus）は、早春に咲く小さな花であり、寒さが残る時期に一足早く春の訪れを告げる存在として知られています。ユリ科スノードロップ属に属するこの花は、愛らしい姿と清楚な美しさで人々を魅了します。

スノードロップの特徴的な特徴は、純白の花弁と緑色の内側の小さな葉（内花被）です。花弁は6枚あり、垂れ下がる形状をしており、中心部には黄色や緑色の斑点があります。この花の姿は、まるで雪の結晶が地上に咲いたかのように美しい光景を作り出します。

スノードロップは寒冷地や温帯地域を好み、主に森林や草原、庭園などで見ることができます。一般的には2月から3月にかけて花開き、寒さにも強く、雪や霜の中でも咲くことができます。そのため、「雪のしずく」という名前が付けられています。

この花は、春の到来や新しい始まりを象徴する意味を持っています。寒い冬を乗り越えて最初に咲く花として、希望や再生の象徴とされています。また、純粋さや清潔さを表現する花言葉も持っており、「純潔」や「希望」、「新しい始まり」などがあります。

スノードロップは庭園や公園などで栽培されることもあり、その可憐な姿が春の景色に彩りを添えます。また、野生の環境でも見ることができ、自然の中での生命力や美しさを感じることができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>64,
                'name' => 'スミレ',
                'scientific' => 'Viola mandshurica',
                'information' => 'スミレ（学名: Viola）は、可憐な花を咲かせる多年草の一種で、世界中で愛される花のひとつです。スミレ属には多くの種類があり、花の形や色、香りなどが異なるため、さまざまな魅力を持っています。

スミレの特徴的な特徴は、小さな花と心型の葉です。花は一重または重瓣であり、紫色や白色、黄色などの色合いを持つことが一般的です。また、香りがあり、特にバイオレットの香りが特徴的で、その優雅な香りは人々を魅了します。

スミレは庭園や野生の自然環境の両方で見ることができます。一部の種類は野生で自生しており、森林や草原、湿地などでよく見られます。また、庭園や花壇で栽培され、美しい花を楽しむこともできます。スミレは比較的育てやすく、耐寒性があるため、寒冷地でもよく栽培されます。

この花は春から夏にかけて咲き、花期が長いことでも知られています。小さな花が集まり、花房を作ることがあり、その姿はとても可愛らしいです。スミレは小さな花であるため、庭や花壇で他の花と組み合わせて植えると、彩り豊かな景色を演出することができます。

花言葉として、スミレにはさまざまな意味があります。主な花言葉は「謙虚」や「謙遜」です。この花は地味な色や小さな姿でありながら、その存在感や美しさで人々を魅了します。また、「思いやり」や「信頼」を表現する花言葉もあり、人々に優しさや温かさを伝える花としても知られています。

スミレは、その可憐な姿や優雅な香りから、詩や文学、芸術の題材としても頻繁に使用されてきました。また、古くから薬用としても利用され、一部の種類は食用としても使われています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>65,
                'name' => 'ゼラニウム',
                'scientific' => 'Pelargonium',
                'information' => 'ゼラニウム（学名: Pelargonium）は、美しい花を咲かせる多年草の一種で、世界中で広く栽培されている人気のある花です。ゼラニウムは、葉の形や花の色、香りなどが多様であり、そのバラエティに富んだ魅力が人々を惹きつけています。

ゼラニウムの特徴的な特徴は、手触りの良い葉と豪華な花です。葉はしっかりとした質感で、形は心型や五角形など様々です。花は小さな花弁が集まり、花房を作ることがあります。花の色は紫色、ピンク、赤、オレンジ、白など多彩であり、その美しさと鮮やかさが目を引きます。また、一部の種類は花弁に模様やストライプがあり、より個性的な雰囲気を持っています。

ゼラニウムは日向を好み、十分な日光を受ける場所で栽培されます。耐寒性があり、暖かい気候であれば屋外で育てることもできますが、寒冷地では室内での栽培が一般的です。育てやすく丈夫な植物であり、初心者でも手軽に楽しむことができます。

ゼラニウムは庭園や花壇、プランターなどさまざまな場所で使われます。単独で植えられるだけでなく、他の植物と組み合わせてアレンジメントすることもよくあります。また、ゼラニウムの花や葉は香りがあり、特にレモンやローズのような香りが特徴的です。その爽やかな香りは、庭やベランダでのリラックスした時間を演出し、心地よい空間を作り出します。

ゼラニウムは花壇だけでなく、室内でも鑑賞することができます。室内で育てる場合は、明るい場所に置き、十分な水やりを行い、適切な温度と湿度を保つ必要があります。花期は主に春から夏にかけてであり、長い間花を楽しむことができます。

花言葉として、ゼラニウムには「友情」や「思いやり」があります。その美しい花姿と香りは、人々に喜びや幸せをもたらし、特別な場面や贈り物にもぴったりです。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>66,
                'name' => 'セントポーリア',
                'scientific' => 'Saintpaulia',
                'information' => 'セントポーリア（学名: Saintpaulia）は、愛らしい姿と美しい花を持つ観葉植物であり、室内での栽培に適した人気のある花です。セントポーリアは別名「アフリカのバイオレット」とも呼ばれ、その名の通りバイオレットに似た花を咲かせます。

セントポーリアの特徴的な特徴は、小さな花と厚い葉です。花は一重や八重の形状で、色は青、紫、ピンク、白など多様であり、その色彩の鮮やかさが目を引きます。花びらには斑点やストライプがあり、個性的な模様も見られます。また、葉は肉厚で光沢があり、緑色や紫色などのバラエティがあります。

セントポーリアは暖かい環境を好み、日陰や明るい室内の場所で育てることが一般的です。直射日光を避け、涼しい場所に置くと良いでしょう。また、適度な湿度と水やりを保つことも重要です。土壌は通気性が良く、水はけの良いものを選びましょう。育てやすい植物であり、初心者でも手軽に楽しむことができます。

セントポーリアは室内で鑑賞することが一般的ですが、屋外での栽培も可能です。暖かい季節にはベランダや庭のシェードガーデンに置いて楽しむことができます。また、セントポーリアは花期が長く、春から秋にかけて連続して花を咲かせます。

花言葉として、セントポーリアには「思いやり」や「やさしさ」があります。その愛らしい花姿と柔らかな色合いは、人々に優しい気持ちや癒しを与えます。また、セントポーリアは贈り物やお祝いの場にも適しており、特別な人への感謝や思いやりを表現するのにぴったりです。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>67,
                'name' => 'ダリア',
                'scientific' => 'Dahlia',
                'information' => 'ダリア（学名: Dahlia）は、メキシコ原産の美しい花を持つキク科の植物です。その華やかで多様な花形や色彩から、庭園や花壇で人気のある花として栽培されています。

ダリアの最も特徴的な点は、その花の多様性です。ダリアは一重咲きから八重咲きまで、大きな花弁や小さな花弁、球状の花から星形の花まで、さまざまな形態の花を咲かせます。花の直径は数センチから数十センチにもなり、圧倒的な存在感を放ちます。また、色彩も非常に豊富で、赤、黄、オレンジ、ピンク、紫、白など様々な色合いを楽しむことができます。

ダリアは夏から秋にかけて花を咲かせるため、その季節に庭や花壇を彩る主役として人気があります。また、切り花としても重宝され、花束やアレンジメントに利用されることも多いです。

ダリアの栽培には、十分な日光と水を与えることが重要です。日当たりの良い場所に植え、乾燥しないように水やりを行いましょう。また、肥沃な土壌や堆肥を与えることで、健康な植物を育てることができます。冬には霜に弱いため、寒冷地では保温対策が必要です。

花言葉として、ダリアには「尊敬」や「華麗なる美」があります。その華やかで美しい花姿は、人々に感動と感激を与えます。また、ダリアは情熱や愛情を表現するのにも適した花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>68,
                'name' => 'タンポポ',
                'scientific' => 'Taraxacum',
                'information' => 'タンポポ（学名: Taraxacum officinale）は、キク科の多年草であり、世界中で広く見られる野生の花です。その特徴的な外観や生態から、多くの人々に親しまれています。

タンポポの最も目立つ特徴は、黄色い円形の花を傘状につけた姿です。花は一つ一つ小さく、密集して咲き、傘のような形状をしています。花弁は細長く、外側に向かって尖っています。花が終わると、その代わりに白い綿毛の房が現れます。この綿毛は、種子が風に運ばれるのを助ける役割を果たしています。

タンポポは非常に強健な植物であり、野原や道端、庭園などさまざまな環境で見かけることができます。特に乾燥地や草地など、他の植物が育ちにくい場所でも頑健に育つことができます。また、根が深く張っているため、土壌の中から栄養を吸収し、成長することができます。

タンポポは日本を含む世界中で食用とされており、葉や花、根を料理に利用することがあります。若い葉はサラダやスープに加えられ、苦みのある風味が特徴です。また、根は煮て飲むことができるタンポポコーヒーとしても知られています。

花言葉として、タンポポには「希望」や「夢」といった意味があります。これは、タンポポが風に乗って種子を運び、新たな命を広める力を持っていることに由来しています。また、タンポポの綿毛を吹くと、その数だけ願いが叶うとも言われています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>69,
                'name' => 'チューリップ',
                'scientific' => 'Tulipa',
                'information' => 'チューリップ（学名: Tulipa）は、ユリ科の球根植物であり、美しい花を咲かせることで知られています。その洗練された姿と多彩な色彩から、人々を魅了し続けています。

チューリップの花は、一重咲きや八重咲きなどさまざまな形状があります。花弁は滑らかな質感で、まるで絹のように光を反射します。また、花の中心には鮮やかな色彩のしべや雄しべが咲き誇り、一層の美しさを添えています。チューリップには赤、黄、ピンク、オレンジ、紫など、さまざまな色の品種が存在し、庭や公園、花壇などで見ることができます。

チューリップは、主に春に咲く花として知られています。その咲く時期によって、さまざまな種類があります。初春に咲く早咲き種から、遅春に咲く遅咲き種まで、長い間花を楽しむことができます。また、球根植物であるため、年々球根が分裂し増えていくため、繁殖力も高く、花壇や庭園の彩りを豊かにしてくれます。

チューリップは、オランダを代表する花としても有名です。オランダでは、毎年春にチューリップの祭りが開催され、無数のチューリップが見事な花畑を作り出します。この風景は世界中から多くの観光客を魅了しており、オランダのシンボルともなっています。

花言葉として、チューリップには「真実の愛」や「美」といった意味があります。その美しい花姿や鮮やかな色彩から、愛や美に対する思いを表現するのにぴったりの花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>70,
                'name' => 'ツツジ',
                'scientific' => 'Rhododendron',
                'information' => '
ツツジ（学名: Rhododendron）は、ツツジ科に属する落葉または常緑の低木や小高木であり、美しい花を咲かせることで知られています。その鮮やかな花色や豪華な花姿から、庭や公園で人気のある花木として栽培されています。

ツツジの花は、直径数センチメートルから十数センチメートルにもなる大きさで、一重咲きや八重咲きなどさまざまな形状があります。花弁は滑らかな質感で、美しい曲線を描きます。また、花の中心には多数の雄しべやしべが密集しており、その様子も見事です。

ツツジの花の色も非常に多様で、ピンク、赤、白、紫などさまざまな色合いがあります。また、花の中には斑点や模様が入ったものや、グラデーションがかかったものなどもあり、その美しさは多くの人々を魅了します。

ツツジは、主に春に花を咲かせる種類が多いですが、中には秋に咲くものもあります。花の咲く時期によってさまざまな種類があり、長い間花を楽しむことができます。また、ツツジは日本の伝統的な庭園や公園でよく見かけることもあり、特に日本の文化において重要な位置を占めています。

ツツジは、酸性の土壌を好み、湿度が高い場所を好むため、日本の気候に適しています。庭や公園でツツジを育てる際には、酸性土壌を作り、適切な水やりと日光を与えることが重要です。また、適切な剪定や手入れを行うことで、美しい花を長く楽しむことができます。

ツツジは、花の美しさだけでなく、花言葉としてもさまざまな意味を持ちます。例えば、「家族の絆」や「情熱的な愛」など、人々の思いや感情を象徴する花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>71,
                'name' => 'ツバキ',
                'scientific' => 'Camellia japonica',
                'information' => 'ツバキ（学名: Camellia）は、ツバキ科に属する常緑樹であり、美しい花を咲かせることで知られています。日本をはじめとするアジア地域で広く栽培され、花の魅力と共に伝統的な文化や風習にも深く結びついています。

ツバキの花は、一重咲きや八重咲きなど多くの品種があります。花の大きさは種類によって異なりますが、一般的に直径5〜12センチメートル程度で、花弁は滑らかで質感があります。花の中心には黄色や赤色の雄しべやしべが集まっており、その美しい色彩が魅力です。

ツバキの花色も多様で、ピンク、赤、白、黄色など様々な色合いがあります。また、花弁には斑点やストライプ模様が入った品種もあり、その美しさは多くの人々を魅了します。さらに、花の咲く時期も種類によって異なり、主に冬から春にかけて咲くものが多いですが、中には秋や夏に咲く種類もあります。

ツバキは、日本の庭園や公園でよく見かけるだけでなく、茶道や花道、盆栽などの伝統文化にも深く関わっています。特に日本では、ツバキの花を茶室や庭園で楽しむ「ツバキ見立て」という習慣があり、花の美しさを鑑賞するだけでなく、茶の湯や花のアレンジメントなどと組み合わせて楽しむこともあります。

ツバキは比較的丈夫な植物であり、日本の気候に適しています。耐寒性があり、寒冷地でも育てることができます。また、酸性の土壌を好むため、酸性性土壌を作って栽培することが望ましいです。日当たりが良く風通しの良い場所で育てると、花の咲き具合が良くなります。

ツバキにはさまざまな品種がありますが、代表的なものには「ヤブツバキ」「サザンカ」「ジャポニカ」といった種類があります。それぞれ花の特徴や栽培条件が異なるため、自分の環境に合わせて選ぶことが大切です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>72,
                'name' => 'デージー',
                'scientific' => 'Bellis perennis',
                'information' => '
デージー（学名: Bellis perennis）は、キク科に属する一年生または多年生の草花です。この花は小さくて可愛らしい姿と、豊かな花色で人々を魅了します。デージーは主にヨーロッパ原産ですが、現在では世界中で栽培されています。

デージーの特徴的な花は、直径1〜4センチメートル程度の小さな頭花で構成されています。花弁は白色やピンク色を中心に、黄色や赤色の中心部を持つものもあります。花弁の形は放射状で、外側の花弁が広がっている姿が特徴的です。花期は春から夏にかけてで、一つの花茎に複数の花が咲きます。

デージーは草丈が低く、芝生や庭の花壇などによく植えられます。また、花の形が星型に見えることから「星の花」とも呼ばれています。その可憐な姿は、庭や公園を明るく彩ります。

この花は比較的丈夫で育てやすく、日当たりの良い場所や排水の良い土壌を好みます。種子をまいて育てることもできますが、一般的には苗を購入して植え付ける方法がよく使われます。デージーは草花としても花壇やハンギングバスケット、鉢植えなど様々な用途に利用され、庭やバルコニーなどで楽しむことができます。

デージーの花言葉は「純粋な愛」「幸福」「青春の希望」などであり、恋人や友人への贈り物にも適しています。また、デージーの花は蜜をたくさん集めるため、蜜蜂や他の昆虫にとっても重要な食べ物源となります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>73,
                'name' => 'デルフィニウム',
                'scientific' => 'Delphinium',
                'information' => 'デルフィニウム（学名: Delphinium）は、キンポウゲ科に属する一年生または多年生の花です。優雅な花姿と鮮やかな花色が特徴で、庭や花壇を華やかに彩ります。デルフィニウムは主にヨーロッパや北アメリカを原産地としており、世界中で人気のある園芸植物として栽培されています。

デルフィニウムの特徴的な花は、直立した花茎の上に集合した花穂で構成されています。花穂の上には、大小さまざまな鮮やかな花が密集して咲きます。花弁は細長く尖り、一つの花弁がくびれた形をしているため、魚の口を思わせることから「デルフィニウム」という名前がつけられました。花色は青色を中心に、白色、紫色、ピンク色などさまざまなバリエーションがあります。

デルフィニウムは高さが1〜2メートルにもなることがあり、垂れ下がるような姿勢を持つものもあります。そのため、背の高い花壇や庭の背景として植えると美しい景観を作り出します。また、切り花としても人気があり、花瓶に飾ることでインテリアにも華やかさを加えることができます。

デルフィニウムの栽培には、日当たりの良い場所と肥沃な土壌が求められます。また、風通しの良い場所で栽培すると良い結果を得ることができます。種子から栽培することも可能ですが、一般的には苗を購入して植え付けることが一般的です。

デルフィニウムの花言葉は「高貴」「誇り高き心」「希望」などであり、花束やアレンジメントの中で使われることが多いです。また、デルフィニウムの花はミツバチや他の昆虫にとっても重要な花の一つであり、庭に植えることで生態系の一部としての役割を果たします。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>74,
                'name' => 'デンドロビウム',
                'scientific' => 'Dendrobium',
                'information' => 'デンドロビウム（学名: Dendrobium）は、ラン科に属する多肉植物であり、美しい花を咲かせる観賞用の植物です。その名前はギリシャ語の「dendron（木）」と「bios（生命）」に由来し、「木に生命を与える」という意味を持っています。デンドロビウムは、主に熱帯や亜熱帯地域に自生しており、世界中で栽培されています。

デンドロビウムの特徴は、直立した偽球茎（ぎきゅうけい）という茎の形状です。偽球茎は肉厚で多肉質であり、葉や花を生み出すための栄養を蓄えます。一つの偽球茎からは複数の花茎が伸び、花茎の先端には美しい花が集まります。

デンドロビウムの花はさまざまな色や形を持ち、一つの花茎に複数の花が咲くこともあります。花の色は白色やピンク色、紫色、黄色など多彩であり、その中には斑入りや模様入りの花もあります。花の形状もさまざまで、咲き乱れる花びらや装飾的な唇弁（りんべん）が特徴的です。

デンドロビウムは温暖な環境を好み、明るい場所で栽培することが推奨されます。適切な温度と湿度の管理が必要であり、特に花芽形成時には寒暖の差を与えることで花をより豪華に咲かせることができます。また、栽培方法には様々な種類があり、一部は地上性で地面に植えられるものもありますが、多くは鉢植えやバスケットに植えられます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>75,
                'name' => 'トケイソウ',
                'scientific' => 'Passiflora',
                'information' => 'トケイソウ（学名: Passiflora）は、マツバウンラン科に属するつる性の植物であり、熱帯から亜熱帯地域を中心に多くの種類が存在します。和名の「トケイソウ」は、その花が鳥形を思わせる形状をしていることに由来しています。トケイソウは、美しい花や独特の実を持つことで知られています。

トケイソウの花は非常に特徴的で、大きな花弁や花被片を持ち、中心部には特徴的な突起やフィラメントがあります。花の色合いは種類によって異なり、鮮やかな赤やオレンジ、紫など多様な色彩を呈します。花期は植物の種類によって異なりますが、多くの種類が春から夏にかけて花を咲かせます。

トケイソウはつる性の植物であり、他の植物や物に絡まるように成長します。葉は手の指のような形状をしており、美しい緑色をしています。一部の種類は、果実をつけることでも知られており、実は鮮やかな色合いや独特の形状をしています。トケイソウの果実は食用にも利用されることがあります。

トケイソウは、温暖な気候を好みますが、一部の種類は寒冷地にも耐性を持っています。日当たりの良い場所や半日陰が適しており、湿度が高い環境を好みます。水はけの良い土壌を好みますが、栽培時には適切な水やりと肥料管理が必要です。

トケイソウは、その美しい花や独特の実、つる性の成長形態が人々の関心を引きます。庭園や公園での景観づくりに利用される他、観葉植物としても人気があります。花や実の鑑賞、つるを伸ばして壁面や柵に絡ませることで緑のアクセントを与えることができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>76,
                'name' => 'トルコギキョウ',
                'scientific' => 'Eustoma',
                'information' => 'トルコギキョウ（Eustoma grandiflorum）は、ギキョウ科に属する一年生または多年生の草花で、和名では「トルコギキョウ」と呼ばれています。トルコギキョウは、主に北アメリカを原産としており、花の美しさから観賞用として広く栽培されています。

トルコギキョウは、直立する茎を持ち、長い葉が互生しています。花は一重または八重の形状で、直径3〜7センチメートルほどの大きな花を形成します。花の色は多様で、ピンク、パープル、ホワイト、ブルー、イエローなどさまざまな色があります。花期は長く、暖かい季節になると連続的に花を咲かせます。

トルコギキョウは、日当たりの良い場所で栽培することが望ましいです。耐寒性が低いため、寒冷地では一年生植物として育てられることが一般的です。また、水はけの良い土壌を好みます。適度な水やりと、栄養豊富な土壌を提供することが大切です。

トルコギキョウは、その美しい花姿から庭園やフラワーベッド、プランターなどで広く利用されます。また、切り花としても人気があり、花束やアレンジメントに使われることがあります。花の美しさだけでなく、花の持ちが良い特徴もあり、長い間楽しむことができます。

また、トルコギキョウは、花言葉として「誠実」「美」「愛らしさ」などを持ち、贈り物やイベントの装飾にも利用されます。特に、ウェディングブーケやブライダルアレンジメントによく使用され、優雅さと華やかさを演出します。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>77,
                'name' => 'ナデシコ',
                'scientific' => 'Dianthus',
                'information' => 'ナデシコ（学名: Dianthus）は、キク科ナデシコ属に属する一年草や多年草の植物で、美しい花と独特の香りで知られています。その花の優雅さと多様な品種が人々を魅了し、庭園や花壇で人気のある花として栽培されています。

ナデシコの花は直径数センチメートルほどで、花弁は5枚からなります。花弁の色は白やピンクを中心に、赤や紫などのバリエーションもあります。花の中心部には目立つ突起があり、その特徴的な形状がナデシコの識別要素の一つです。また、ナデシコの花は香りが豊かで、芳香が広がります。

ナデシコにはさまざまな品種があり、一重咲きや八重咲き、斑入りなど様々な形態が存在します。また、花の形状や色、香りも品種によって異なり、そのバリエーションは非常に豊かです。ナデシコはその美しい花姿と香りから、庭園や花壇のアクセントとして利用されるほか、切り花や鉢植えとしても人気があります。

ナデシコは比較的育てやすい植物であり、日当たりの良い場所を好みますが、一部の品種は半日陰でも育つことがあります。土壌に対しては、水はけの良い砂質の土壌を好みますが、一般的な庭園用の土壌でも育てることができます。また、水やりは適度に行い、乾燥に強い特性を持っています。

ナデシコは日本をはじめ、世界各地で栽培されており、花言葉も国や地域によって異なります。一般的には「愛」「優雅」「幸福」などの花言葉があり、贈り物や特別な場にふさわしい花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>78,
                'name' => 'ニチニチソウ',
                'scientific' => 'Catharanthus roseus',
                'information' => 'Catharanthus roseus（カタランサス・ローゼウス）は、アカネ科（ドクダミ科）に属する多年草で、一般的にはニチニチソウと呼ばれています。ニチニチソウは、熱帯や亜熱帯地域を原産とし、世界中で観賞用や薬用として広く栽培されています。

ニチニチソウは直立する茎を持ち、対生する光沢のある葉が特徴です。花は単生または集まって咲き、直径2〜3センチほどの五弁花を形成します。花の色はさまざまで、ピンク、赤、紫、白、さらには斑入りの花もあります。また、花期は長く、暖かい季節になると連続的に花を咲かせます。

ニチニチソウは日光を好み、日当たりの良い場所で栽培することが望ましいです。土壌は排水性がよく、やや乾燥気味の環境が適しています。耐寒性は低く、寒冷地では一年草として栽培されることが一般的です。

ニチニチソウは、観賞価値が高い花として人気があります。その美しい花姿と鮮やかな色彩は、庭園やフラワーベッド、プランターなどで利用されます。また、切り花としても人気があり、花束やアレンジメントに使われることもあります。

また、ニチニチソウは薬用としても利用されています。植物には、アルカロイドやテルペノイドなどの有効成分が含まれており、抗がん作用や抗菌作用があるとされています。特に、ビンカアルカロイドと呼ばれる成分は、がん治療のための抗悪性腫瘍薬として利用されています。

一方で、ニチニチソウには有毒成分も含まれているため、注意が必要です。特に子供やペットが誤って食べないように注意しましょう。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>79,
                'name' => 'ネリネ',
                'scientific' => 'Nerine',
                'information' => 'ネリネ（学名: Nerine）は、ヒガンバナ科に属する多年草の花です。主に南アフリカ原産であり、美しい花を咲かせることで知られています。

ネリネの特徴は、長くて細い茎につく鮮やかな花です。花弁は6枚あり、豊富な色彩を持っています。ピンク、オレンジ、赤、白など、さまざまな色の品種が存在し、花期に咲き誇る姿はまるで花の絨毯を敷いたかのように美しい光景を作り出します。

また、ネリネは秋に咲くことが特徴的であり、涼しい季節に色鮮やかな花を楽しむことができます。花の形状は星型や鐘型などさまざまで、花径も約5〜10センチメートル程度です。

ネリネは日当たりのよい場所を好みますが、南アフリカ原産であるため、寒さには弱いです。寒冷地では室内で管理されることが一般的です。また、土壌は排水性が良く、やや乾燥した環境を好みます。

この花は切り花としても人気があり、花瓶に生けると優雅な雰囲気を醸し出します。また、庭や鉢植えでも美しいアクセントとなり、園芸愛好家にも人気があります。

ネリネの花言葉は「愛情」「祝福」「華麗」などさまざまな意味を持ちます。その鮮やかな花姿と美しい色彩は、人々に喜びや祝福をもたらし、特別な場面やお祝いの日にふさわしい花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>80,
                'name' => 'ハイビスカス',
                'scientific' => 'Hibiscus',
                'information' => 'ハイビスカス（学名: Hibiscus）は、マロウ科に属する美しい花を咲かせる植物です。熱帯や亜熱帯地域を中心に自生しており、その鮮やかな花色と大きな花の形状で広く愛されています。

ハイビスカスの特徴は、大型の花が印象的であることです。花径は数センチから数十センチにもなり、鮮やかな色合いの花弁が咲き誇ります。赤、ピンク、オレンジ、黄色、白など、さまざまな色の品種が存在し、花びらの模様や形状も異なるバリエーションが楽しめます。

ハイビスカスは一年草や多年草の種類があり、暖かい気候では常緑樹として育ちます。葉は緑色で光沢があり、大きくて特徴的な形状をしています。花は一つずつ咲き、一日でしぼんでしまうことから「一日花」とも呼ばれます。

この花は日当たりのよい場所を好み、湿度が高く風通しの良い環境で育つことが理想です。水はけのよい土壌を好みますが、乾燥にもやや強い性質があります。また、ハイビスカスは耐寒性が低く、寒冷地では冬期に室内に移動する必要があります。

ハイビスカスの花言葉は「情熱」「美」「誇り」などさまざまな意味を持ちます。その鮮やかな花色や大胆な姿勢は、情熱や美しさを象徴し、人々に元気や活力を与える存在とされています。また、ハワイをはじめとする熱帯地域では、ハイビスカスは国花やシンボルとしても重要視されています。

ハイビスカスは、美しい花と鮮やかな色彩が特徴の植物です。その存在感と個性的な花姿は、庭やベランダ、室内での栽培においても人々を魅了します。また、ハイビスカスの花を使ったティーやジュースも人気があり、食用としても楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>81,
                'name' => 'パキラ',
                'scientific' => 'Pachira glabra',
                'information' => 'パキラ（学名: Pachira）は、トロピカルな雰囲気を持つ観葉植物であり、その美しい緑の葉と特徴的な茎の形状が特徴です。

パキラの最も顕著な特徴は、太くてふさふさとした茎を持っていることです。茎は直立し、螺旋状に伸びていきます。茎の表面には特徴的な模様や凹凸があり、その質感が独特な魅力を放ちます。

葉は大きくて光沢があり、手のひらの形に似ています。葉の色は深い緑色で、葉脈がはっきりと浮き出ています。葉の配置は対生であり、茎の先端に集まって生えています。

パキラは室内での栽培に適しており、観葉植物として人気があります。日陰でも育ちやすく、比較的に丈夫な植物です。水やりは適度に行い、過湿や乾燥には注意が必要です。また、パキラは温暖な環境を好むため、冷たい風や寒さに弱い傾向があります。

パキラは風水や幸運の象徴としても知られており、繁栄や財運を呼び込むと信じられています。そのため、家庭やオフィスのインテリアとして人気があり、幸運をもたらす存在として親しまれています。

さらに、パキラの木には貯金をするための伝統的な要素もあります。一般的には「マネーツリー」として知られており、茎の凹凸にコインを挟んでおくことができます。これは財運を象徴する習慣であり、家庭やビジネスの成功と繁栄を願う象徴的な行為として行われています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>82,
                'name' => 'ハス',
                'scientific' => 'Nelumbo nucifera',
                'information' => 'ハス（学名: Nelumbo）は、古代から愛され、芸術や宗教的な象徴として重要視されてきた美しい花です。

ハスは水生植物であり、主に池や湖の浅い水域で見られます。その特徴的な葉は大きくて丸く、水面に浮かんでいる姿は優雅さを感じさせます。葉の表面は光沢があり、水滴が弾かれるような美しい姿が特徴です。

花はハスの最も魅力的な部分であり、大きくて豪華な形状をしています。花弁は重なり合い、直径が数十センチにもなることもあります。花の色は一般的にピンクや白ですが、赤や黄色などのバリエーションも存在します。花の中心部には多数の雄しべと雌しべがあり、美しい花の中に繊細な構造が詰まっています。

ハスは古代文化や宗教の中で重要な役割を果たしてきました。例えば、古代エジプトでは太陽神ラーの象徴とされ、創造や再生のシンボルとして崇拝されていました。また、仏教の教義でも重要な役割を果たしており、悟りの象徴や清浄な心を表すシンボルとされています。

ハスの栽培は、適切な水深と日照条件が必要です。水深の浅い場所に植え、日光が豊富に当たる環境を好みます。また、ハスの根は浮遊性であり、底に土を持っているだけでなく、水中に根を伸ばすこともできます。

ハスの花は季節ごとに咲くため、夏から秋にかけて美しい花を楽しむことができます。花の咲き具合は時間帯や天候によっても異なり、朝には花が開き、夕方には閉じる姿が見られます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>83,
                'name' => 'パフィオペディルム',
                'scientific' => 'Paphiopedilum',
                'information' => 'パフィオペディルム（学名: Paphiopedilum）は、エビスラン科に属する派手で魅力的な花を咲かせるランの一種です。

パフィオペディルムは、特徴的な花の形状とカラフルな色合いで知られています。花弁と唇弁が融合しており、唇弁はくちばしのような形状をしていることが特徴です。花の色は種類によって異なり、赤、黄、ピンク、紫など多様な色彩を持っています。また、花の模様や斑点も個体によって異なり、個性豊かな美しさを魅せてくれます。

パフィオペディルムは、熱帯や亜熱帯地域を原産地とするランで、湿度の高い環境を好みます。陰から半陰の場所で育てるのが適しており、明るすぎる場所では葉が焼けることがあります。また、適度な水やりと通気性の良い培地を提供することも重要です。

この花は、一般的に温室や室内で栽培されますが、一部の種類は屋外でも育てることができます。開花期間は種類や栽培環境によって異なりますが、一般的には春から夏にかけて花を咲かせます。花の寿命は比較的長く、数週間から数ヶ月にわたって楽しむことができます。

パフィオペディルムは、その美しい花姿から園芸愛好家やランの愛好家に人気があります。また、野生種も保護の対象となっており、自然環境の保全が重要視されています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>84,
                'name' => 'ハボタン',
                'scientific' => 'Brassica oleracea',
                'information' => '
ハボタンは、アブラナ科アブラナ属（学名: Brassica oleracea var. ramosa）に属する多年草の植物です。別名をカラシナとも呼ばれます。日本や中国をはじめとするアジア地域で栽培され、食用としても利用されています。

葉牡丹の特徴は、豊富な葉の形状と美しい葉の模様です。葉は大きくて厚みがあり、円形や卵形をしています。葉の表面には深い切れ込みがあり、美しい波打った形状をしています。葉の色は濃い緑色で、時には紫や赤みを帯びることもあります。

葉牡丹は寒冷地を好み、涼しい気候での栽培が適しています。一年草としても育てられますが、多くは冬季を越すことで生育します。春には美しい黄色の花を咲かせますが、葉が主な鑑賞ポイントです。

葉牡丹は食用としても利用されており、若葉や茎を食べることができます。若葉は独特の苦味を持ち、サラダや炒め物、漬物などに使われます。また、日本料理の一つであるおひたしにもよく使われます。

葉牡丹は栽培が比較的容易であり、庭やプランターで育てることができます。涼しい場所や半日陰の環境を好みます。肥沃な土壌と適度な水やりが必要です。また、寒さに強いため、寒冷地でも育てることができます。

葉牡丹の美しい葉の形状と色合いは、庭や花壇の観賞用植物として人気があります。その鮮やかな緑色や紅葉、波打った葉の形状は、庭や景観に奥行きと彩りを加えることでしょう。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>85,
                'name' => 'バラ',
                'scientific' => 'Rosa',
                'information' => '
バラ（学名: Rosa）は、バラ科に属する美しい花を咲かせる植物で、古くから世界中で愛されてきました。

バラは、その多様性と美しさで知られています。花の形状や色、香りにはさまざまなバリエーションがあり、単独で咲く花や房状に集まった花を持つ品種があります。花の色は紅、ピンク、白、黄など多彩であり、花びらの形状もさまざまです。また、香りも豊かで、特に一部の品種はその芳香が庭や庭園を満たします。

バラは、世界中で栽培されており、庭園、公園、花壇など様々な場所で見ることができます。さまざまな品種があり、それぞれの特徴によって庭や環境に美しさを加えます。また、バラは切り花としても人気があり、花束やアレンジメントに利用されます。

バラは、日当たりが良く風通しの良い場所を好みます。適切な土壌と水やりが重要であり、定期的な剪定や管理が必要です。また、一部の品種は寒さに弱いため、寒冷地では冬季の保護が必要です。

バラには、多くの文化や象徴的な意味があります。花言葉としては、愛、美、情熱、調和などを表すことがあります。また、バラは多くの文学作品や詩に登場し、愛や美の象徴として頻繁に使用されます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>86,
                'name' => 'ヒアシンス',
                'scientific' => 'Hyacinthus orientalis',
                'information' => '
ヒヤシンス（学名: Hyacinthus）は、春に美しい花を咲かせる球根植物です。その鮮やかな色合いと豊かな香りで知られています。

ヒヤシンスは、直立した花茎の上に集まった花を咲かせます。花の形状は鐘状であり、密集した花弁が円錐状に配置されています。一つの茎に複数の花が咲き、花の色は紅、ピンク、白、青など多彩です。また、花弁には縞模様やグラデーションがある品種もあります。ヒヤシンスの花は非常に香り高く、甘く芳しい香りを放ちます。

ヒヤシンスは、寒冷地を好みます。寒い冬を越すために球根を地中に植え、春になると美しい花を咲かせます。適切な水やりと十分な日光を受けることが重要です。また、球根は定期的に掘り起こし、分けることで増やすことができます。

ヒヤシンスは、庭園や花壇、鉢植えなどでよく栽培されます。一つだけ植えるだけでも美しい花を楽しむことができますが、複数の球根をまとめて植えることで、より豪華な花のディスプレイを作ることもできます。また、ヒヤシンスは切り花としても人気があり、花瓶やアレンジメントに使用されます。

ヒヤシンスには、春の到来や再生の象徴としての意味合いがあります。花言葉としては、愛、美、喜び、尊敬などを表すことがあります。また、ヒヤシンスはオランダの国花でもあり、オランダの花市場やチューリップ祭りなどで特に重要な花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>87,
                'name' => 'ビオラ',
                'scientific' => 'Viola',
                'information' => 'ビオラ（学名: Viola）は、小さな花を咲かせる多年草であり、美しい花と独特の香りで知られています。

ビオラは、小型で可憐な花を持つ植物であり、花の直径は約2〜3センチメートル程度です。花の形状は、五弁花で中央に黄色の目立つ部分があります。花の色は非常に多様で、紫、青、ピンク、黄、白などさまざまな色合いがあります。また、花弁には斑点やストライプの模様がある品種も存在します。花期は春から夏にかけてであり、長い期間花を楽しむことができます。

ビオラは、比較的育てやすい植物であり、庭園や花壇、鉢植えなどでよく栽培されます。日向や半日陰の場所を好み、適度な水やりと排水性の良い土壌が必要です。また、耐寒性があり、寒冷地でも比較的よく育ちます。

ビオラは、季節の移り変わりや春の到来を象徴する花として広く愛されています。花言葉としては、謙虚さ、忍耐、誠実さ、思いやりなどを表すことがあります。また、ビオラの花は食用としても利用され、サラダやケーキの飾りとして使われることもあります。

ビオラの小さな花は、その存在感と鮮やかな色合いによって庭や花壇を彩ります。花の集まりやアレンジメントとしても魅力的であり、他の花との組み合わせやコントラストを楽しむことができます。また、ビオラは虫除けの効果もあるため、庭の害虫対策にも役立ちます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>88,
                'name' => 'ビカクシダ',
                'scientific' => 'Platycerium',
                'information' => 'ビカクシダ（学名:Platycerium）は、観葉植物として人気のある多年草です。

ビカクシダは、直立した茎から放射状に広がる葉を持つ植物で、特徴的な白い縞模様が入った緑色の葉が特徴です。葉の形は細長く、先端が尖っており、葉の中央から側方に向かって垂れ下がることもあります。成熟すると、葉から細い茎が伸び、小さな白い花が咲きます。花は比較的地味で目立たないため、ビカクシダの魅力は主にその美しい葉にあります。

ビカクシダは、育てやすい植物であり、室内環境での栽培に適しています。日陰でも十分に育つため、明るい場所や窓際に置くことが一般的です。水やりは適度に行い、乾燥気味の環境を好みます。また、耐寒性がありますが、極端な低温には弱いため、寒い地域では冬期に室内で管理することが必要です。

ビカクシダは、室内の装飾として人気があります。その美しい葉は、空間に生気を与え、癒しの効果をもたらします。また、ビカクシダは空気中の有害物質を吸収し、室内の空気を浄化する効果もあります。そのため、インテリアとしてだけでなく、健康的な環境づくりの一環としても利用されています。

ビカクシダは、株分けや挿し芽などの簡単な方法で増やすことができます。成長が旺盛で、比較的速く増えるため、短期間で鮮やかな緑のカーテンを作り出すことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>89,
                'name' => 'ヒガンバナ',
                'scientific' => 'Lycoris radiata',
                'information' => 'ヒガンバナ（学名: Lycoris radiata）は、日本を代表する秋の花として知られる多年草です。

ヒガンバナは、直立した茎から細長い葉を伸ばし、秋に特徴的な赤い花を咲かせます。花の形は鮮やかで、6本の強いくし形の花弁が放射状に広がり、黄色い雄しべがその中央に突き出ています。花は一つずつ咲くのではなく、茎の先に花序を形成し、複数の花が一度に開花します。花期は主に秋であり、9月から10月にかけて見られることが一般的です。

ヒガンバナは、日本だけでなく中国や朝鮮半島にも自生しており、古くから庭園や墓地などで観賞用に植えられてきました。また、ヒガンバナの花は神秘的な雰囲気を持っており、仏教や神道の儀式や祭りなどで用いられることもあります。そのため、日本の文化や風習にも深く関わっています。

ヒガンバナは、比較的丈夫な植物で、日当たりの良い場所を好みます。土壌の水はけが良く、乾燥にも耐性があります。また、寒さにも強く、冬期には地下部分に栄養を蓄え、春になると新たな葉や花を伸ばします。そのため、寒冷地でも育てることができます。

ヒガンバナは、鮮やかな花色と秋の風物詩としての魅力から、庭園や公園、お寺などでよく見かける花です。特に秋の彩りを引き立てる存在として重宝され、風情ある景観を演出します。また、切り花としても人気があり、花瓶や花束に活けて楽しむことができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>90,
                'name' => 'ヒマワリ',
                'scientific' => 'Helianthus annuus',
                'information' => 'ヒマワリ（学名: Helianthus annuus）は、太陽のような明るい黄色い花を持つ植物で、その特徴的な姿から広く知られています。

ヒマワリは、北アメリカ原産であり、現在は世界中で栽培されています。特に暖かい気候を好み、日照に恵まれた場所でよく育ちます。高さは種類によって異なりますが、一般的には数メートルにも達することがあります。茎は堅く直立し、葉は大きく広がっています。

ヒマワリの特徴的な部分はその花で、大きな黄色い頭花が特徴です。頭花は多数の小さな花から成り、中心には黒い円錐形の花芯（フロレット）があり、周囲には黄色い花弁（舌状花）が取り囲んでいます。花弁は放射状に並んでおり、太陽を追いかけるように動く性質を持ち、この特徴から「太陽の花」とも呼ばれています。

ヒマワリは、その明るい黄色や黄金色の花が美しいことから、庭園や公園、道路沿いなどでよく見かけることがあります。また、その大きな花の形状や明るい色合いは人々に喜びや希望を与えるシンボルともされており、様々な文化や芸術作品にも登場します。

ヒマワリはまた、その種子も重要な特徴です。成熟したヒマワリの頭花には多くの種子が詰まっており、これらの種子は食用や飼料として利用されます。特にヒマワリの種から搾り出された油は、調理や食品加工、化粧品、燃料などのさまざまな用途に使用されます。

さらに、ヒマワリは環境にも貢献します。その大きな葉と根は土壌を保護し、土壌浸食を防止する役割を果たします。また、ヒマワリの栽培は二酸化炭素の吸収や酸素の放出にも寄与し、環境改善に寄与することが知られています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>91,
                'name' => 'フクシア',
                'scientific' => 'Fuchsia',
                'information' => 'フクシア（学名: Fuchsia）は、美しい花を咲かせる植物であり、その独特の花形と鮮やかな色彩から庭園や鉢植えとして人気があります。

フクシアは、中南米原産の常緑または落葉性の植物で、約100種以上が知られています。一般的には直立した茎やつる状の茎を持ち、葉は対生で丸みを帯びた形状をしています。葉の色は濃緑色や赤みを帯びた色合いが一般的です。

特にフクシアの魅力はその花にあります。花は垂れ下がるように咲き、しばしば鈴のような形状をしています。花弁は細長く曲がりくねり、花の先端から鮮やかな色のしべが突き出しています。花の色は非常に多様で、ピンク、紫、赤、オレンジ、白など、鮮やかで魅力的な色合いを持っています。

フクシアは日陰や半日陰の環境を好み、湿度の高い場所でよく育ちます。鮮やかな花を楽しむためには日光の直射を避け、風通しの良い場所で栽培することが重要です。また、適度な水やりと肥料の管理が必要です。

フクシアは、庭園やベランダ、テラスなどの装飾として人気があります。鉢植えとしてもよく利用され、美しい花を咲かせることで空間に彩りを加えます。さらに、フクシアの花はハチや鳥にとっても魅力的であり、自然界の生態系にも貢献しています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>92,
                'name' => 'フクジュソウ',
                'scientific' => 'Adonis ramosa',
                'information' => 'フクジュソウ（学名: Adonis ramosa）は、寒冷地を中心に分布する一年草の植物であり、美しい黄色の花を咲かせることで知られています。

フクジュソウは、アヤメ科フクジュソウ属に属する植物であり、主に東アジアやユーラシア大陸の寒冷地帯に自生しています。高さは約20〜30センチメートルになり、茎は直立しています。葉は羽状に切れ込んだ形状をしており、鮮やかな緑色をしています。

花期は春であり、一重または半充填状の黄色い花を咲かせます。花の形状は典型的なバターカップ型であり、花弁は広がって開き、中央には多数の黄色い雄蕊が並んでいます。花の鮮やかな黄色は早春の庭や草原に明るさをもたらし、周囲の植物との対比が美しい景観を作り出します。

フクジュソウは寒冷地に適応した植物であり、寒さに強い特徴があります。耐寒性が高く、春先の寒冷な環境でも活気を保ちながら花を咲かせます。日当たりの良い場所を好み、水はけの良い土壌で栽培されることが多いです。

庭園や公園の花壇、または鉢植えとしてフクジュソウを育てることができます。早春に黄色い花が咲き誇る様子は、寒い季節の中での希望となり、華やかさをもたらします。また、花の色と形状が魅力的なため、観賞価値が高い花として人気を集めています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>93,
                'name' => 'フジ',
                'scientific' => 'Wisteria floribunda',
                'information' => 'フジ（学名: Wisteria）は、美しい垂れ下がる花房を持つつる性の落葉樹であり、日本を代表する伝統的な花木の一つです。

フジは、マメ科フジ属に属する植物であり、主に東アジアや北米に自生しています。木質の茎を持ち、長いつるを伸ばして他の構造に絡みつくことが特徴です。葉は奇数羽状複葉で、多くの小葉が互生しています。夏には鮮やかな緑色の葉を広げ、秋には黄金色や紅葉することで知られています。

花期は春から初夏にかけてであり、特徴的な垂れ下がる花房を形成します。花房は長く、多数の小さな花が集まっています。花色は紫色、白色、ピンク色などさまざまで、香りも豊かです。花房の豪華な咲き姿は圧倒的な美しさを持ち、日本の伝統的な庭園や公園、神社仏閣などでよく見られます。

フジは、日本の文化において特に重要な花とされており、花の美しさと香りが評価されています。また、フジの花は縁起の良い花ともされており、縁結びや繁栄の象徴とされています。特にフジの花を見ることができる「藤まつり」は、観光名所となっており、多くの人々が訪れます。

フジは、日当たりの良い場所を好み、水はけの良い土壌を好みます。また、つるが伸びるためには十分な支えが必要です。庭園や公園の他、アーチやパーゴラなどの構造物に絡ませることで、美しい花房を演出することができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>94,
                'name' => 'フリージア',
                'scientific' => 'Freesia',
                'information' => 'フリージア（学名: Freesia）は、美しい花と強い香りで知られる球根植物です。南アフリカ原産であり、一年草または多年草として栽培されています。

フリージアは、直立した茎と細長い葉を持ちます。花期は春から夏にかけてであり、一つの茎に複数の花をつけます。花は一重または八重咲きで、鮮やかな色合いと繊細な形状が特徴です。一般的な色は白、黄色、ピンク、紫など多様で、花びらの先端がやや反り返っています。また、フリージアの特徴的な点として、花の基部にある管状のつぼみが、花が開くときに曲がります。

フリージアの最も魅力的な特徴は、その芳しい香りです。花の香りは非常に強く、フルーティーな甘い香りやシトラスの香りを楽しむことができます。そのため、フリージアは花束やアレンジメントに用いられることが多く、香りの漂う空間を作り出すことができます。

フリージアは、温暖な気候と日光を好みます。耐寒性が低く、霜や寒冷な気候には弱いため、寒冷地では室内で育てることが一般的です。球根を植える場所は日当たりがよく、水はけの良い土壌を選びます。球根は毎年掘り起こして管理し、冬期は休眠させることが推奨されています。

フリージアは、その美しい花と豊かな香りから、庭園や花壇、プランターなどで人気のある花です。また、切り花としても長く楽しむことができます。特に春の花壇や優雅なアレンジメントに取り入れることで、華やかさと香りで心を癒してくれます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>95,
                'name' => 'プリムラ',
                'scientific' => 'Primula',
                'information' => 'プリムラ（学名: Primula）は、春に美しい花を咲かせる植物の一群です。日本ではウスユキソウやプリムラとも呼ばれています。プリムラは主に多年草であり、世界中のさまざまな地域に自生しています。

プリムラの花は、一般的に直立した茎から葉の間に花をつけます。花は単生または集散花序になり、色と形が多様です。一般的な色は白、黄色、ピンク、紫などであり、花弁の形も円形や星形などさまざまです。中には斑入りの花や複数の色を持つ花もあり、鮮やかな模様が魅力となっています。

プリムラは、寒冷地や湿地などの湿潤な環境を好みます。日陰や半日陰の場所で育つことが多く、肥沃な土壌を好みます。また、耐寒性があり、寒冷地でも比較的よく育ちます。プリムラは一般的に早春に花を咲かせますが、一部の種類は秋にも花を楽しむことができます。

プリムラは庭の中で美しい景観を作り出すだけでなく、切り花としても人気があります。花持ちが良く、花の鮮やかな色彩と優雅な形状が、花束やアレンジメントに華やかさを添えます。また、プリムラの花は食用としても利用されることがあり、サラダやデザートの彩りとして活用されることもあります。

プリムラは、春の訪れを告げる花として広く愛されています。その優雅な花姿と多彩な色彩は、人々の目を楽しませ、心を和ませることができます。庭園や花壇でプリムラを育てることで、春の花の豊かな魅力を堪能することができます。さらに、プリムラは育てやすく、初心者でも手軽に栽培することができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>96,
                'name' => 'ブルーデージー',
                'scientific' => 'Felicia',
                'information' => 'ブルーデージー（学名: Felicia）は、美しい青い花を咲かせる多年草の一種です。別名としてミツバチブリザードやイタリアンデージーとも呼ばれています。原産地はヨーロッパであり、野生の花として広く分布しています。

ブルーデージーは、直立した茎に対生する葉を持ち、茎の先端には円錐形の花序を形成します。花は小さくて細長い形をしており、その特徴的な色は淡い青色から濃い紫色までさまざまです。花弁は筒状であり、中心部には黄色い花粉を持つ黄色の頭花が集まっています。

この花は夏から秋にかけて咲きます。花序にはたくさんの花が密集し、一斉に開花することで美しい景観を作り出します。ブルーデージーの花は、その鮮やかな青色と繊細な形状が特徴であり、庭や花壇での装飾や切り花としても人気があります。

ブルーデージーは日当たりの良い場所を好みますが、半日陰でも育つことができます。また、比較的乾燥に強い性質を持ち、水はけの良い土壌を好みます。耐寒性もあり、寒冷地でも十分に育つことができます。

この花は庭園や花壇での利用に加えて、野生化して自生することもあります。その美しい花姿と豊かな色彩は、庭や公園の風景を彩ります。また、ブルーデージーは蜜を豊富に分泌するため、ハチや他の昆虫にとっても重要な花の一つです。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>97,
                'name' => 'ペチュニア',
                'scientific' => 'Petunia',
                'information' => 'ペチュニア（学名: Petunia）は、華やかな花を咲かせる一年草または多年草の植物であり、庭園や花壇で人気のある観賞用植物です。原産地は南アメリカであり、現在では世界中で栽培されています。

ペチュニアの花は、直径数センチメートルから十数センチメートルにもなる大きさで、さまざまな色や模様を持っています。一重咲きの花や八重咲きの花など、さまざまな品種が存在します。主な花の色はピンク、パープル、赤、白、黄色などで、その鮮やかな色彩は庭や花壇を華やかに彩ります。

ペチュニアは日当たりの良い場所を好みますが、半日陰でも育つことができます。水はけの良い土壌を好みますが、乾燥にもやや耐性があります。耐寒性もありますが、寒冷地では一年草として扱われることが一般的です。

この花は育てやすく、初心者でも手軽に栽培できることから人気があります。種子から育てることもできますし、苗を購入して植え付けることもできます。花壇やコンテナ、ハンギングバスケットなどに植えると、豪華で華やかな花壇やディスプレイを作り出します。

ペチュニアは花期が長く、春から秋にかけて連続して花を咲かせます。花は一日中開花し、その甘い香りは庭やテラスを彩ります。また、花の形や色の組み合わせによって、さまざまなデザインの花壇やアレンジメントを楽しむことができます。

さらに、ペチュニアは蜜を分泌し、ハチや他の昆虫を引き寄せます。そのため、庭園においても生態系の一環として重要な役割を果たしています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>98,
                'name' => 'ベロニカ',
                'scientific' => 'Veronica',
                'information' => 'ベロニカ（学名: Veronica）は、美しい花を咲かせる多年草または一年草の植物であり、庭園や花壇で人気のある観賞用植物です。ヨーロッパを中心に広く分布しており、約500種以上が存在します。

ベロニカの花は、直立した茎の上に集まって咲く小さな花で、一重咲きのものから八重咲きのものまで様々な形状があります。花の色も多様で、青、紫、ピンク、白などの色合いがあります。また、花弁や花序の形状も種類によって異なり、個性的な美しさを持っています。

ベロニカは日当たりの良い場所を好みますが、一部の品種は半日陰でも育つことができます。土壌は水はけが良く、肥沃な土壌を好みますが、耐乾燥性があるため、乾燥にも比較的耐えることができます。

この花は育てやすく、丈夫で寒さにも比較的耐性があります。種子から育てることもできますし、苗を購入して植え付けることもできます。花壇や岩庭、鉢植えなど、さまざまな場所で楽しむことができます。

ベロニカの花期は春から夏にかけてであり、長い間花を楽しむことができます。花は一日中開花し、その美しい姿と鮮やかな色彩は庭や花壇を彩ります。また、花の形や色の組み合わせによって、さまざまなデザインの花壇やアレンジメントを楽しむことができます。

さらに、ベロニカは蜜を分泌し、蝶やハチなどの昆虫を引き寄せます。そのため、庭園においても生態系の一環として重要な役割を果たしています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>99,
                'name' => 'ポインセチア',
                'scientific' => 'Euphorbia pulcherrima',
                'information' => 'ポインセチア（学名: Euphorbia pulcherrima）は、クリスマスシーズンに特に人気のある観葉植物であり、鮮やかな赤い葉（実際には葉ではなく、色鮮やかな苞と呼ばれる部分）が特徴です。メキシコ原産の多肉植物であり、世界中で広く栽培されています。

ポインセチアは、暖かい気候を好みますが、寒さにも比較的耐性があります。成長には十分な日光が必要で、日当たりの良い場所で育てることが推奨されます。また、風通しの良い場所を選び、高温多湿や乾燥した環境を避けることも重要です。

ポインセチアの葉は、特別な処理によって鮮やかな赤色に染まります。この処理は「日短処理」と呼ばれ、秋になると日光の時間を制限することで葉の色が変化します。このため、クリスマスシーズンにポインセチアが美しい赤い葉を持つことができるのです。

ポインセチアは室内での観賞に適しており、鉢植えとして楽しむことが一般的です。適切な水やりと湿度管理が必要であり、土壌が乾燥しないように注意する必要があります。また、ポインセチアは有毒な成分を含んでいるため、ペットや小さな子供のいる家庭では注意が必要です。

ポインセチアはクリスマスの季節になると、ディスプレイや飾りとして広く使用されます。その鮮やかな赤い葉は、クリスマスの雰囲気を一層盛り上げる役割を果たします。また、赤以外にも、ピンク、白、クリーム色など、他の色の品種も存在します。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>100,
                'name' => 'ホウセンカ',
                'scientific' => 'Impatiens balsamina',
                'information' => 'ホウセンカ（学名: Impatiens balsamina）は、バラ科ホウセンカ属に属する一年草の植物です。和名の「ホウセンカ」は、果実が熟すと触れると瞬時に割れて中から種子が飛び出す様子が、豆を火にかざして爆発させる様子に似ていることに由来しています。ホウセンカは、その鮮やかな花と多様な品種が特徴的で、庭園や花壇の飾りとして人気があります。

ホウセンカは直立した茎を持ち、高さは30〜90センチメートルになります。葉は対生し、細長い楕円形をしています。花は茎の先端や葉の葉腋に一つずつ咲きます。花の色はさまざまで、ピンク、赤、紫、白などがあります。また、一つの花が複数の花弁を持ち、形は一重咲きから八重咲きまでさまざまです。花期は春から秋にかけてで、長い間花を楽しむことができます。

ホウセンカは日陰や半日陰の環境を好みますが、一部の品種は日向でも育つことができます。水はけの良い土壌を好み、乾燥を嫌います。日常的な水やりと適切な肥料管理が必要です。また、寒さに弱いため、寒冷地では霜に注意する必要があります。

ホウセンカは、庭園や花壇での飾りとして人気があります。個別に植えるだけでなく、グループで植えることで効果的な花壇を作ることができます。また、鉢植えでも育てることができ、ベランダやテラスなどのスペースでも楽しむことができます。

ホウセンカは、その鮮やかな花と爆発するように割れる果実が特徴的で、庭や花壇に活気と彩りをもたらします。さまざまな品種があり、花の形や色合いも異なるため、個性的なデザインやコーディネートに利用することができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>101,
                'name' => 'ボケ',
                'scientific' => 'Chaenomeles speciosa',
                'information' => 'ボケ（学名: Chaenomeles speciosa）は、豪華で美しい花を咲かせる植物として知られています。ボケは多年生の草本であり、主に春から夏にかけて花を咲かせます。その美しい花姿と豊富な品種のバリエーションから、庭園や花壇で人気のある花となっています。

ボケの花は大きく、直径10センチメートル以上にもなることがあります。花弁は密に重なり合っており、半球状や菊のような形状をしています。色合いは非常に多様で、白、ピンク、赤、紫、黄色など、さまざまな色の品種が存在します。また、花弁には独特の模様や斑点があり、さらに美しい印象を与えます。

ボケは一般的に日当たりの良い場所を好みますが、直射日光にはやや弱いため、午後の日差しを避ける場所が適しています。また、肥沃な土壌を好み、十分な水分を与えることが育成のポイントです。冬季には休眠期を迎えるため、寒冷地では地上部が枯れることがありますが、春に再び芽吹き、花を咲かせます。

ボケは花の美しさだけでなく、芳香も特徴の一つです。特に一部の品種は強い芳香を放ち、庭や花壇に香りを漂わせます。また、ボケの花は切り花としても人気があり、花瓶やアレンジメントに使用されます。その優雅な姿と香りは、特別な場面やお祝い事に華やかさを添えることができます。

文化的にもボケは重要な位置を占めています。中国や日本などのアジアの国々では、ボケは美と富の象徴とされてきました。また、ボケの花は中国の伝統的な絵画や文学にも頻繁に登場し、芸術的な表現の対象とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>102,
                'name' => 'ボタン',
                'scientific' => 'Paeonia suffruticosa',
                'information' => 'ボタン（学名: Paeonia suffruticosa）は、可憐で色鮮やかな花を咲かせる草本植物です。その美しい花姿と豊富な品種のバリエーションから、庭園や花壇で人気のある花として広く栽培されています。

ボタンの花は小さくて丸い形状をしており、花弁は縁取りがあり、さまざまな色と模様を持っています。一般的な品種では、ピンク、赤、白、紫などの色合いが見られますが、品種改良によりさまざまな色や組み合わせが存在します。また、花弁には繊細な模様や斑点があることもあり、さらに美しさを引き立てています。

ボタンは一般的に日当たりの良い場所を好みますが、耐寒性があり、比較的寒冷な地域でも栽培することができます。耐乾燥性もあるため、乾燥した環境でも比較的よく育ちます。土壌は排水性の良い砂質土が適しており、十分な水分と栄養を与えることが育成のポイントです。

ボタンは花期が長く、春から夏にかけて連続して花を咲かせます。花の寿命も比較的長く、摘み取ることによって花期を延ばすことができます。また、花の香りも特徴的であり、甘い香りやスパイシーな香りが楽しめます。

ボタンは庭や花壇だけでなく、鉢植えや切り花としても人気があります。鮮やかな花色や香りは、花壇やボタニカルディスプレイに魅力を加え、室内や屋外の空間を彩ります。また、ボタンは花の形状がハート型に似ていることから、愛やロマンスの象徴としても人気があります。

ボタンは古くから庭園や花卉文化で重要な位置を占めており、多くの文化や伝承にも登場します。特に日本では、「にっぽんの花」として親しまれており、詩歌や絵画で描かれることも多いです。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>103,
                'name' => 'マーガレット',
                'scientific' => 'Argyranthemum',
                'information' => 'マーガレット（学名: Argyranthemum）は、美しい花を咲かせるキク科の植物です。その独特の形状や鮮やかな色合いから、庭園や花壇で人気のある花として広く栽培されています。

マーガレットの花は、一般的に菊のような形状をしており、中心には黄色や黄緑色の小さな花が密集しています。周囲には花弁があり、白やピンク、赤、紫などの多彩な色を持っています。花弁の形も品種によって異なり、丸く整った形状から、裂けた形や管状の形状までさまざまです。

マーガレットは一年草や多年草の品種があります。耐寒性があるため、寒冷な地域でも比較的よく育ちます。また、日当たりの良い場所を好み、十分な光を受けることで花がより美しく咲きます。土壌は肥沃で水はけの良い環境が適しており、適切な水やりと栄養の補給が必要です。

マーガレットは花期が長く、春から秋まで連続して花を咲かせます。花の寿命も比較的長く、摘み取ることによって花期を延ばすことができます。また、花の香りはさまざまで、爽やかな香りやスパイシーな香りが楽しめます。

マーガレットは庭園や花壇だけでなく、鉢植えや切り花としても人気があります。鮮やかな花色と豊かな花弁の数々は、花壇やバスケット、花束などのディスプレイに活用され、美しいアクセントを与えます。

また、マーガレットは多くの文化や伝統にも登場します。花言葉は「真実の愛」や「幸福」などであり、結婚式や祝福の場で使用されることもあります。また、一部の地域では祭りやイベントのシンボルとしても重要な存在です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>104,
                'name' => 'マリーゴールド',
                'scientific' => 'Tagetes',
                'information' => 'マリーゴールド（学名: Tagetes）は、キク科の一年草または多年草で、美しい花と独特の香りが特徴的な植物です。主に暖かい気候で育つことが多く、庭園や花壇で人気のある花として広く栽培されています。

マリーゴールドの花は、直径約5センチメートル程度の小さな頭花をつけます。花色は黄色やオレンジが一般的ですが、赤やマホガニー色の品種も存在します。花弁は重なり合っており、葉状のものや細長いものなど、品種によって形状が異なります。

この花の魅力の一つは、その鮮やかな色合いです。マリーゴールドの明るい色は、庭や花壇に活気を与え、目を楽しませます。また、花の形状も多様であり、花弁の配置や形が個性的な品種もあります。

マリーゴールドは比較的育てやすい植物であり、日当たりの良い場所を好みます。耐寒性があり、暖かい季節にはよく成長します。適度な水やりと肥沃な土壌が必要であり、乾燥を嫌います。特に鉢植えの場合は、水はけの良い土壌を用意することが重要です。

この花は害虫を寄せ付けない効果もあり、ガーデンパートナーとしての役割も果たします。その特有の香りは、アブやハエなどの害虫を寄せ付けず、近くの植物を保護します。そのため、野菜の畑やハーブガーデンなどにもマリーゴールドを植えることがあります。

また、マリーゴールドには医療や美容にも利用されることがあります。その抗菌作用や抗炎症作用により、皮膚のトラブルや虫刺されの痛みを和らげる効果があるとされています。また、抗酸化作用や抗ウイルス作用もあり、健康や免疫のサポートに役立つことも知られています。

さらに、マリーゴールドは花言葉でも知られています。「幸福をもたらす」という意味があり、明るさや希望、幸福感を象徴する花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>105,
                'name' => 'ムスカリ',
                'scientific' => 'Muscari',
                'information' => 'ムスカリ（学名: Muscari）は、ヒユ科に属する多年草の花で、小さな球状の花穂が特徴的です。花穂は葉の基部から立ち上がり、数十から数百の花が密集して咲きます。花の形状や色合いは品種によって異なりますが、一般的には青や紫が主な色味です。

ムスカリの花は、その愛らしい姿と甘い香りで人々を魅了します。花穂の中心には大きな中心花があり、周囲を取り囲む小さな花が集まっています。この配置はぶどう房に似ており、ムスカリの名前の由来ともなっています。

この花は早春に咲くことが多く、春の訪れを告げる花として広く知られています。花弁の形状は鐘型や筒状であり、花穂全体がコンパクトな印象を与えます。そのため、花壇や庭のアクセントとして人気があり、春の景観を彩ります。

ムスカリは比較的育てやすい植物であり、日当たりの良い場所を好みます。耐寒性があり、寒冷地でもよく成長します。適度な水やりと排水の良い土壌が必要であり、乾燥を嫌います。球根を植え付けることが一般的で、秋に植えつけることで春に美しい花を楽しむことができます。

また、ムスカリは花壇だけでなく、鉢植えや切り花としても人気があります。その独特の形状や色合いが、花のアレンジメントやインテリアにおいて魅力的なポイントとなります。

花言葉としては、ムスカリは「愛の告白」や「永遠の美」とされています。その美しい花姿と甘い香りは、愛や美しさの象徴として贈り物やイベントにも適しています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>106,
                'name' => 'モクレン',
                'scientific' => 'Magnolia liliiflora',
                'information' => 'モクレン（学名: Magnolia）は、モクレン科に属する落葉樹の花木で、美しい花と香りのある特徴を持ちます。モクレンは古代から存在する植物であり、その歴史は非常に古いものです。

モクレンの花は大きくて豪華であり、一重の花や八重の花など様々な形態があります。花びらは厚く、しっかりとした質感を持ち、直径10センチメートル以上にもなる大きさがあります。花の色も多様で、白色、ピンク色、紫色、黄色などがあります。花期は春から初夏にかけてで、枝先に咲く花が一斉に開花し、見事な花のカーテンを作り出します。

また、モクレンの芳香は非常に特徴的であり、甘くて芳醇な香りを放ちます。特に夜間や朝早い時間に花の香りが最も強くなります。この香りは多くの人々に癒しと安らぎをもたらし、庭園や公園などで人気のある要素となっています。

モクレンは木の成長に時間がかかるため、大きな樹木に成長するまでには数十年から数百年の歳月が必要です。しかし、その姿は見応えがあり、樹木全体が美しい形状を持つことが多いです。また、モクレンの葉も美しく、緑色で光沢があります。秋には黄色や赤色に色づくこともあり、四季折々の風景を楽しむことができます。

モクレンは多くの種類が存在し、世界中で栽培されています。日本にもヤマモクレンやシナモンモクレンなどさまざまな種類が自生しています。モクレンは庭園や公園、街路樹としてもよく利用され、その美しい花や香りによって人々を魅了しています。

花言葉としては、「尊厳」「崇高」「高貴」などがあります。モクレンの優雅で豪華な花姿や芳香は、高貴なイメージを持ち、その存在感は人々に感銘を与えます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>107,
                'name' => 'ヤグルマギク',
                'scientific' => 'Centaurea cyanus',
                'information' => 'ヤグルマギク（学名: Centaurea cyanus）は、キク科に属する一年草の花です。明るい黄色やオレンジ色の花が特徴で、その美しい色彩と愛らしい姿が庭や花壇を彩ります。

ヤグルマギクの花は、直径約5センチメートル程度の大きさで、複数の花弁からなる複頭花です。花弁は重なり合い、円形の形状をしており、中心に黒色や濃い色の目立つ輪郭があります。花期は春から秋にかけてであり、長い間咲き続けることができます。

この花は丈夫で育てやすいことで知られており、庭や花壇、鉢植えなどさまざまな場所で栽培されています。耐寒性があり、寒冷地でもよく育ちます。また、日当たりの良い場所を好みますが、半日陰でも育つことができます。土壌に対してはあまり選びませんが、排水の良い土壌が好まれます。

ヤグルマギクは、花の美しさだけでなく、その花びらには薬効があるとされています。伝統的な薬草としても知られており、皮膚の炎症や傷の治療に使われることがあります。また、抗酸化作用や抗菌作用もあり、スキンケア製品やハーブティーにも利用されています。

花言葉としては、「希望」とされています。その明るい色合いと愛らしい姿から、未来への希望や幸せを象徴しています。また、ヤグルマギクは食用としても利用されており、サラダや料理の飾りとして使われることもあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>108,
                'name' => 'ヤマブキ',
                'scientific' => 'Kerria japonica',
                'information' => 'ヤマブキ（学名: Kerria japonica）は、バラ科に属する落葉低木で、日本を含むアジア地域で広く自生しています。ヤマブキは美しい黄色の花と特徴的な茎を持つことで知られています。

ヤマブキの花は明るい黄色で、小さな花びらがたくさん集まった球形の形状をしています。花びらは5枚から8枚あり、中心部には黄色の雄蕊が見られます。花期は春から初夏にかけてで、新緑の葉とのコントラストが美しい景色を作り出します。

また、ヤマブキの茎は特徴的で、太くて弓なりに曲がった形状をしています。茎は緑色で滑らかな表面を持ち、しなやかさと強さを併せ持っています。この特徴的な茎は、ヤマブキの枝垂れた姿勢を支えています。

ヤマブキは丈夫で育てやすい植物として知られており、庭園や公園の装飾に広く使われています。また、盆栽の対象としても人気があります。日当たりの良い場所や半日陰の場所で育てることが適しており、適度な水やりと剪定を行うことで美しい花を楽しむことができます。

ヤマブキの花言葉は「友情」「明るさ」「幸せ」などです。その鮮やかな黄色の花は明るさや幸福感を象徴し、友情の絆を表現することもあります。そのため、ヤマブキは特別な日やお祝いの場で贈られることもあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>109,
                'name' => 'ユリ',
                'scientific' => 'Lilium',
                'information' => 'ユリ（学名: Lilium）は、ユリ科に属する美しい花を咲かせる植物で、世界中で親しまれています。その優雅で壮大な姿と豊かな香りで知られており、花束や庭園の装飾に広く利用されています。

ユリの花は大きく、6枚の花弁と6本の雄しべ、または3つの花弁と3本の雄しべからなる星形の形状をしています。花弁の色は多様で、白やピンク、オレンジ、黄色などさまざまな色があります。また、一部の品種では斑点模様やストライプがあり、花の美しさを一層引き立てます。

ユリは花期によってさまざまな品種があり、春から夏にかけて咲くものから夏から秋にかけて咲くものまであります。花期中、ユリは花の中心から豊かな香りを放ち、その香りは庭や室内を満たします。特に夜間に香りが強まる品種もあり、夜の庭や部屋に華やかさと香りをもたらします。

ユリは日当たりの良い場所を好みますが、直射日光を避けることが重要です。土壌は湿度が高く水はけの良いものが適しており、水やりと適切な栄養を与えることで健康的に育ちます。また、ユリは多年草であり、毎年株が成長し花を咲かせます。

ユリの花言葉は多様であり、愛、純粋さ、高貴さ、祝福、美しさなどを表現します。その美しい姿と豪華な花弁は、特別なイベントや祝い事、記念日などの装飾に最適です。また、ユリは結婚式やお悔やみの場でもよく使われる花です。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>110,
                'name' => 'ライスフラワー',
                'scientific' => 'Ozothamnus diosmifolius',
                'information' => 'ライスフラワー（学名:Ozothamnus diosmifolius）は、北アメリカ大陸原産の草花で、美しい花穂を持つ植物です。特にアメリカ西部やカナダの乾燥地域で見られることが多く、その美しい姿と繊細な花は多くの人々を魅了しています。

ライスフラワーは、特徴的な花穂を咲かせます。花穂は細長くて緻密で、銀白色から淡いピンクや紫色を帯びたものまで、さまざまな色彩があります。花穂全体が一つの絨毯のように広がり、風に揺れる様子は優雅で美しい景観を作り出します。

花期は主に夏から秋にかけてで、乾燥した環境にも耐えることができます。ライスフラワーは耐寒性があり、日照りや乾燥にも強いため、乾燥した地域や庭園で育てることが適しています。また、鮮やかな花穂を楽しむだけでなく、切り花としても人気があり、花束や装飾に利用されます。

この花の名前である「ライスフラワー」は、その花穂が細かな粒を散りばめた米粒のように見えることに由来しています。その繊細な姿や花穂の美しさは、花束やアレンジメントにおいて他の花との組み合わせにも適しています。また、乾燥花としても人気があり、長期間その美しさを楽しむことができます。

ライスフラワーは花言葉としてもさまざまな意味を持っています。主に「清らかさ」「神聖さ」「喜び」「美しさ」などを表現し、特別な日やお祝いの場で使用されることがあります。また、ライスフラワーは野生の美しさや自然の力強さを象徴する花でもあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>111,
                'name' => 'ラナンキュラス',
                'scientific' => 'Ranunculus asiaticus',
                'information' => 'ラナンキュラス（学名: Ranunculus）は、多くの色と形状の美しい花を咲かせる草花です。原産地は地中海沿岸や中央アジアで、世界中で人気のある園芸植物として栽培されています。

ラナンキュラスの特徴的な点は、多くの花弁を持つ華やかな花です。花弁は重なり合い、ふんわりとした質感と深い色合いを持っています。一重の品種から八重咲きの品種までさまざまな形状があり、花の中心には鮮やかな色の雄しべが並びます。花の直径は数センチから十数センチに及び、その美しさは圧倒的です。

ラナンキュラスの花の色も多岐にわたり、赤、ピンク、オレンジ、黄色、白などさまざまな色があります。また、花の中にはグラデーションや斑点模様の入った品種も存在し、個性的な魅力を放っています。

花期は春から初夏で、日当たりの良い場所で育てると最も美しい花を咲かせます。ラナンキュラスは一年草や多年草の品種があり、耐寒性にも差があります。一年草の場合は種まきから花を楽しむことができ、多年草の場合は株分けや球根の植え付けによって繁殖させることができます。

庭園や花壇での栽培はもちろん、切り花やアレンジメントにも人気があります。その美しい花姿と華やかさは、ブライダルやお祝いの花束、テーブル装飾などに最適です。また、花言葉としては「魅力的な」「幸福な愛」「気まぐれな愛情」といった意味を持ち、愛や感謝の気持ちを表現するのに適した花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>112,
                'name' => 'ラベンダー',
                'scientific' => 'Lavandula',
                'information' => 'ラベンダー（学名: Lavandula）は、美しい香りと繊細な花を持つハーブ植物です。原産地は地中海沿岸地域であり、その鮮やかな紫色の花が特徴的です。

ラベンダーの花は集合花序であり、細長い穂状の形状をしています。花序の上部から下部へと順に花が開花し、上品な香りを放ちます。一般的には紫色の花が一番ポピュラーですが、ピンク、白、青などの色のバリエーションも存在します。

ラベンダーは強い香りを持ち、特にその芳香は知られています。清潔感やリラックス効果をもたらす香りであり、アロマセラピーなどにも広く利用されています。また、ラベンダーオイルは多くの美容製品や香水にも使用され、リラックス効果や心地よい香りを楽しむことができます。

この花は乾燥にも強く、直射日光や乾燥した土壌を好みます。暖かい気候を好みますが、一部の品種は寒冷地でも栽培されています。ラベンダーは直立して成長し、葉は細長い形状をしています。また、多くの品種があり、大きさや花の形状、花の色などにバリエーションがあります。

庭園や花壇での栽培はもちろん、切り花やドライフラワーとしても人気があります。また、ラベンダーの香りを楽しむために、乾燥させた花をポプリやサシェに詰めたり、アロマキャンドルやお風呂に入れることも一般的です。

ラベンダーの花言葉は「平和」「清浄」「幸福」といった意味を持ち、穏やかな気持ちや癒しを与える花とされています。その美しい紫色の花と心地よい香りは、庭や室内の装飾に魅力を加え、心を落ち着かせてくれるでしょう。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>113,
                'name' => 'ランタナ',
                'scientific' => 'Lantana',
                'information' => 'ランタナ（学名: Lantana）は、美しい花と鮮やかな色彩が特徴の多年草です。熱帯から亜熱帯地域を原産とし、世界中で広く栽培されています。

ランタナの花は小さく集合して咲く形状であり、球状または円錐状の花序を形成します。花は一般的に鮮やかな色合いを持ち、オレンジ、黄色、赤、紫、白などのバリエーションがあります。また、花の中には複数の色が混在している品種もあり、視覚的に鮮やかで魅力的です。

ランタナは日当たりと暖かい気候を好みますが、一部の品種は寒冷地でも耐寒性があります。また、乾燥にも比較的強く、乾燥した環境でもよく育ちます。そのため、庭園や公園の花壇、プランター、バルコニーなど、さまざまな場所で栽培されます。

ランタナは花の長い咲き続ける性質があり、春から秋までの長期間、美しい花を楽しむことができます。また、花の香りは甘く、蜜を求めて多くの蜂や蝶などの昆虫を引き寄せます。そのため、ランタナは庭に生命や活気をもたらし、生態系にとっても重要な存在です。

さらに、ランタナは繁殖力が強く、種子や挿し木などで簡単に増やすことができます。そのため、庭園の中で自然に広がることもあります。ただし、一部の地域では野生化しやすいため、管理が必要な場合もあります。

花言葉としてのランタナは「明るい未来」「幸福の到来」とされています。その鮮やかな花と活気に満ちた姿は、元気や明るさを象徴し、人々の心を癒し、希望をもたらします。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>114,
                'name' => 'リナリア',
                'scientific' => 'Linaria',
                'information' => '
リナリア（学名: Linaria）は、美しい花と特徴的な形状が魅力の多年草または一年草の植物です。約150種以上が存在し、地中海地域を中心に広く分布しています。

リナリアの花は細長い形状をしており、上向きに集まって咲く特徴があります。一部の品種では、花弁の形がトランペット状に広がり、鮮やかな色合いを持つことがあります。花の色は多様で、ピンク、紫、黄色、オレンジ、白などのバリエーションがあります。

リナリアは日当たりを好み、乾燥にも比較的耐性があります。そのため、庭園や花壇、プランターなどで栽培されることが一般的です。また、リナリアは花壇の前面や境界に植えると、美しい花の列を形成し、庭の魅力を高めることができます。

リナリアは花が長く咲き続ける性質があり、春から秋にかけて美しい花を楽しむことができます。また、花は蜜を豊富に分泌し、蝶やハチなどの昆虫を引き寄せます。そのため、リナリアは庭に生命や活気をもたらし、生態系にとっても重要な存在となります。

一部のリナリアの品種は香りも特徴的で、甘い香りを放ちます。その香りは庭やプランター周辺に漂い、さわやかな空気を演出します。

花言葉としてのリナリアは「思いやり」や「感謝」を表現します。その優雅で美しい姿は、人々の心を和ませ、感謝の気持ちを伝えます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>115,
                'name' => 'リンドウ',
                'scientific' => 'Gentiana scabra var. buergeri',
                'information' => '
リンドウ（学名: Gentiana）は、美しい青色の花が特徴的な多年草の植物です。約400種以上が知られており、世界各地に広く分布しています。

リンドウの花は、一般的に鮮やかな青色をしており、しばしば鈍い光沢を持っています。ただし、一部の品種では紫色やピンク色など、さまざまな色合いの花も見られます。花は一つまたは複数の花が茎の先に集まって咲き、直立した姿勢をしています。また、花の形状は筒状であり、しばしば咲いた花の周囲には縁があることが特徴です。

リンドウは高山や寒冷地を好み、主に山岳地帯や湿地などの自然環境で見られます。特にアルプスやヒマラヤなどの高山地帯で美しく咲くことが知られています。そのため、登山者や自然愛好家から人気のある花でもあります。

リンドウは花が咲く期間が短く、一般的には夏から初秋にかけて見ることができます。花が咲く時期は地域や種類によって異なるため、季節に合わせて観察することがおすすめです。

この花は美しさだけでなく、薬用や食用としても利用されることがあります。一部の種類の根や根茎は伝統的な漢方薬や民間薬として使用されてきました。また、一部の地域ではリンドウを利用してリキュールやハーブティーを作ることもあります。

リンドウの花言葉は「高潔」「純粋」「青春の誓い」など様々です。その美しい青色や儚さから、純粋さや高潔さを象徴する花とされています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>116,
                'name' => 'ルピナス',
                'scientific' => 'Lupinus',
                'information' => 'ルピナス（学名: Lupinus）は、美しい花を咲かせる豆科の植物であり、世界中で広く栽培されています。約200種以上が知られており、さまざまな色合いと形状の花を持つ品種が存在します。

ルピナスの花は、一般的に直立した花茎の先に集まって咲く形状で、豆科特有の蝶のような形をしています。花は集散花序と呼ばれる形態で、中心から外側に向かって花が開花し、美しい色合いを見せます。花の色は青、紫、ピンク、赤、黄など多彩で、鮮やかさと色のバリエーションが魅力です。

ルピナスは、草原や山地などの乾燥した環境に自生しています。耐寒性があり、一部の種類は寒冷地でも栽培されます。また、土壌に対しては適応力があり、肥沃な土壌から貧しい土壌まで広範囲で栽培が可能です。

この花は、庭園や花壇で美しい花壇や境界線を作り出すために利用されます。また、切り花としても人気があり、花束やアレンジメントに使用されることがあります。

ルピナスの花言葉は「幸福」「変幻自在」「思いやり」などであり、花の美しさと多様性からさまざまな意味が込められています。幸福や変幻自在の象徴として、贈り物やイベントのデコレーションにも適しています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),


            ], [
//                'id'=>117,
                'name' => 'ルリマツリ',
                'scientific' => 'Plumbago auriculata',
                'information' => 'ルリマツリ（学名: Plumbago auriculata）は、ルリマツリ科に属する常緑または半常緑の低木で、南アフリカ原産の植物です。和名の「ルリマツリ」は、その美しい青い花色に由来しています。ルリマツリは、鮮やかな花と緑の葉が特徴的で、庭園や公園の景観づくりに広く利用されています。

ルリマツリは、直立した茎を持ち、高さは1〜3メートルになります。葉は対生し、卵形から長楕円形で、深緑色をしています。葉の先端は尖り、縁は滑らかです。花は密集した集散花序として咲き、花冠は筒状で5弁に分かれ、鮮やかな青色や紫色をしています。花期は夏から秋にかけてで、長い間花を楽しむことができます。

ルリマツリは日照りに強く、日向の環境を好みます。また、乾燥にも比較的耐性があり、水はけの良い土壌を好みます。耐寒性があり、温暖な地域では常緑樹として育ちますが、寒冷地では半常緑性を示す場合もあります。

ルリマツリは、庭園や公園での景観づくりに広く利用されます。単体で植えられるだけでなく、生け垣や境界樹としても活用されます。また、鉢植えやプランターに植えることもでき、ベランダやテラスなどのスペースでも楽しむことができます。

ルリマツリは、その美しい花と緑の葉が庭園や公園に明るさと鮮やかさをもたらします。また、花が蝶やハチを引き寄せるため、生態系にも貢献します。さらに、ルリマツリの花は切り花としても利用され、花瓶やアレンジメントに活けることができます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>118,
                'name' => 'ローズマリー',
                'scientific' => 'Rosmarinus officinalis',
                'information' => 'ローズマリー（学名: Rosmarinus officinalis）は、シソ科の常緑低木であり、香り高い葉と小さな青紫色の花を持つハーブ植物です。地中海地域原産であり、世界中で広く栽培され、料理や医療目的で利用されています。

ローズマリーは、直立した茎と短い葉を持つ樹形の低木であり、高さは一般的に30〜150センチメートル程度に成長します。葉は針状で硬く、深緑色をしており、葉の裏側には白い毛があります。葉には強い香りがあり、摘んだり葉をこすることで特有の芳香が放たれます。

ローズマリーの花は、小さな青紫色の花を多数つける集散花序の形態をしています。花期は春から初夏にかけてであり、花が咲くと植物全体が美しい香りに包まれます。花は釣鐘形をしており、ミツバチや他の昆虫にとっても魅力的な花です。

このハーブは、料理や薬草として広く利用されています。ローズマリーの葉は香りが強く、料理においては風味付けや香りづけに使われます。特に肉料理や魚料理、スープ、パンなどによく合います。また、ローズマリーオイルやエキスも抽出され、香りや健康効果を活かした調理や製品に利用されています。

ローズマリーには多くの健康効果があります。その中には消化促進や抗酸化作用、抗菌作用、抗炎症作用などがあります。また、記憶力の向上や集中力の向上にも効果があるとされています。そのため、アロマテラピーなどの分野でも広く使用されています。

さらに、ローズマリーは庭園やプランターで栽培することもできます。日当たりの良い場所と乾燥した砂質の土壌を好みます。また、耐寒性があり、寒冷地でも比較的よく育ちます。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>119,
                'name' => 'ローダンセマム',
                'scientific' => 'Rhodanthemum',
                'information' => 'ローダンセマム（学名: Rhodanthe manglesii）は、オーストラリア原産のキク科の多年草です。美しい花弁と繊細な姿が特徴であり、乾燥した環境に適応しています。鮮やかな花色と耐久性から、切り花やドライフラワーとしても人気があります。

ローダンセマムは、直立した茎を持ち、高さは一般的に30〜60センチメートル程度に成長します。葉は細長くて線形であり、茎に互いに対生してついています。花は単生で、直径2〜3センチメートル程度の小さな頭花が茎の先に集まった形で咲きます。

花弁は紙のように薄く、透明感があります。一般的には白や淡いピンク色の花弁に、黄色や紫色の中心部があります。花期は春から初夏にかけてであり、優雅で魅力的な花を咲かせます。

ローダンセマムは、主にオーストラリアの乾燥地帯で見られます。乾燥に強く、乾燥した砂質の土壌や岩場などでよく育ちます。このため、耐乾燥性のある植物として知られています。

この花は、切り花としても人気があります。花色の鮮やかさや透明感が、花束やアレンジメントに華やかさと軽やかさをもたらします。また、乾燥させた後も美しい姿を保つため、ドライフラワーとしても利用されます。乾燥した花を使ったアレンジメントやウェディングブーケなど、幅広い用途で楽しむことができます。

ローダンセマムは、その繊細な花姿や乾燥に強い性質から、乾燥地帯の庭やガーデンにも人気のある植物です。日照りや乾燥への耐性があり、手入れが比較的簡単なため、庭のアクセントや砂地の美化に適しています。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ], [
//                'id'=>120,
                'name' => 'ワスレナグサ',
                'scientific' => 'Myosotis',
                'information' => 'ワスレナグサ（和名）またはMyosotis（学名）は、ムラサキ科ワスレナグサ属に属する多年草の花で、美しい青い花が特徴です。和名の「ワスレナグサ」は、「忘れな草」とも呼ばれ、その名の通り、忘れられない思い出を象徴する花として知られています。

ワスレナグサは、茎が直立し、高さは20〜50センチメートル程度になります。葉は互生し、長楕円形で縁は滑らかです。花は小さく、集散花序として咲きます。特徴的なのは、その美しい青色の花で、中心部が黄色い目立った模様を持っています。花期は春から初夏にかけてで、花の数は多く、広い範囲に咲き誇ります。

ワスレナグサは、湿った土壌を好みますが、水はけの良い環境でも育つことができます。日当たりの良い場所を好みますが、直射日光にさらされ過ぎると花や葉が傷むことがあります。耐寒性があり、寒冷地でも比較的よく育ちます。

ワスレナグサは、庭園や花壇での観賞用として人気があります。美しい青い花が目を引き、春の景色に彩りを添えます。また、切り花としても利用され、花瓶やアレンジメントに活けられることもあります。

ワスレナグサの花言葉は「忘れられない思い出」「永遠の愛」「純粋な愛情」などです。その美しい花と花言葉から、大切な人への思いやりや愛情を表現するために贈られることもあります。',
                'recommendSpringWaterInterval' => 1,
                'recommendSpringWaterTimes' => 1,
                'recommendSummerWaterInterval' => 1,
                'recommendSummerWaterTimes' => 1,
                'recommendAutumnWaterInterval' => 1,
                'recommendAutumnWaterTimes' => 1,
                'recommendWinterWaterInterval' => 1,
                'recommendWinterWaterTimes' => 1,
                'fertilizerName' => 1,
                'fertilizerMonths' => json_encode([1]),

            ],
        ]);
    }
}
