WaterSettingModal.vue

<template>
    <div class="relative">
        <LoadWait :show="isLoading"
                  class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
        <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center">
            <div class="p-8 bg-white w-3/4 lg:py-32 lg:px-16 lg:pl-10 lg:w-1/2 tails-selected-element"
                 contenteditable="true" @click.stop="" style="max-height: 120vh; overflow-y: auto;">
                <h1 class="text-2xl text-center mb-12">水やりを設定する</h1>
                <span v-show="errors" class="text-red-500">
                <p v-for="error in errors">
                    {{ error }}
                </p></span>
                <div class="flex flex-col items-start w-full lg:max-w-lg mx-auto"> <!-- mx-autoを追加 -->
                    <div class="grid grid-cols-4 gap-4 mx-auto">
                        <button v-for="(month, index) in 12" :key="month"
                                :class="{'bg-green-900': waterSetting.months && waterSetting.months.includes(index+1),
                             'bg-green-500': !waterSetting.months || !waterSetting.months.includes(index+1)}"
                                class="text-white font-bold py-2 px-2 lg:px-4 rounded-full"
                                @click="selectMonth(index)">
                            {{ month }}月
                        </button>
                    </div>
                    <div class="grid grid-cols-3 w-full lg:max-w-lg mx-auto pt-8">
                        <div class="btn-group flex justify-center">
                            <label class="btn px-4 md:px-8 lg:px-12 bg-green-500 hover:bg-green-900"
                                   :class="{ 'bg-green-800': waterSetting.waterAmount === 'a_lot' }">
                                <input @click="selectAmount('a_lot')" type="radio" name="options" class="hidden"/>
                                <span style="writing-mode: horizontal-tb;">たっぷり</span>
                            </label>
                        </div>
                        <div class="btn-group flex justify-center">
                            <label class="btn px-6 md:px-10 lg:px-12 bg-green-500 hover:bg-green-900"
                                   :class="{ 'bg-green-800': waterSetting.waterAmount === 'moderate_amount' }">
                                <input @click="selectAmount('moderate_amount')" type="radio" name="options"
                                       class="hidden"/>
                                <span style="writing-mode: horizontal-tb;">適量</span>
                            </label>
                        </div>
                        <div class="btn-group flex justify-center">
                            <label class="btn px-4 md:px-8 lg:px-12 bg-green-500 hover:bg-green-900"
                                   :class="{ 'bg-green-800': waterSetting.waterAmount === 'sparingly' }">
                                <input @click="selectAmount('sparingly')" type="radio" name="options" class="hidden"/>
                                <span style="writing-mode: horizontal-tb;">ひかえめ</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">水やり間隔</span>
                        </label>
                        <label class="input-group flex flex-col sm:flex-row">
                            <input type="text" placeholder="" class="input input-bordered sm:mb-0"
                                   v-model="waterSetting.wateringInterval"/>
                            <span>現在の水やり間隔:{{ currentWateringInterval }}</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">水やり回数</span>
                        </label>
                        <label class="input-group flex flex-col sm:flex-row">
                            <input type="text" placeholder="" class="input input-bordered"
                                   v-model="waterSetting.wateringTimes"/>
                            <span>現在の水やり回数:{{ currentWateringTimes }}</span>
                        </label>
                    </div>
                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">備考欄</span>
                        </label>
                        <textarea class="textarea textarea-success" :placeholder="waterSetting.note"
                                  v-model="waterSetting.note"></textarea>
                    </div>
                    <smart-tagz
                        :key="waterSetting.waterSettingId"
                        v-if="waterSetting.alertTimes"
                        autosuggest
                        editable
                        inputPlaceholder="通知時間を選んでください(最大10個まで)"
                        :sources="sources"
                        :allowPaste="{delimiter: ','}"
                        :allowDuplicates="false"
                        :maxTags="10"
                        v-model="waterSetting.alertTimes"
                        :defaultTags="waterSetting.alertTimes"
                        :on-changed="handleTagAdded"
                        class="w-full"
                    />
                </div>
                <button v-if="waterSetting.isCreate" @click="create()"
                        class="flex mx-auto mt-16 btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                        :class="{ 'opacity-25': isLoading }"
                        :disabled="isLoading">
                    作成する
                </button>
                <div v-else>
                    <button @click="update()"
                            class="flex mx-auto mt-16 btn btn-outline-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                            :class="{ 'opacity-25': isLoading }"
                            :disabled="isLoading">
                        編集する
                    </button>
                    <button @click="deleteSeat()"
                            class="flex mx-auto mt-16 btn btn-outline-success bg-gradient-to-br from-red-300 to-red-800 hover:bg-gradient-to-tl text-white rounded px-10 button-width mt-8"
                            :class="{ 'opacity-25': isLoading }"
                            :disabled="isLoading">
                        削除する
                    </button>
                </div>
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


