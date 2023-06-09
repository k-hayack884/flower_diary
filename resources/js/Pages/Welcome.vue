<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import Banner from "@/Components/Banner.vue";
import Load from "@/Components/Load.vue";
import RegisterModal from "@/Components/RegisterModal.vue";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

</script>

<template>
    <Head title="Welcome"/>
    <AppLayout title="Welcome">

        <div class="bg-green-100  pb-16">
            <LoadWait :show="isLoading"
                      class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
            <Load :show="isScan" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></Load>
            <div class="relative flex items-top justify-center bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            </div>
            <div class="container text-center p-3 mb-2">
                <div class="row my-3 justify-content-center">
                    <div class="col-6">
                        <img src="../../icon/learf-logo.png" alt="" class="img-fluid" style="width: 50%; margin: 0 auto;">
                    </div>
                </div>
                <div class="info">
                    <p>
                        判別をしたい植物を<br>カメラに写して数秒待ってください<br>
                        また、画像をアップロードしてください
                    </p>
                </div>


                <div class="flex justify-center items-center">
                    <video id="webcam" width="200" height="300" muted autoplay playsinline></video>
                </div>
                <br>
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
                                    <Link :href="route('login')" class="text-sm text-white-700 dark:text-gray-500">ログイン
                                    </Link>
                                </button>
                                <button
                                    class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4 button-width">
                                    <Link v-if="canRegister" :href="route('register')"
                                          class="
                                  ml-4 text-sm text-white-700 dark:text-white-500">新規登録
                                    </Link>
                                </button>
                            </div>
                        </template>
                    </div>
                    <div v-if="getPlant " class="w-full lg:w-2/3 text-center mx-auto">
                        <p class="text-3xl pb-4">名前：{{ plantName }}</p>
                        <p class="text-3xl pb-4">学名：{{ scientific }}</p>
                        <p class=" pb-4">解説：{{ information }}</p>

                       <p class="text-3xl pb-4"> {{ plantName }}の画像</p>
                        <div class="flex mx-auto carousel rounded-box" style="width: 300px; height: 300px ;">
                            <div class="carousel-item">
                                <div v-for="image in plantImages">
                                    <img :src="'data:image/png;base64,'+image"
                                         class="lg:w-full lg:h-full object-cover"
                                         style="width: 300px; height: 300px ;"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-if="getPlant">
                        <div class="text-white py-8">
                            <div class="container mx-auto flex justify-center items-center">
                                <button
                                    @click="registerPlant($page.props.user)"
                                    class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width"
                                    type="button" id="button-addon2"
                                    :class="{ 'opacity-25': isRecognizing }"
                                    :disabled="isRecognizing">
                                    {{ registerButton }}
                                </button>
                                <RegisterModal :open-modal="isModalOpen" @closeModal="closeModal"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-show="$page.props.user">
                <NaviFooter/>
            </div>
        </div>
    </AppLayout>
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
            plantImages: [],
            avatar: null,
            message: '',
            getPlant: false,
            error: '',
            isRecognizing: false,
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
            this.stream = await navigator.mediaDevices.getUserMedia({
                audio: false,
                video: { width: 200, height: 300, facingMode: 'environment' },
                // フロントカメラ優先 { facingMode: "user" }
                // リアカメラ優先 { facingMode: "environment" }
            });

            // 「id="webcam"」となっているパーツ（videoタグ）を取得
            const video = document.getElementById('webcam');

            // videoにカメラ映像ストリームをセット
            video.srcObject = this.stream;

            // Googleのサーバーにアップロードした自作モデルを読み込みにいきます
            this.myPlant.imageModelURL = 'https://teachablemachine.withgoogle.com/models/9P6f9Msvu/';
            const classifier = ml5.imageClassifier(this.myPlant.imageModelURL + 'model.json', video, () => {
                // 読み込みが完了次第ここが実行されます
                console.log('モデルの読み込みが完了しました');
                this.myPlant.shift();

// videoにカメラ映像ストリームをセット
                video.srcObject = this.stream;

// カメラ映像が再生される際にキャプチャと代入を行う
                // カメラ映像が再生される際にキャプチャと代入を行う
                video.addEventListener('play', () => {
                    // キャプチャした画像を描画するためのcanvas要素を作成
                    const canvas = document.createElement('canvas');
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    const context = canvas.getContext('2d');

                    const captureFrame = () => {
                        context.drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
                        const imageData = canvas.toDataURL('image/jpeg'); // キャプチャした画像をデータURL形式で取得
                        this.selectedImage = imageData; // selectedImageに代入
                        setTimeout(captureFrame, 1000); // 1秒後に再度キャプチャを行う
                    };

                    setTimeout(captureFrame, (video.duration - 1) * 1000); // 終了1秒前に最初のキャプチャを行う
                });
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
            const plant_image = await document.getElementById('plant_image');

            // Googleのサーバーにアップロードした自作モデルを読み込みにいきます
            this.myPlant.imageModelURL = 'https://teachablemachine.withgoogle.com/models/9P6f9Msvu/';
            console.log('imageModelURL:', this.myPlant.imageModelURL)
            const classifier = ml5.imageClassifier(this.myPlant.imageModelURL + 'model.json', () => {
                // 読み込みが完了次第ここが実行されます
                console.log('モデルの読み込みが完了しました');
                this.myPlant.shift();
                // this.loop(classifier);
                this.scanImage(classifier)
            });

        },
        scanImage: function (classifier) {
            classifier.classify(plant_image, async (err, results) => {
                axios.post('/api/scanPlant', {
                    plantLabel: results[0].label
                }).then(res => {
                    console.log(res.data)
                    this.plantId = res.data.plant.plantId;
                    this.plantName = res.data.plant.name;
                    this.information = res.data.plant.information;
                    this.scientific = res.data.plant.scientific;
                    this.plantImages = res.data.plant.plantImages;
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
            classifier.classify(async (err, results) => {
                axios.post('/api/scanPlant', {
                    plantLabel: results[0].label
                }).then(res => {
                    this.plantId = res.data.plant.plantId;
                    this.plantName = res.data.plant.name;
                    this.information = res.data.plant.information;
                    this.scientific = res.data.plant.scientific;
                    this.plantImages = res.data.plant.plantImages;
                    this.getPlant = true;
                    this.isLoading = false
                }).catch(error => {
                    console.log(error);
                }).finally(
                    () => {

                        this.isRecognizing = false;
                        this.recogButton = '撮影完了'
                        this.stream.getTracks().forEach((track) => {
                            track.stop();
                        });
                    });
            })
        },
        onImageSelected(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage = imageData
        },
        async registerPlant(user) {
            if (!this.$page.props.user) {
                this.openModal();
                return;
            }
            if (this.isRecognizing) {
                return; // 認識中は何もしない
            }
            console.log(user)
            this.isRecognizing = true;
            this.isLoading = true

            axios.post('/api/plantUnit', {
                plantId: this.plantId,
                userId: user.user_id,
                plantImage: this.selectedImage,
            }).then(res => {
                this.plant = res.data;
                this.getPlant = true
                this.isLoading = false
                window.location.href = '/plantUnit/';

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
