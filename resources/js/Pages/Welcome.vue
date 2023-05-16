<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Banner from "@/Components/Banner.vue";
import Load from "@/Components/Load.vue";
import RegisterModal from "@/Components/RegisterModal.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});


</script>

<template>
    <Head title="Welcome"/>
    <div class="bg-green-100  pb-16">
        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <Load :show="isScan" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></Load>


        <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

        </div>
        <div class="container text-center p-3 mb-2">
            <!-- タイトル行 -->
            <div class="row my-3">
                <div class="col-sm-6 mx-auto blue"><h1>植物判定アプリ</h1></div>
            </div>
            <div class="info">
                <p>
                    育て方を知りたい植物を<br>カメラに写して数秒待ってください<br>
                </p>
                <!--            <button class="inline-block cursor-pointer rounded-md bg-gray-800 px-4 py-3  bg-gradient-to-r from-green-500 via-blue-500 to-pink-500　text-center text-sm font-semibold uppercase text-white transition duration-200 ease-in-out hover:bg-gray-900">Button</button>-->
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
                    <button @click="startCamera"
                            class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded  px-8 button-width"
                            type="button" id="button-addon2"
                            :disabled="isRecognizing">
                        {{ recogButton }}
                    </button>
                </div>
            </div>
            <br>
            <div class="flex justify-center items-center">
                <video id="webcam" width="200" height="300" muted autoplay playsinline></video>
            </div>


            <div>
                <p id="error" v-show="error">{{ error }}</p>
                <image-maker class="button-width" @image-selected="onImageSelected"></image-maker>
                <div v-if="selectedImage" class="flex items-center justify-center">
                    <img :src="selectedImage" alt="Selected image" id="plant_image"
                         style="width: 300px; height: 300px ;">
                </div>

                <button v-if="selectedImage"
                        class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-12 my-4 button-width"
                        @click="startImage()"
                        :disabled="isRecognizing">診断する！

                </button>

                <div v-if="canLogin" class="flex justify-center items-center ">
                    <Link v-if="$page.props.user" :href="route('dashboard')"
                          class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4 button-width">
                        マイページに戻る
                    </Link>
                    <template v-else>
                        <div class="flex flex-col">
                            <button
                                class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4 button-width">
                                <Link :href="route('login')" class="text-sm text-white-700 dark:text-gray-500">Log in
                                </Link>
                            </button>
                            <button
                                class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4 button-width">
                                <Link v-if="canRegister" :href="route('register')"
                                      class="
                                  ml-4 text-sm text-white-700 dark:text-white-500">Register
                                </Link>
                            </button>
                        </div>
                    </template>
                </div>
                <div v-if="getPlant">
                    <p>{{ message }}</p>
                    名前：{{ plantName }} 学名：{{ scientific }}
                    <p>解説：{{ information }}
                    </p>
                    {{ plantName }}の画像
                    <div class="carousel rounded-box">
                        <div class="carousel-item">
                            <img :src="'data:image/png;base64,'+image1"
                                 class="lg:w-full lg:h-full object-cover"
                                 style="width: 400px; height: 400px ;"/>
                        </div>
                        <div class="carousel-item">
                            <img :src="'data:image/png;base64,'+image2"
                                 class="lg:w-full lg:h-full object-cover"
                                 style="width: 400px; height: 400px ;"/>
                        </div>
                        <div class="carousel-item">
                            <img :src="'data:image/png;base64,'+image3"
                                 class="lg:w-full lg:h-full object-cover"
                                 style="width: 400px; height: 400px ;"/>
                        </div>
                        <div class="carousel-item">
                            <img :src="'data:image/png;base64,'+image4"
                                 class="lg:w-full lg:h-full object-cover"
                                 style="width: 400px; height: 400px ;"/>
                        </div>
                        <div class="carousel-item">
                            <img :src="'data:image/png;base64,'+image5"
                                 class="lg:w-full lg:h-full object-cover"
                                 style="width: 400px; height: 400px ;"/>
                        </div>
                    </div>
                </div>
                <div v-if="getPlant">
                    <div class="text-white py-4">
                        <div class="container mx-auto flex justify-center items-center">

                            <button
                                @click="registerPlant($page.props.user.user_id)"
                                class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width"
                                type="button" id="button-addon2"
                                :disabled="isRecognizing">
                                {{ registerButton }}
                            </button>

                            <RegisterModal :open-modal="isModalOpen"/>

                        </div>
                    </div>
                </div>
            </div>

            <!--        <p v-html="text" v-show="load" id="load"></p>-->


        </div>
        <div v-show="$page.props.user.user_id">
            <NaviFooter/>
        </div>
    </div>
</template>
<style>
@media screen {
    #avatar_name {
        display: none;
    }
}

</style>
<script>

