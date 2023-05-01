CheckSeatModal.vue


<template>

    <div class="relative">
        <LoadWait :show="isLoading" class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50"></LoadWait>
    <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center">

        <h1>ああああああああああああ</h1>
        <div class="p-8 bg-white w-full lg:py-32 lg:px-16 lg:pl-10 lg:w-3/4 tails-selected-element"
             contenteditable="true" @click.stop="" style="max-height: 120vh; overflow-y: auto;">
            {{ diary }}
            <span v-show="errors" class="text-red-500">
                <p v-for="error in errors">
                    {{ error }}
                </p></span>
            <section class="text-gray-600 body-font overflow-hidden">
                <div class="container px-5 py-24 mx-auto">
                    <div class="lg:w-full mx-auto flex flex-wrap">
                        <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/400x400">
                        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                            <div class="relative mb-4">
                                <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                                <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                            <div>
                                        <button v-if="diary.isCreate" @click="create()"
                                                class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                            作成する
                                        </button>
                                        <div v-else>
                                            <button  @click="update()"
                                                     class="flex mx-auto mt-16 text-white bg-green-600 border-0 py-2 px-8 focus:outline-none hover:bg-green-800 rounded text-lg">
                                                編集する
                                            </button>
                                            <button  @click="deleteSeat()"
                                                     class="flex mx-auto mt-16 text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-800 rounded text-lg">
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
        diary: {
            type: Object,
            default: () => ({
                diaryId: '',
                diaryContent: '',
                image: '',
                createDate: '',
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
            isLoading:false
        };
    },
    created() {
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

            this.waterSetting.alertTimes=newTags
        },
        create() {
            this.isLoading=true

            axios.post('/api/waterSetting', {
                checkSeatId: this.waterSetting.checkSeatId,
                waterSettingMonths: this.waterSetting.months,
                waterSettingNote: this.waterSetting.note,
                waterSettingAmount: this.waterSetting.waterAmount,
                waterSettingTimes: this.waterSetting.wateringTimes,
                waterSettingInterval: this.waterSetting.wateringInterval,
                waterSettingAlertTimes:this.waterSetting.alertTimes,
            }).then(res => {

                console.log('とうろくせいこう')
                console.log(this.waterSetting.checkSeatId)

                window.location.href = 'http://localhost:51111/checkSeat/' + this.waterSetting.checkSeatId;
                this.isLoading=false
            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading=false
                } else {
                    console.log(error);
                    this.isLoading=false

                }
            });

        },
        update() {
            this.isLoading=true
            axios.post('/api/waterSetting/' + this.waterSetting.waterSettingId, {
                    checkSeatId: this.waterSetting.checkSeatId,
                    waterSettingMonths: this.waterSetting.months,
                    waterSettingNote: this.waterSetting.note,
                    waterSettingAmount: this.waterSetting.waterAmount,
                    waterSettingTimes: this.waterSetting.wateringTimes,
                    waterSettingInterval: this.waterSetting.wateringInterval,
                    waterSettingAlertTimes:this.waterSetting.alertTimes,
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'PUT',
                    }
                }).then(res => {

                console.log('とうろくせいこう')

                window.location.href = 'http://localhost:51111/checkSeat/' + this.waterSetting.checkSeatId;
                this.isLoading=false

            }).catch(error => {
                if (error.response.status === 422) {
                    console.log(error.response.data.errors);
                    this.errors = error.response.data.errors;
                    this.isLoading=false

                } else {
                    console.log(error);
                    this.isLoading=false

                }
            });
        },
        deleteSeat() {
            this.isLoading=true
            axios.post('/api/waterSetting/' + this.waterSetting.waterSettingId, {
                },
                {
                    headers: {
                        'content-type': 'multipart/form-data',
                        'X-HTTP-Method-Override': 'DELETE',
                    }
                }).then(res => {
                window.location.href = 'http://localhost:51111/checkSeat/' + this.waterSetting.checkSeatId;
                this.isLoading=false
            }).catch(error => {
                console.log(error);
                this.isLoading=false

            });
        }

    }
});
</script>

<style scoped>

</style>
