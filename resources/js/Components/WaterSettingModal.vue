CheckSeatModal.vue


<template>

    <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center">

        <div class="p-8 bg-white w-3/4 lg:py-32 lg:px-16 lg:pl-10 lg:w-1/2 tails-selected-element"
             contenteditable="true" @click.stop="" style="max-height: 120vh; overflow-y: auto;">
            {{ waterSetting }}
            <div class="flex flex-col items-start w-full lg:max-w-lg mx-auto"> <!-- mx-autoを追加 -->
                <div class="grid grid-cols-4 gap-4">
                    <button v-for="(month, index) in 12" :key="month"
                            v-if="waterSetting.months"
                            :class="{'bg-blue-900': waterSetting.months.includes(index+1)}"
                            class="bg-blue-500  text-white font-bold py-2 px-4 rounded-full"
                            @click="selectMonth(index)">
                        {{ month }}月
                    </button>
                </div>
                <div class="grid grid-cols-3 w-full lg:max-w-lg mx-auto">
                    <div class="btn-group flex justify-center">
                        <label class="btn px-16" :class="{ 'bg-blue-500': waterSetting.waterAmount === 'a_lot' }">
                            <input @click="selectAmount('a_lot')" type="radio" name="options" class="hidden"/>
                            <span style="writing-mode: horizontal-tb;">たっぷり</span>
                        </label>
                    </div>
                    <div class="btn-group flex justify-center">
                        <label class="btn px-16"
                               :class="{ 'bg-blue-500': waterSetting.waterAmount === 'moderate_amount' }">
                            <input @click="selectAmount('moderate_amount')" type="radio" name="options" class="hidden"/>
                            <span style="writing-mode: horizontal-tb;">適量</span>
                        </label>
                    </div>
                    <div class="btn-group flex justify-center">
                        <label class="btn px-16" :class="{ 'bg-blue-500': waterSetting.waterAmount === 'sparingly' }">
                            <input @click="selectAmount('sparingly')" type="radio" name="options" class="hidden"/>
                            <span style="writing-mode: horizontal-tb;">ひかえめ</span>
                        </label>
                    </div>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">水やり間隔</span>
                    </label>
                    <label class="input-group">
                        <input type="text" placeholder="" class="input input-bordered"/>
                        <span>現在の水やり間隔:{{waterSetting.wateringInterval}}</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">水やり回数</span>
                    </label>
                    <label class="input-group">
                        <input type="text" placeholder="" class="input input-bordered"/>
                        <span>現在の水やり回数:{{waterSetting.wateringTimes}}</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">備考欄</span>
                    </label>
                    <textarea class="textarea textarea-success" :placeholder="waterSetting.note"></textarea>
                </div>
                <smart-tagz
                    v-if="waterSetting.alertTimes"
                    autosuggest
                    editable
                    inputPlaceholder="Select Countries ..."
                    :sources="sources"
                    :allowPaste="{delimiter: ','}"
                    :allowDuplicates="false"
                    :maxTags="20"
                    v-model="alertTimes"
                    :defaultTags="alertTimes"
                />
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
import { SmartTagz } from "smart-tagz";
import "smart-tagz/dist/smart-tagz.css";

import { defineComponent } from "vue";

export default defineComponent({
    name: "WaterSettingModal",
    components: {
        SmartTagz,
    },
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
        waterSetting: {
            type: Object,
            default: () => []
        },

    },
    data() {
        return {
            isOpen: false,
            alertTimes: []
        };
    },
    watch: {
        waterSetting: {
            immediate: true,
            handler(newVal) {
                this.alertTimes = newVal.alertTimes;
            },
        },
        openModal(newVal) {
            this.isOpen = newVal;
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
        }
    }
});
</script>

<style scoped>

</style>
