const app = new Vue({
    el: '#app',
    name: 'plantImage',
    props: {
        value: {
            type: String,
            default: null
        }
    },
    data() {
        return {
            avatar: '',
            message: '',
            error: '',
            recogButton: 'スタート！',
            // 植物
            // 作成したモデルのURL
            myPlant: [{
                imageModelURL: '',
                name: '',
                temperature: '',
                water: '',
                light: '',
                comment: ''
            }],
            // 天気予報のためのオブジェクトを定義
            object: [{
                date: '',
                weather: '',
                min_temperature: '',
                max_temperature: '',
                image: ''
            }],
            num: 3
        }
    },
    created: async function () {
        this.getWeather();
    },
    // メインの関数（ここでは定義しているだけでボタンクリックされたら実行）
    // awaitを使うとき（非同期）はasync
    methods: {
        setError (error, text) {
            this.error = (error.response && error.response.data && error.response.data.error) || text
        },
        async startCamera() {
            this.recogButton = '撮影準備中…';
            const stream = await navigator.mediaDevices.getUserMedia({
                audio: false,
                video: {width: 160, height: 160, facingMode: 'environment'},
                // フロントカメラ優先 { facingMode: "user" }
                // リアカメラ優先 { facingMode: "environment" }
            });

            // 「id="webcam"」となっているパーツ（videoタグ）を取得
            const video = document.getElementById('webcam');

            // videoにカメラ映像ストリームをセット
            video.srcObject = stream;

            // Googleのサーバーにアップロードした自作モデルを読み込みにいきます
            this.myPlant.imageModelURL = 'https://teachablemachine.withgoogle.com/models/9P6f9Msvu/';
            console.log('imageModelURL:', this.myPlant.imageModelURL)
            const classifier = ml5.imageClassifier(this.myPlant.imageModelURL + 'model.json', video, () => {
                // 読み込みが完了次第ここが実行されます
                console.log('モデルの読み込みが完了しました');
                this.myPlant.shift();
                this.loop(classifier);
                console.log('loop処理1回目');
            });
        },

        async startImage() {
            if (this.avatar) {
                /* postで画像を送る処理をここに書く */
                this.message = 'アップロードしました'
                this.error = ''
            } else {
                this.error = '画像がありません'
            }
            console.log(this.avatar);
            const are = document.getElementById('are');

            // Googleのサーバーにアップロードした自作モデルを読み込みにいきます
            this.myPlant.imageModelURL = 'https://teachablemachine.withgoogle.com/models/9P6f9Msvu/';
            console.log('imageModelURL:', this.myPlant.imageModelURL)
            const classifier = ml5.imageClassifier(this.myPlant.imageModelURL + 'model.json',  () => {
                // 読み込みが完了次第ここが実行されます
                console.log('モデルの読み込みが完了しました');
                this.myPlant.shift();
                // this.loop(classifier);
                console.log('loop処理1回目');
                console.log(this.myPlant)

            });
            classifier.classify(are,async (err, results) => {
                axios.get('http://localhost:51177/api/scanPlant',this.myPlant)
                    .then(res =>  {}).catch( error => { console.log(error); });
                console.log(results[0].label)

                // setTimeout(this.loop(classifier), 1000);
            })


        },

        loop: function (classifier) {
            console.log('loop　function');
            // 推論を実行し、エラーがあればerrに、結果をresultsに格納して、
            // 推論が完了次第 { } の中身を実行します
            classifier.classify(async (err, results) => {

                // 育成情報を手入力
                // let index_temperature = ['耐寒性。越冬温度の目安は0℃以下。一般の住宅ならば特に保温の必要がない。戸外越冬可能。',
                //     '半耐寒性。越冬温度の目安は0℃以上。植物体が凍結しなければ越冬可能なので一般の住宅ならば特に保温の必要がない。暖地では無加温温室、軒下などで越冬する。',
                //     '低温性。越冬温度の目安は5℃程度。一般の住宅ならば特に保温・加温の必要がない。',
                //     '中温性。越冬温度の目安は10℃程度。寒さに弱く、気密・断熱性能の低い住宅では保温して越冬させる。',
                //     '高温性。越冬温度の目安は15℃以上。極めて寒さに弱く、一般に加温して越冬させる。水遣りを控えれば多少耐寒性が高まる。'];
                // let index_water = ['長期間の乾燥に耐える。水切れによる障害をほとんど受けない。過湿により障害を受けやすい。生育期には十分潅水する(土が乾いたら潅水)。サボテン・多肉植物など。',
                //     '乾燥に耐える。水切れによる障害を受けにくい。過湿により障害を受けやすい。生育期には十分潅水する(土が乾いたら潅水)。葉や茎、根が多肉質な植物、着生植物など。',
                //     '普通。一般的な観葉植物の潅水。土が乾いたら潅水する。',
                //     '多湿を好む。水切れによる障害を受けやすい。土が乾ききる前に潅水する。シダ植物など。',
                //     '非常に多湿を好む。水切れによる深刻な障害を受ける。用土が常に湿っている状態を保つ。水生植物や湿生植物など。'];
                // let index_light = ['強い日陰に耐える。',
                //     '半日陰を好む。夏の戸外では葉焼けを起こすので半日陰または遮光する(30～50％)。室内では壁側・人工照明による育成が可能。',
                //     'やや明るい光を好む夏の戸外では葉焼けを起こすので遮光する(10～30％)。室内では部屋の中心部、レースのカーテン越しの窓辺いに置く。',
                //     '明るい光を好む。夏の戸外では葉焼けを起こす可能性があるのでやや遮光する(～10％)。室内では出来るだけ明るい所に置く。',
                //     '強い光を好む。戸外では直射日光、室内では出来るだけ明るい所に置く。'];
                //
                // // ガジュマル,コーヒーノキ,サンスベリア...の順に情報が格納されている。
                // let num = 0;
                // // 温度
                // let t = [4, 3, 5, 3, 3, 3];
                // // 水
                // let w = [3, 3, 3, 3, 4, 3];
                // // 光
                // let l = [4, 4, 4, 5, 3, 3];
                // // コメント
                // let temp_comment = ['成木の幹を挿し木して芽吹かせたもの、根元が膨らんだ盆栽風に仕立てたものなどが流通する。',
                //     '言わずと知れた「コーヒー豆」の原料となる有用植物。実生苗から大鉢仕立てまで非常に多く流通する。結実には高温での越冬が必要。',
                //     '黄覆輪斑。一般に「サンセベリア」として出回るのは本品種。',
                //     '掌状複葉。日照を好むが耐陰性もある。実生小苗から大型の鉢物まで非常に多く流通する。',
                //     '園芸品種多数。',
                //     'サトイモ科。熱帯アメリカに約３０種。'];
                // console.log(results[0].label)
                // // 植物名によって処理を変える
                // if (results[0].label == "ガジュマル") {
                //     num = 0;
                // } else if (results[0].label == "コーヒーノキ") {
                //     num = 1;
                // } else if (results[0].label == "サンスベリア") {
                //     num = 2;
                // } else if (results[0].label == "パキラ") {
                //     num = 3;
                // } else if (results[0].label == "ポトス") {
                //     num = 4;
                // } else if (results[0].label == "モンステラ") {
                //     num = 5;
                // }
                // // this.myPlant.shift();
                // console.log(index_temperature[t[num]])
                // console.log(num)
                // this.myPlant.push({
                //     name: results[0].label,
                //     temperature: index_temperature[t[num] - 1],
                //     water: index_water[w[num] - 1],
                //     light: index_light[l[num] - 1],
                //     comment: temp_comment[num],
                // });
                // console.log(this.myPlant.name[0])
                this.recogButton = '撮影完了';
                // 推論終了1秒後に自分の関数を実行（ループになる）
                // setTimeout(this.loop(classifier), 1000);
            });
        },

        getWeather: async function () {
            console.log('getWeatherが呼び出されました');
            let response;
            try {
                // 天気のデータを取得
                response = await axios.get('https://weather.tsukumijima.net/api/forecast/city/130010');
                w_data = response.data.forecasts;
                this.object.shift();
                // 日にち、天気、気温、画像を取得する
                this.object.push({
                    date: w_data[1].date,
                    weather: w_data[1].telop,
                    min_temperature: w_data[1].temperature.min.celsius,
                    max_temperature: w_data[1].temperature.max.celsius,
                    image: w_data[1].image.url
                });
            } catch (error) {
                console.error(error);
            }
        },
        getBase64 (file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = () => resolve(reader.result)
                reader.onerror = error => reject(error)
            })
        },
        onImageChange (e) {
            const images = e.target.files || e.dataTransfer.files
            this.getBase64(images[0])
                .then(image => this.avatar = image)
                .catch(error => this.setError(error, '画像のアップロードに失敗しました。'))
        },


    },

});
