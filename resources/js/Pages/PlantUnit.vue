<template>
    <div class="bg-green-100 pb-16 h-screen">
        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <h1 class="text-5xl text-center pt-4">My　プラント</h1>
        <div class="flex justify-center">
            <div class="flex flex-col w-5/6 lg:w-3/4">
                <div v-if="isLoading">
                    <p class="text-center p-24">Loading...</p>
                </div>
                <div v-else>
                    <div v-for="(plantUnit,index) in plantUnits">
                        <div
                            class="card card-side bg-base-100 shadow-lg rounded-lg overflow-hidden m4transform hover:scale-105 transition duration-300 my-4">
                            <figure><img :src="'data:image/png;base64,'+plantUnit.plantImage"
                                         class="w-24 h-24 md:w-36 md:h-36 lg:w-48 lg:h-48"/></figure>
                            <div class="card-body">
                                <div class="flex justify-between">
                                    <h2 class="card-title">{{ plantUnit.plantNickName }}</h2>
                                    <button @click="openChangeNameModal(),getIndex(index)">名前変更</button>
                                </div>
                                <p>種名：{{ plantUnit.plantName }}</p>
                                <p>学名：{{ plantUnit.scientific }}</p>
                                <p>日記更新日: {{ plantUnit.createDate }}</p>
                                <div class="card-actions justify-end ">
                                    <div class="flex flex-col">
                                        <a :href="route('plantUnitDetail', { plantUnitId: plantUnit.plantUnitId })"
                                           class="block">
                                            <button class="btn btn-success">詳細</button>
                                        </a>
                                        <button class=" bg-red-300 rounded mt-4" @click="deleteUnit(plantUnit)">削除
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ChangeNameModal :open-modal="isChangeNameModalOpen" @closeModal="closeChangeNameModal"
                     :plantUnit="plantUnits[arrayIndex]"/>
    <NaviFooter/>

</template>

<script>
import LoadWait from "@/Components/LoadWait.vue";
import NaviFooter from "@/Components/NaviFooter.vue";
import ChangeNameModal from "@/Components/ChangeNameModal.vue";
import {reactive} from "vue";

export default {
    name: "PlantUnit",
    components: {
        LoadWait,
        NaviFooter,
        ChangeNameModal
    },
    props: ['user'],

    data() {
        return {
            plantUnits: [{
                plantUnitId: '',
                UserId: '',
                plantId: '',
                checkSeatId: '',
                plantName: null,
                plantImage: '',
                diaries: [],
                createDate: '',
                updateDate: '',
                plantData: {
                    scientific: '',
                }
            }],
            isChangeNameModalOpen: false,
            isLoading: false,
            arrayIndex: null,
        }
    },
    created() {
        this.isLoading = true
        console.log(this.user.user_id);
        axios.get(`/api/${this.user.user_id}/plantUnit?userId=${this.user.user_id}`)
            .then(res => {
                const plantUnits = res.data.plantUnits.map(plant => ({
                    plantUnitId: plant.plantUnitId,
                    userId: plant.userId,
                    plantId: plant.plantId,
                    checkSeatId: plant.checkSeatId,
                    plantNickName: plant.plantNickName,
                    plantImage: plant.plantImage,
                    diaries: plant.diaries,
                    createDate: plant.createDate,
                    updateDate: plant.updateDate,
                    plantName: plant.plantName,
                    scientific: plant.scientific

                }));
                this.plantUnits = plantUnits;
                this.isLoading = false;
            })
            .catch(error => {
                // APIリクエストが失敗した場合の処理
                console.log(error);
                this.isLoading = false;
            });
    },
    methods: {
        reactive,
        deleteUnit(plantUnit) {
            if (confirm('本当に削除しますか？')) {
                this.isLoading = true;
                axios
                    .post('/api/plantUnit/' + plantUnit.plantUnitId, {}, {
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-HTTP-Method-Override': 'DELETE',
                        }
                    })
                    .then(res => {
                        window.location.href = 'http://localhost:51111/plantUnit/';
                    })
                    .catch(error => {
                        console.log(error);
                        this.isLoading = false;
                    });
            }
        },
        getIndex(index) {
            this.arrayIndex = index
        },
        openChangeNameModal() {
            setTimeout(() => {
                this.isChangeNameModalOpen = true;
            }, 100);
        },
        closeChangeNameModal() {
            this.isChangeNameModalOpen = false;
        }
    },

    computed: {
        computedPlantUnitId() {
            return this.plantUnitId;
        }
    }
}
</script>

<style scoped>
[data-page-status="hydrated"] {
    visibility: hidden;
}
</style>
