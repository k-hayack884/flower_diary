Comment.vue
<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
import FertilizerSettingModal from "@/Components/FertilizerSettingModal.vue";
import WaterSettingModal from "@/Components/WaterSettingModal.vue";
import {reactive} from "vue";
</script>
<template>
    <AppLayout title="checkSeat">


        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">お世話の設定</h1>
                </div>
                <h1 class="relative py-1">
                <span
                    class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 text-sm leading-tight tracking-widest"> 水やり</span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
                </h1>
                <div class="flex flex-wrap m-4">
                    <div v-for="(waterSetting,index) in waterSettings" class="w-full sm:w-1/2 lg:w-1/3 p-4 ">
                        <div class="p-4 h-104 w-auto">
                            <div class="border border-gray-200 rounded-lg text-center p-6 bg-white">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 ">
                                    <img src="../../icon/water.png" class="lg:w-full lg:h-full object-cover">

                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">水やり設定{{
                                        index + 1
                                    }}</h2>
                                <div class="mx-8">
                                    <ul class="text-left">
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
                                            水やり間隔:{{ waterSetting.wateringInterval }}日に{{
                                                waterSetting.wateringTimes
                                            }}回
                                        </li>
                                        <li>
                                            備考:{{ waterSetting.note }}
                                        </li>
                                        <li>
                                            通知時間:{{ waterSetting.alertTimes }}
                                        </li>
                                    </ul>
                                </div>
                                <button @click="openWaterModal(); getIndex(index)"
                                        class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8">
                                    設定する
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <button @click="openWaterModal(),getIndex(null)"
                        class="flex mx-auto btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                >
                    作成する
                </button>
                <WaterSettingModal :open-modal="isWaterModalOpen" @closeModal="closeWaterModal"
                                   v-if="waterSettings[arrayIndex]"
                                   @success-message="handleSuccessMessage"
                                   @delete-water-setting="deleteWaterSetting"
                                   :waterSetting="waterSettings[arrayIndex]"/>

                <WaterSettingModal :open-modal="isWaterModalOpen" @closeModal="closeWaterModal"
                                   @add-water-setting="addWaterSetting"
                                   @delete-water-setting="deleteWaterSetting"
                                   @success-message="handleSuccessMessage"
                                   v-else
                                   :waterSetting="reactive({
                                        checkSeatId:checkSeatId,
                                        waterSettingId: '',
                                        months: [],
                                        note: '',
                                        waterAmount: 'moderate_amount',
                                        wateringTimes: 1,
                                        wateringInterval: 1,
                                        alertTimes:[],
                                        isCreate:true
                                    })
                "/>
                <div class="mt-16"></div>
                <h1 class="relative py-1">
                    <span
                        class="absolute font-bold font-fontawesome content-'\\f00c Check' bg-green-500 text-white left-0 bottom-full rounded-t-md px-4 py-2 mt-4 text-sm leading-tight tracking-widest"> 肥料</span>
                    <span
                        class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-green-600 to-transparent"></span>
                </h1>
                <div class="flex flex-wrap m-4">
                    <div v-for="(fertilizerSetting,index) in fertilizerSettings" class="w-full sm:w-1/2 lg:w-1/3 p-4">
                        <div class="p-4 h-104 w-auto">
                            <div class="border border-gray-200 p-6 rounded-lg text-center bg-white">
                                <div
                                    class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                    <img src="../../icon/fertilizer.png" class="lg:w-full lg:h-full object-cover">

                                </div>
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-2">肥料設定{{
                                        index + 1
                                    }}</h2>
                                <div class="mx-8">
                                    <ul class="text-left">
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
                                </div>
                                <button @click="openFertilizerModal(); getIndex(index)"
                                        class="btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                                >
                                    設定する
                                </button>
                            </div>
                        </div>
                    </div>


                </div>
                <button @click="openFertilizerModal(),getIndex(null)"
                        class="flex mx-auto btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                >
                    作成する
                </button>
                <FertilizerSettingModal :open-modal="isFertilizerModalOpen" @closeModal="closeFertilizerModal"
                                        v-if="arrayIndex !== null"
                                        @success-message="handleSuccessMessage"
                                        @delete-fertilizer-setting="deleteFertilizerSetting"
                                        :fertilizerSetting="fertilizerSettings[arrayIndex]"/>
                <FertilizerSettingModal :open-modal="isFertilizerModalOpen" @closeModal="closeFertilizerModal"
                                        @add-fertilizer-setting="addFertilizerSetting"
                                        @delete-fertilizer-setting="deleteFertilizerSetting"
                                        @success-message="handleSuccessMessage"
                                        v-else
                                        :fertilizerSetting="reactive({
                                        checkSeatId:checkSeatId,
                                        fertilizerSettingId: '',
                                        months: [],
                                        note: '',
                                        fertilizerAmount: 1,
                                        fertilizerName: '',
                                        isCreate:true
                                         })
                "/>
            </div>
            <div v-if="successMessage" id="successMessage"
                 class="fixed bottom-24 left-1/2 transform -translate-x-1/2 z-9999">
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
            <NaviFooter/>
        </section>
    </AppLayout>