import ImageMaker from "@/Components/ImageMaker.vue";
import NaviFooter from "@/Components/NaviFooter.vue";
import LoadWait from "@/Components/LoadWait.vue";

export default {
    components: {
        Load,
        LoadWait,
        RegisterModal,
        ImageMaker,
        NaviFooter,
    },
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
            image1:'',
            image2:'',
            image3:'',
            image4:'',
            image5:'',
            avatar: null,
            message: '',
            getPlant: false,
            error: '',
            isRecognizing:false,
            recogButton: 'カメラで診断する！',
            registerButton: 'My植物に加える',
            isScan: false,
            isLoading: false,

            isModalOpen: false,
            selectedImage: null,

            myPlant: [{
                imageModelURL: '',
                name: '',
                temperature: '',
                water: '',
                light: '',
                comment: ''
            }],
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
            if (this.isRecognizing) {
                return; // 認識中は何もしない
            }
            this.isRecognizing = true;
            this.recogButton = '撮影準備中…';
            const stream = await navigator.mediaDevices.getUserMedia({
                audio: false,
                video: {width: 200, height: 300, facingMode: 'environment'},
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
                this.scanCamera(classifier);
                console.log('loop処理1回目');
            });
        },
        async startImage() {
            if (this.isRecognizing) {
                return; // 認識中は何もしない
            }
            this.isRecognizing = true;
            this.isScan = true;
            console.log(this.avatar);
            if (this.avatar) {
                /* postで画像を送る処理をここに書く */
                this.message = 'アップロードしました'
                this.error = ''
            } else {
                this.error = '画像がありません'
            }
            console.log(this.avatar);
            const plant_image = await document.getElementById('plant_image');

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
                this.scanImage(classifier)

            });

        },
        scanImage: function (classifier) {
            classifier.classify(plant_image, async (err, results) => {
                axios.post('http://localhost:51111/api/scanPlant', {
                    plantLabel: results[0].label
                }).then(res => {
                    console.log(res.data)
                    this.plantId = res.data.plant.plantId;
                    this.plantName = res.data.plant.name;
                    this.information = res.data.plant.information;
                    this.scientific = res.data.plant.scientific;
                    this.image1 = res.data.plant.plantImage1;
                    this.image2 = res.data.plant.plantImage2;
                    this.image3 = res.data.plant.plantImage3;
                    this.image4 = res.data.plant.plantImage4;
                    this.image5 = res.data.plant.plantImage5;
                    this.getPlant = true;
                    this.isScan = false

                }).catch(error => {
                    this.isScan = false
                    console.log(error);
                }).finally(() => {
                        this.isRecognizing = false;
                    }
                )
            })
        },
        scanCamera: function (classifier) {
            console.log('loop　function');
            // 推論を実行し、エラーがあればerrに、結果をresultsに格納して、
            // 推論が完了次第 { } の中身を実行します
            classifier.classify(async (err, results) => {
                axios.post('http://localhost:51111/api/scanPlant', {
                    plantLabel: results[0].label
                }).then(res => {
                    this.plantId = res.data.plant.plantId;
                    this.plantName = res.data.plant.name;
                    this.information = res.data.plant.information;
                    this.scientific = res.data.plant.scientific;
                    this.image1 = res.data.plant.plantImage1;
                    this.image2 = res.data.plant.plantImage2;
                    this.image3 = res.data.plant.plantImage3;
                    this.image4 = res.data.plant.plantImage4;
                    this.image5 = res.data.plant.plantImage5;
                    this.getPlant = true;
                    this.isLoading = false

                }).catch(error => {
                    console.log(error);
                }).finally(
                    () => {
                        this.isRecognizing = false;
                        this.recogButton = '撮影完了'
                    });
                console.log(results[0].label)

                // setTimeout(this.loop(classifier), 1000);
            })
        },
        onImageSelected(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage = imageData
        },
        async registerPlant(userId) {
            if (!this.$page.props.user) {
                this.openModal();
                return;
            }
            if (this.isRecognizing) {
                return; // 認識中は何もしない
            }
            this.isRecognizing = true;
            this.isLoading = true

            axios.post('http://localhost:51111/api/plantUnit', {
                plantId: this.plantId,
                userId: userId,
                plantImage: this.selectedImage,
            }).then(res => {
                this.plant = res.data;
                this.getPlant = true
                this.isLoading = false
                window.location.href = 'http://localhost:51111/plantUnit/';


            }).catch(error => {
                console.log(error);
                this.isLoading = false

            }).finally(
                () => {
                    this.isRecognizing = false;
                    this.recogButton = '撮影完了'
                });
        },
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        },
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

<style>
#plant-info {
    width: 100%;
    text-align: left;
}

video {
    border: 3px solid green;
}

.button-width {
    width: 200px; /* 任意の幅に設定 */
}
</style>
