DairyModal.vue


<template>
    <div class="relative">
        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center">
            <div class="p-8 bg-white w-full lg:py-32 lg:px-16 lg:pl-10 lg:w-3/4 tails-selected-element"
                 contenteditable="true" @click.stop="" style="max-height: 120vh; overflow-y: auto;">
                <h1 class="text-2xl text-center">日記を編集する</h1>
                <span v-show="errors" class="text-red-500">
                <p v-for="error in errors">
                    {{ error }}
                </p></span>
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="container px-5 py-24 mx-auto">
                        <div class="lg:w-full mx-auto flex flex-wrap">
                            <div v-if="selectedImage">
                                <img :src="selectedImage" alt="Selected image"  style="width: 300px; height: 300px ;">
                            </div>
                            <div v-else-if="diary.diaryImage">
                                <img :src="'data:image/png;base64,'+diary.diaryImage" alt="Selected image"
                                     style="width: 300px; height: 300px ;">
                            </div>
                            <div v-else>
                                <img src="../../icon/noImag.png" style="width: 300px; height: 300px ;">
                            </div>
                            <div class="lg:w-1/2 w-full lg:pl-10  mt-6 lg:mt-0">
                                <div class="relative mb-4">
                                    <label for="message"
                                           class="leading-7 text-sm text-gray-600">投稿内容（投稿できるのは200字までです）</label>
                                    <textarea v-model="diary.diaryContent" id="message" name="message"
                                              class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"
                                              style="width: 300px; height: 200px;"></textarea>
                                </div>
                                <div class="flex justify-center items-center h-200">
                                    <image-maker class="button-width" @image-selected="onImageSelected"></image-maker>
                                </div>
                                <div class="flex justify-center">
                                    <button v-if="diary.isCreate" @click="create()"
                                            class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                                            :class="{ 'opacity-25': isLoading }"
                                            :disabled="isLoading">
                                        作成する
                                    </button>
                                    <div v-else>
                                        <button @click="update()"
                                                class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                                                :class="{ 'opacity-25': isLoading }"
                                                :disabled="isLoading">
                                            編集する
                                        </button>
                                        <button @click="deleteDiary()"
                                                class="flex mx-auto mt-16 btn btn-outline-success bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                                                :class="{ 'opacity-25': isLoading }"
                                                :disabled="isLoading">
                                            削除する
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</template>

<style>
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
}

#content {
    width: 75%;
    padding: 1em;
    background: #fff;
}
</style>
<script>
import {SmartTagz} from "smart-tagz";
import "smart-tagz/dist/smart-tagz.css";
import {defineComponent} from "vue";
import LoadWait from "@/Components/LoadWait.vue";
import ImageMaker from "@/Components/ImageMaker.vue";


export default defineComponent({
    name: "DiaryModal",
    components: {
        ImageMaker,
        LoadWait
    },
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
        diary: {
            type: Object,
            default: () => ({
                diaryId: '',
                diaryContent: '',
                diaryImage: '',
                createDate: '',
            })
        },
        plantUnitId: {
            type: String,
            required: true,
        }
    },
    data() {
        return {
            isOpen: false,
            alertTimes: [],
            currentWateringTimes: null,
            currentWateringInterval: null,
            errors: [],
            isLoading: false,
            selectedImage: null,
        };
    },
    created() {
        this.diary.image=this.diaryImage
    },
    watch: {
        openModal(newVal) {
            this.isOpen = newVal;
        },
    },
    methods: {
        closeModal() {
            this.isOpen = false;
            this.$emit("closeModal");
        },
        onImageSelected(imageData) {
            this.selectedImage = imageData
            this.diary.diaryImage = imageData;
        },
        create() {
            this.isLoading = true
            axios.post('/api/diary', {
                plantUnitId: this.plantUnitId,
                diaryContent: this.diary.diaryContent,
                plantImage: this.diary.diaryImage,
            }).then(res => {
                window.location.href = 'http://localhost:51111/plantUnit/' + this.plantUnitId;
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
         update() {
            this.isLoading = true
             let diaryImage;
             if (!this.diary.diaryImage.includes('data:image/png;base64,')) {
                 diaryImage = 'data:image/png;base64,' + this.diary.diaryImage;
             } else {
                 diaryImage = this.diary.diaryImage;
             }
            axios.post('/api/diary/' + this.diary.diaryId, {
                    plantUnitId: this.plantUnitId,
                    diaryContent: this.diary.diaryContent,
                    plantImage: diaryImage,
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                }).then(res => {
                window.location.href = 'http://localhost:51111/plantUnit/' + this.plantUnitId;
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
        deleteDiary() {
            if (confirm('本当に削除しますか？')) {
                this.isLoading = true
                axios.post('/api/diary/' + this.diary.diaryId, {},
                    {
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-HTTP-Method-Override': 'DELETE',
                        }
                    }).then(res => {
                    window.location.href = 'http://localhost:51111/plantUnit/' + this.plantUnitId;
                }).catch(error => {
                    console.log(error);
                    this.isLoading = false
                });
            }
        }

    }
});
</script>

<style scoped>
.selected-image {
    width: 400px;
    height: 400px;
}
</style>