</template>
<script>


import LoadWait from "@/Components/LoadWait.vue";
import NaviFooter from "@/Components/NaviFooter.vue";

export default {
    components: {
        WaterSettingModal,
        LoadWait,
        FertilizerSettingModal,
        NaviFooter,

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
            isLoading: false,
        }
    },
    created() {
        this.isLoading = true;
        axios.all([
            axios.get(`/api/checkSeat/${this.checkSeatId}/waterSetting?checkSeatId=${this.checkSeatId}`),
            axios.get(`/api/checkSeat/${this.checkSeatId}/fertilizerSetting?checkSeatId=${this.checkSeatId}`)
        ])
            .then(axios.spread((res1, res2) => {
                const waterSettingData = res1.data.waterSettings.map(waterSetting => ({
                    waterSettingId: waterSetting.waterSettingId,
                    checkSeatId: this.checkSeatId,
                    months: waterSetting.months,
                    note: waterSetting.note,
                    waterAmount: waterSetting.waterAmount,
                    wateringTimes: waterSetting.wateringTimes,
                    wateringInterval: waterSetting.wateringInterval,
                    alertTimes: waterSetting.alertTimes,
                }));
                this.waterSettings = waterSettingData

                const fertilizerSettingData = res2.data.fertilizerSettings.map(fertilizerSetting => ({
                    fertilizerSettingId: fertilizerSetting.fertilizerSettingId,
                    checkSeatId: this.checkSeatId,
                    months: fertilizerSetting.months,
                    note: fertilizerSetting.note,
                    fertilizerAmount: fertilizerSetting.fertilizerAmount,
                    fertilizerName: fertilizerSetting.fertilizerName,
                }));
                this.fertilizerSettings = fertilizerSettingData
            }))
            .catch((error) => {
                this.isLoading = false;
                console.log(error);
            })
            .finally(() => {
                this.isLoading = false;
            });
    },
    methods: {
        addWaterSetting(setting) {
            const {
                alertTimes,
                checkSeatId,
                months,
                note,
                waterAmount,
                waterSettingId,
                wateringInterval,
                wateringTimes
            } = setting;
            this.waterSettings.push({
                alertTimes, // alertTimesが存在しない場合は空の配列を使用
                checkSeatId,
                months,
                note,
                waterAmount,
                waterSettingId,
                wateringInterval,
                wateringTimes,
                isCreate: false,
            });
        },
        deleteWaterSetting(settingId) {
            for (let i = 0; i < this.waterSettings.length; i++) {
                if (this.waterSettings[i].waterSettingId === settingId) {
                    this.waterSettings.splice(i, 1);
                    break;
                }
            }

        },
        addFertilizerSetting(setting) {
            const {
                checkSeatId,
                months,
                note,
                fertilizerAmount,
                fertilizerSettingId,
                fertilizerName
            } = setting;
            this.fertilizerSettings.push({
                checkSeatId,
                months,
                note,
                fertilizerAmount,
                fertilizerSettingId,
                fertilizerName,
                isCreate: false,
            });
        },
        deleteFertilizerSetting(settingId) {
            for (let i = 0; i < this.fertilizerSettings.length; i++) {
                if (this.fertilizerSettings[i].fertilizerSettingId === settingId) {
                    this.fertilizerSettings.splice(i, 1);
                    break;
                }
            }

        },

        handleSuccessMessage(message) {
            this.successMessage = message
            console.log(message)
            console.log(this.successMessage)
        },
        getIndex(index) {
            this.arrayIndex = index
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
    },
    watch: {
        successMessage(value) {
            if (value) {
                setTimeout(() => {
                    this.successMessage = null;
                }, 5000);
            }
        }
    },
}

</script>

<style scoped>

</style>
