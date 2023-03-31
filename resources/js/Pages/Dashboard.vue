<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="container text-center p-3 mb-2">
            <!-- タイトル行 -->
            {{ $page.props.user }}

            <div class="row my-3">
                <div class="col-sm-6 mx-auto"><h1>植物判定アプリ</h1></div>
            </div>

            <div class="info">
                <p>
                    育て方を知りたい植物を<br>カメラに写して数秒待ってください<br>
                </p>
            </div>

            <!--今日を含め3日間の天気を表示 -->
            <!--        <div class="col-sm-6 mx-auto" id="wether">-->
            <!--            <dl v-for="obj01 in object">-->
            <!--                @{{ obj01.date }}：@{{ obj01.weather }}<br>-->
            <!--                @{{ obj01.min_temperature }}℃ ~ @{{ obj01.max_temperature }}℃<br><br>-->
            <!--                <img v-bind:src=obj01.image>-->
            <!--            </dl>-->
            <!--        </div>-->

            <!--   植物判定 -->
            <div class="col-sm-6 mx-auto" id="judge">
                <div class="input-group-append">
                    <button @click="startCamera" class="btn btn-outline-success" type="button" id="button-addon2">
                        {{ recogButton }}
                    </button>
                </div>
            </div>
            <br>
            <div>
                <video id="webcam" width="160" height="160" muted autoplay playsinline></video>
            </div>
            <div>
                <p id="error" v-show="error">{{ error }}</p>
                <label>
                    <p>クリックで画像を変更できます。</p>
                    <img :src="avatar" alt="Avatar" class="image" id="are">
                    <div>
                        <input
                            type="file"
                            id="avatar_name"
                            accept="image/jpeg, image/png"
                            @change="onImageChange"
                        />
                    </div>
                </label>
                <button @click="startImage()">アップロード</button>
                <div v-if="getPlant">
                    <p>{{ message }}</p>
                    名前：{{ plantName }} id：{{ plantId }}
                    <button @click="registerPlant($page.props.user.user_id)" class="btn btn-outline-success"
                            type="button" id="button-addon2">
                        {{ registerButton }}
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import are from "@/Components/Are.vue";

export default {
    props: {
        userId: null,
        value: {
            type: String,
            default: null
        }
    },
    data() {
        return {
            plantId: '',
            plantName: '',
            scientific: '',
            information: '',
            avatar: '',
            message: '',
            getPlant: false,
            error: '',
            recogButton: 'スタート！',
            registerButton: 'My植物に加える',
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
    // created: async function () {
    //     this.getWeather();
    // },
    // メインの関数（ここでは定義しているだけでボタンクリックされたら実行）
    // awaitを使うとき（非同期）はasync
    methods: {
        setError(error, text) {
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
            const classifier = ml5.imageClassifier(this.myPlant.imageModelURL + 'model.json', () => {
                // 読み込みが完了次第ここが実行されます
                console.log('モデルの読み込みが完了しました');
                this.myPlant.shift();
                // this.loop(classifier);
                console.log('loop処理1回目');
                console.log(this.myPlant)
                this.scan(classifier)

            });

        },
        async registerPlant(userId) {
            axios.post('http://localhost:51111/api/plantUnit', {
                userId: userId,
                plantId: this.plantId
            }).then(res => {
                this.plant = res.data;
                this.getPlant = true
            }).catch(error => {
                console.log(error);
            });
        },
        scan: function (classifier) {
            classifier.classify(are, async (err, results) => {

                axios.post('http://localhost:51111/api/scanPlant', {
                    plantLabel: results[0].label
                }).then(res => {
                    this.plantId = res.data.plant.plantId;
                    this.plantName = res.data.plant.name;
                    this.information = res.data.plant.information;
                    this.scientific = res.data.plant.scientific;
                    this.getPlant = true

                }).catch(error => {
                    console.log(error);
                });
                console.log(results[0].label)

                // setTimeout(this.loop(classifier), 1000);
            })
        },
        getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = () => resolve(reader.result)
                reader.onerror = error => reject(error)
            })
        },
        onImageChange(e) {
            const images = e.target.files || e.dataTransfer.files
            console.log('aaaaa')
            this.getBase64(images[0])
                .then(image => this.avatar = image)
                .catch(error => this.setError(error, '画像のアップロードに失敗しました。'))
        },
    },

    loop: function (classifier) {
        console.log('loop　function');
        // 推論を実行し、エラーがあればerrに、結果をresultsに格納して、
        // 推論が完了次第 { } の中身を実行します
        classifier.classify(async (err, results) => {

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

};
</script>
