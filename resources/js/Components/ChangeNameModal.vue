ChangeNameModal.vue


<template>

    <div class="relative flex justify-center items-center">
        <LoadWait :show="isLoading" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center items-center">
            <div class="bg-white w-5/6 py-24 px-16 lg:pl-10 lg:w-3/4"
                 contenteditable="true" @click.stop="" style="max-height: 100px; overflow: hidden;">
                <h1>植物の名前を変更する</h1>

                <span v-show="errors" class="text-red-500">
                <p v-for="error in errors">
                    {{ error }}
                </p>
            </span>

                <section class="text-gray-600 body-font">
                        <label class="input-group">
                            <input type="text" placeholder="" class="input input-bordered"
                                   v-model="plantUnit.plantNickName"/>
                            <span>現在の名前:{{ currentPlantNickName }}</span>
                        </label>

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
    name: "ChangeNameModal",
    components: {
        LoadWait
    },
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
        plantUnitId: {
            type: String,
            required: true,
        },
        plantUnit:{

        }
    },
    data() {
        return {
            isOpen: false,
            alertTimes: [],
            currentPlantNickName: null,
            errors: [],
            isLoading: false,
            selectedImage: null,
            plantUnit: {
            },
        };
    },
    created()
    {
        this.currentPlantNickName=this.plantUnit.plantNickName
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
            // ImageMakerコンポーネントから渡された画像データを処理する
            this.selectedImage = imageData
            this.diary.image = imageData;
        },
        create() {
            this.isLoading = true
            this.currentPlantNickName = this.plantUnit.plantNickName;
        },
        update() {
            this.isLoading = true
            console.log(this.diary.diaryId)
            axios.post('/api/diary/' + this.diary.diaryId, {
                    plantUnitId: this.plantUnitId,
                    diaryContent: this.diary.diaryContent,
                    plantImage: this.diary.image,
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                }).then(res => {

                console.log('とうろくせいこう')

                window.location.href = 'http://localhost:51111/plantUnit/' + this.plantUnitId;
                this.isLoading = false

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
            this.isLoading = true
            axios.post('/api/diary/' + this.diary.diaryId, {},
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'DELETE',
                    }
                }).then(res => {
                window.location.href = 'http://localhost:51111/plantUnit/' + this.plantUnitId;
                this.isLoading = false
            }).catch(error => {
                console.log(error);
                this.isLoading = false

            });
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
