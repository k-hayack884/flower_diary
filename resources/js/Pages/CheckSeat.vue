Comment.vue
<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FertilizerSettingModal from "@/Components/FertilizerSettingModal.vue";
import WaterSettingModal from "@/Components/WaterSettingModal.vue";
import {reactive} from "vue";
</script>
<template>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">お世話の設定</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-500">Whatever cardigan tote bag tumblr hexagon
                    brooklyn asymmetrical gentrify, subway tile poke farm-to-table.</p>
            </div>
            <h1 class="relative py-1">
                <span
                    class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 text-sm leading-tight tracking-widest"> 水やり</span>
                <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
            </h1>
            <div class="flex flex-wrap m-4">
                <div v-for="(waterSetting,index) in waterSettings" class="w-full sm:w-1/2 lg:w-1/3 p-4 ">
                    <div class="p-4 h-104 w-auto">
                        <div class="border border-gray-200 rounded-lg text-center p-6">
                            <div
                                class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 ">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">水やり設定{{ index + 1 }}</h2>
                            <ul>
                                <li>
                                    設定月:{{ waterSetting.months }}
                                </li>
                                <li v-if="waterSetting.waterAmount === 'a_lot'">
                                    <p>水やり量:たっぷり</p>
                                </li>
                                <li v-else-if="waterSetting.waterAmount === 'moderate_amount'">
                                    <p>水やり量:適量</p>
                                </li>
                                <li v-else-if="waterSetting.waterAmount === 'sparingly'">
                                    <p>水やり量:ひかえめ</p>
                                </li>
                                <li>
                                    水やり間隔:{{ waterSetting.wateringInterval }}日に{{ waterSetting.wateringTimes }}回
                                </li>
                                <li>
                                    備考:{{ waterSetting.note }}
                                </li>
                                <li>
                                    通知時間:{{ waterSetting.alertTimes }}
                                </li>
                            </ul>

                            <button @click="openWaterModal(); getIndex(index)"
                                    class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                設定
                            </button>
                        </div>
                    </div>
                </div>

                <button @click="openWaterModal(),getIndex(null)"
                        class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    設定
                </button>
                <WaterSettingModal :open-modal="isWaterModalOpen" @closeModal="closeWaterModal"
                                   v-if="waterSettings[arrayIndex]"
                                   :waterSetting="waterSettings[arrayIndex]"/>

                <WaterSettingModal :open-modal="isWaterModalOpen" @closeModal="closeWaterModal"
                                        v-else
                                        :waterSetting="reactive({
                                        checkSeatId:checkSeatId,
        waterSettingId: '',
        months: [],
        note: '',
        waterAmount: 'moderate_amount',
        wateringTimes: 0,
        wateringInterval: 0,
        alertTimes:[],
        isCreate:true
    })
       "/>

            </div>
            <h1 class="relative py-1">
                <span
                    class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 mt-4 text-sm leading-tight tracking-widest"> 肥料</span>
                <span class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
            </h1>
            <div class="flex flex-wrap m-4">
                <div v-for="(fertilizerSetting,index) in fertilizerSettings" class="w-full sm:w-1/2 lg:w-1/3 p-4">
                    <div class="p-4 h-104 w-auto">
                        <div class="border border-gray-200 p-6 rounded-lg text-center">
                            <div
                                class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" class="w-6 h-6" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-2">肥料設定{{ index + 1 }}</h2>
                            <ul>
                                <li>
                                    肥料名:{{ fertilizerSetting.fertilizerName }}
                                </li>
                                <li>
                                    設定月:{{ fertilizerSetting.months }}
                                </li>
                                <li>
                                    肥料量:{{ fertilizerSetting.fertilizerAmount }}g
                                </li>
                                <li>
                                    備考:{{ fertilizerSetting.note }}
                                </li>
                            </ul>
                            <button @click="openFertilizerModal(); getIndex(index)"
                                    class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                設定
                            </button>
                        </div>
                    </div>
                </div>
                <button @click="openFertilizerModal(),getIndex(null)"
                        class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    設定
                </button>
                <FertilizerSettingModal :open-modal="isFertilizerModalOpen" @closeModal="closeFertilizerModal"
                                        v-if="arrayIndex !== null"
                                        :fertilizerSetting="fertilizerSettings[arrayIndex]"/>
                <FertilizerSettingModal :open-modal="isFertilizerModalOpen" @closeModal="closeFertilizerModal"
                                        v-else
                                        :fertilizerSetting="reactive({
                                        checkSeatId:checkSeatId,
        fertilizerSettingId: '',
        months: [],
        note: '',
        fertilizerAmount: 0,
        fertilizerName: '',
        isCreate:true
    })
                "/>

            </div>
        </div>
    </section>


