CheckSeatModal.vue
<template>
    <div id="overlay" @click="closeModal" v-show="isOpen" class="z-20 flex justify-center">
        <div class="p-8 bg-white w-3/4 lg:py-32 lg:px-16 lg:pl-10 lg:w-1/2 tails-selected-element"
             contenteditable="true" @click.stop="" style="max-height: 120vh; overflow-y: auto;">
            {{ fertilizerSetting }}
            <div class="flex flex-col items-start w-full lg:max-w-lg mx-auto"> <!-- mx-autoを追加 -->
                <div class="grid grid-cols-4 gap-4">
                    <button v-for="(month, index) in 12" :key="month"
                            :class="{'bg-blue-900': fertilizerSetting.months && fertilizerSetting.months.includes(index+1),
                             'bg-blue-500': !fertilizerSetting.months || !fertilizerSetting.months.includes(index+1)}"
                            class="text-white font-bold py-2 px-4 rounded-full"
                            @click="selectMonth(index)">
                        {{ month }}月
                    </button>
                </div>

                <div class="form-control">
                    <label class="label">
                        <span class="label-text">肥料名</span>
                    </label>
                    <label class="input-group">
                        <input type="text" placeholder="" class="input input-bordered"
                               v-model="fertilizerSetting.fertilizerName"/>
                        <span>現在の肥料名:{{ currentFertilizerName }}</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">肥料量</span>
                    </label>
                    <label class="input-group">
                        <input type="text" placeholder="" class="input input-bordered"
                               v-model="fertilizerSetting.fertilizerAmount"/>
                        <span>現在の肥料量:{{ currentFertilizerAmount }}g</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">備考欄</span>
                    </label>
                    <textarea class="textarea textarea-success" :placeholder="fertilizerSetting.note" v-model="fertilizerSetting.note" ></textarea>
                </div>
            </div>

            <button v-if="fertilizerSetting.isCreate" @click="create()"
                    class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                作成する
            </button>
            <button v-else @click="update()"
                    class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                編集する
            </button>
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
export default {
    name: "FertilizerSettingModal",
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
        fertilizerSetting: {
            type: Object,
            default: () => ({
                fertilizerSettingId: '',
                months: [],
                note: '',
                fertilizerAmount: 0,
                fertilizerName: '',
            })
        }
    },
    data() {
        return {
            isOpen: false,
            currentFertilizerAmount: null,
            currentFertilizerName: null
        };

    },
    created() {
        this.currentFertilizerAmount = this.fertilizerSetting.fertilizerAmount;
        this.currentFertilizerName = this.fertilizerSetting.fertilizerName;
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
        selectMonth(index) {
            console.log('動く')
            const month = index + 1;
            if (!this.fertilizerSetting.months) {
                this.fertilizerSetting.months = [];
            }
            const indexInMonths = this.fertilizerSetting.months.indexOf(month);
            if (indexInMonths === -1) {
                this.fertilizerSetting.months.push(month);
            } else {
                this.fertilizerSetting.months.splice(indexInMonths, 1);
            }
        },
        create(){
            axios.post('http://localhost:51111/api/fertilizerSetting', {
                checkSeatId:this.fertilizerSetting.checkSeatId,
                fertilizerSettingMonths: this.fertilizerSetting.months,
                fertilizerSettingNote: this.fertilizerSetting.note,
                fertilizerSettingAmount:this.fertilizerSetting.fertilizerAmount,
                fertilizerSettingName:this.fertilizerSetting.fertilizerName,
            }).then(res => {
                console.log('とうろくせいこう')
                console.log(this.fertilizerSetting.checkSeatId)
                window.location.href = 'http://localhost:51111/checkSeat/'+this.fertilizerSetting.checkSeatId;
            }).catch(error => {
                console.log(error);
            });
        }
    },

}
</script>

<style scoped>

</style>
