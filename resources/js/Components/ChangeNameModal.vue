ChangeNameModal.vue


<template>

    <div class="relative flex justify-center items-center">
        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center items-center">
            <div class="bg-white w-5/6 py-24 px-16 lg:pl-10 lg:w-3/4 flex flex-col justify-center"
                 contenteditable="true" @click.stop="" style="height: 400px; overflow: hidden;">
                <h1 class="mb-4 text-2xl font-medium text-gray-900">植物の名前を変更する</h1>
                <p>種名:{{ plantUnit.plantName }}</p>
                <section class="text-gray-600 body-font flex-grow">
                    <div class="mb-4">
                        <label for="plant-nickname" class="text-gray-700 font-medium">植物のニックネーム</label>
                        <input type="text" id="plant-nickname" placeholder="" class="input input-bordered w-full"
                               v-model="plantUnit.plantNickName"/>
                    </div>
                    <button @click="update()"
                            class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                        変更する
                    </button>
                </section>
                <span v-show="errors" class="text-red-500">
            <p v-for="error in errors">{{ error }}</p>
        </span>
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
        plantUnit: {
            default: () => ({
                checkSeatId: '',
                diaries: [],
                plantId: '',
                plantImage: '',
                plantName: '',
                plantNickName: '',
                plantUnitId: '',
                scientific: '',
                createDate: '',
                updateDate: '',
            })
        }
    },
    data() {
        return {
            isOpen: false,
            alertTimes: [],
            errors: [],
            isLoading: false,
            selectedImage: null,
        };
    },
    created() {
        console.log(this.plantUnit)
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
            this.diary.image = imageData;
        },
        create() {
            this.isLoading = true
        },
        update() {
            this.isLoading = true
            axios.post('/api/plantUnit/' + this.plantUnit.plantUnitId, {
                    plantId: this.plantUnit.plantId,
                    plantName: this.plantUnit.plantNickName,
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                }).then(res => {

                console.log('とうろくせいこう')

                this.isLoading = false
                this.closeModal();

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
});
</script>

<style scoped>
.selected-image {
    width: 400px;
    height: 400px;
}
</style>