</template>
<script>


export default {
    components: {
        WaterSettingModal,
        FertilizerSettingModal,

    },
    name: "CheckSeat.vue",
    props: ['checkSeatId'],
    data() {
        return {
            isWaterModalOpen: false,
            isFertilizerModalOpen: false,
            waterSettings: [],
            fertilizerSettings: [],
            arrayIndex: null,
            successMessage: null,
            errorMessage: null,
        }
    },
    created() {
        axios.get(`/api/checkSeat/${this.checkSeatId}/waterSetting?checkSeatId=${this.checkSeatId}`, {})
            .then((res) => {
                const waterSettingData = res.data.waterSettings.map(waterSetting => ({
                    waterSettingId: waterSetting.waterSettingId,
                    checkSeatId:this.checkSeatId,
                    months: waterSetting.months,
                    note: waterSetting.note,
                    waterAmount: waterSetting.waterAmount,
                    wateringTimes: waterSetting.wateringTimes,
                    wateringInterval: waterSetting.wateringInterval,
                    alertTimes: waterSetting.alertTimes,
                }));
                this.waterSettings = waterSettingData
            })
            .catch((error) => {
                console.log(error);
            });
        axios.get(`/api/checkSeat/${this.checkSeatId}/fertilizerSetting?checkSeatId=${this.checkSeatId}`, {})
            .then((res) => {
                const fertilizerSettingData = res.data.fertilizerSettings.map(fertilizerSetting => ({
                    fertilizerSettingId: fertilizerSetting.fertilizerSettingId,
                    checkSeatId:this.checkSeatId,
                    months: fertilizerSetting.months,
                    note: fertilizerSetting.note,
                    fertilizerAmount: fertilizerSetting.fertilizerAmount,
                    fertilizerName: fertilizerSetting.fertilizerName,
                }));
                this.fertilizerSettings = fertilizerSettingData
            })
            .catch((error) => {
                console.log(error);
            });


    },
    mounted() {
        this.successMessage = "{{ session('success') }}";
    },
    methods: {
        getIndex(index) {
            this.arrayIndex = index
        },
        async create() {
            axios.post('http://localhost:51111/api/comment', {

                commentUserId: '774c1092-7a0d-40b0-af6e-30bff5975e31',
                commentContent: 'めちゃくちゃ成長している',

            }).then(res => {
                console.log('とうろくせいこう')
            }).catch(error => {
                console.log(error);
            });
        },
        async read() {
            axios.get('http://localhost:51111/api/comment/98b517b2-ba89-4b35-9dd1-ffb71b6d240b', {}).then(res => {
                console.log('とうろくせいこう')
            }).catch(error => {
                console.log(error);
            });
        },
        async update() {
            axios.post('http://localhost:51111/api/comment/98b517b2-ba89-4b35-9dd1-ffb71b6d240b',
                {
                    commentUserId: '774c1092-7a0d-40b0-af6e-30bff5975e31',
                    commentContent: '書き換え完了',
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                }).then(res => {
                console.log('とうろくせいこう')
            }).catch(error => {
                console.log(error);
            });
        },
        async delete_suru() {
            axios.post('http://localhost:51111/api/comment/98b517b2-ba89-4b35-9dd1-ffb71b6d240b',
                {
                    commentUserId: '774c1092-7a0d-40b0-af6e-30bff5975e31',
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'DELETE',
                    }
                }).then(res => {
                console.log('とうろくせいこう')
            }).catch(error => {
                console.log(error);
            });
        },
        openWaterModal() {
            setTimeout(() => {
                this.isWaterModalOpen = true;
            }, 100);
        },
        closeWaterModal() {
            this.isWaterModalOpen = false;
        },
        openFertilizerModal() {
            setTimeout(() => {
                this.isFertilizerModalOpen = true;
            }, 100);
        },
        closeFertilizerModal() {
            this.isFertilizerModalOpen = false;
        },
    }
}


</script>

<style scoped>

</style>
