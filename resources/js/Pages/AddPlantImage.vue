<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
<template>
    <LoadWait :show="isLoading"
              class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
    <h1 class="red">植物の画像を追加する</h1>

    <div class="flex justify-between">
        <div class="flex flex-col">
            <image-maker class="button-width" @image-selected="onImageSelected1"></image-maker>
            <div v-if="selectedImage1" class="flex items-center justify-center">
                <img :src="selectedImage1" alt="Selected image" id="plant_image"
                     style="width: 300px; height: 300px ;">
            </div>
        </div>
        <div class="flex flex-col">

            <image-maker class="button-width" @image-selected="onImageSelected2"></image-maker>
            <div v-if="selectedImage2" class="flex items-center justify-center">
                <img :src="selectedImage2" alt="Selected image" id="plant_image"
                     style="width: 300px; height: 300px ;">
            </div>
        </div>
        <div class="flex flex-col">
            <image-maker class="button-width" @image-selected="onImageSelected3"></image-maker>
            <div v-if="selectedImage3" class="flex items-center justify-center">
                <img :src="selectedImage3" alt="Selected image" id="plant_image"
                     style="width: 300px; height: 300px ;">
            </div>
        </div>
        <div class="flex flex-col">

            <image-maker class="button-width" @image-selected="onImageSelected4"></image-maker>
            <div v-if="selectedImage4" class="flex items-center justify-center">
                <img :src="selectedImage4" alt="Selected image" id="plant_image"
                     style="width: 300px; height: 300px ;">
            </div>
        </div>
        <div class="flex flex-col">

            <image-maker class="button-width" @image-selected="onImageSelected5"></image-maker>
            <div v-if="selectedImage5" class="flex items-center justify-center">
                <img :src="selectedImage5" alt="Selected image" id="plant_image"
                     style="width: 300px; height: 300px ;">
            </div>
        </div>

    </div>
    <div class="form-control　flex mx-auto">
        <label class="label">
            <span class="label-text">プラントID</span>
        </label>
        <label class="input-group flex flex-col sm:flex-row">
            <input type="text" placeholder="" class="input input-bordered"
                   v-model="plantId"/>
        </label>
    </div>
    <button @click="addImage()"
            class="flex mx-auto  text-white bg-green-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-lg"
            :class="{ 'opacity-25': isLoading }"
            :disabled="isLoading">
        追加する
    </button>
    <div v-if="successMessage" id="successMessage"
         class="fixed bottom-16 left-1/2 transform -translate-x-1/2 z-9999">
        <div class="bg-white">
            <div class="w-96 rounded-lg overflow-hidden shadow-md py-5 flex">
                <div class="flex-grow-1 my-auto">
                    <p class="text-center ml-12">{{ successMessage }}</p>
                </div>
                <div class="flex items-center ml-auto">
                    <div class="flex flex-col justify-between p-4">
                        <span class="flower-loader h-150"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import ImageMaker from "@/Components/ImageMaker.vue";
import LoadWait from "@/Components/LoadWait.vue";

export default {
    name: "Diary.vue",
    components: {
        // Load,
        LoadWait,
        ImageMaker,
        // NaviFooter,
    },
    data() {
        return {
            plantId: '',
            isLoading: false,
            selectedImage1: null,
            selectedImage2: null,
            selectedImage3: null,
            selectedImage4: null,
            selectedImage5: null,
            successMessage: null,
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
    props: ['plantUnitId'],
    watch: {
        successMessage(value) {
            if (value) {
                setTimeout(() => {
                    this.successMessage = null;
                }, 5000);
            }
        }
    },
    methods: {
        onImageSelected1(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage1 = imageData
        },
        onImageSelected2(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage2 = imageData
        },
        onImageSelected3(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage3 = imageData
        },
        onImageSelected4(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage4 = imageData
        },
        onImageSelected5(imageData) {
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage5 = imageData
        },
        addImage() {
            this.isLoading = true

            axios.post('/api/addPlant', {
                plantId: this.plantId,
                plantImages:[this.selectedImage1,this.selectedImage2,this.selectedImage3,this.selectedImage4,this.selectedImage5]
            }).then(res => {
                this.successMessage = res.data.original.successMessage;
                this.isLoading = false;
                this.plantId=null;
                    this.selectedImage1=null;
                    this.selectedImage2=null;
                    this.selectedImage3=null;
                    this.selectedImage4=null;
                    this.selectedImage5=null;
            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading = false
                } else {
                    console.log(error);
                    this.isLoading = false

                }
            });
        },

    }
}


</script>

<style scoped>

</style>