export default defineComponent({
    name: "WaterSettingModal",
    components: {
        SmartTagz,
        LoadWait
    },
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
        waterSetting: {
            type: Object,
            default: () => ({
                waterSettingId: '',
                months: [],
                note: '',
                waterSettingAmount: 'moderate_amount',
                wateringTimes: 1,
                wateringInterval: 1,
                alertTimes: [],
            })
        },
    },
    data() {
        return {
            isOpen: false,
            alertTimes: [],
            currentWateringTimes: null,
            currentWateringInterval: null,
            errors: [],
            isLoading: false
        };
    },
    created() {
        this.alertTimes = this.waterSetting.alertTimes;
        this.currentWateringTimes = this.waterSetting.wateringTimes;
        this.currentWateringInterval = this.waterSetting.wateringInterval;
    },
    watch: {
        openModal(newVal) {
            this.isOpen = newVal;
            if (!newVal) {
                // isOpenプロパティがfalseになった時にdataオブジェクトを初期値に設定する
                this.alertTimes = [];
                this.currentWateringTimes = 0;
                this.currentWateringInterval = 0;
                this.errors = [];
                this.isLoading = false;
            }
        },
        waterSetting(newVal) {
            this.alertTimes = newVal.alertTimes;
            this.currentWateringTimes = newVal.wateringTimes;
            this.currentWateringInterval = newVal.wateringInterval;
        },
    },
    methods: {
        closeModal() {
            this.isOpen = false;
            this.$emit("closeModal");
        },
        selectMonth(index) {
            const month = index + 1;
            const indexInMonths = this.waterSetting.months.indexOf(month);
            if (indexInMonths === -1) {
                this.waterSetting.months.push(month);
            } else {
                this.waterSetting.months.splice(indexInMonths, 1);
            }
        },
        selectAmount(amount) {
            if (amount === 'a_lot') {
                this.waterSetting.waterAmount = 'a_lot'
            } else if (amount === 'moderate_amount') {
                this.waterSetting.waterAmount = 'moderate_amount'
            } else if (amount === 'sparingly') {
                this.waterSetting.waterAmount = 'sparingly'
            }
        },
        handleTagAdded(newTags) {
            console.log(newTags)

            this.waterSetting.alertTimes = newTags
        },
        create() {
            this.isLoading = true
            axios.post('/api/waterSetting', {
                checkSeatId: this.waterSetting.checkSeatId,
                waterSettingMonths: this.waterSetting.months,
                waterSettingNote: this.waterSetting.note,
                waterSettingAmount: this.waterSetting.waterAmount,
                waterSettingTimes: this.waterSetting.wateringTimes,
                waterSettingInterval: this.waterSetting.wateringInterval,
                waterSettingAlertTimes: this.waterSetting.alertTimes,
            }).then(res => {
                const waterSetting = res.data.waterSetting;
                waterSetting.checkSeatId = this.waterSetting.checkSeatId;
                this.$emit('addWaterSetting', waterSetting)
                this.$emit('successMessage','水やり設定を登録しました')
                this.isLoading = false;
                this.closeModal()
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
            axios.post('/api/waterSetting/' + this.waterSetting.waterSettingId, {
                    checkSeatId: this.waterSetting.checkSeatId,
                    waterSettingMonths: this.waterSetting.months,
                    waterSettingNote: this.waterSetting.note,
                    waterSettingAmount: this.waterSetting.waterAmount,
                    waterSettingTimes: this.waterSetting.wateringTimes,
                    waterSettingInterval: this.waterSetting.wateringInterval,
                    waterSettingAlertTimes: this.waterSetting.alertTimes,
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                }).then(res => {
                this.isLoading = false
                this.$emit('successMessage','水やり設定を変更しました')
                this.closeModal()
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
        deleteSeat() {
            if (confirm('本当に削除しますか？')) {
                this.isLoading = true
                axios.post('/api/waterSetting/' + this.waterSetting.waterSettingId, {},
                    {
                        headers: {
                            'content-type': 'multipart/form-data',
                            'X-HTTP-Method-Override': 'DELETE',
                        }
                    }).then(res => {
                    this.isLoading = false
                    this.$emit('successMessage','水やり設定を削除しました')
                    this.closeModal()
                }).catch(error => {
                    console.log(error);
                    this.isLoading = false

                });
            }
        }
    },
});
</script>

<style scoped>

</style>
