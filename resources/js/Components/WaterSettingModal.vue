CheckSeatModal.vue<template>

    <div id="overlay" @click="closeModal()" v-show="isOpen" class="z-20 flex justify-center">

            <div
                class=" p-8 bg-white w-3/4 lg:py-32 lg:px-16 lg:pl-10 lg:w-1/2 tails-selected-element"
                contenteditable="true" @click.stop="">
                <div class="flex flex-col items-start w-full lg:max-w-lg mx-auto"> <!-- mx-autoを追加 -->
                    <p class="inline-block px-2 py-1 mb-5 font-medium tracking-wider text-gray-900 uppercase bg-gray-200 rounded-full text-xxs">
                        {{waterSetting}}
                    </p>
                    <p class="py-5 mb-5 text-gray-600 lg:text-xl">
                        <span class="font-bold">    {{waterSetting}}</span> will help you craft and build your next idea.
                        Utilize our
                        drag and drop components to build the application of your dreams.
                    </p>
                    <div class="flex w-full">
                        <button type="submit"
                                class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4 flex-1"
                                data-rounded="rounded-lg" data-primary="gray-900" @click="redirectToRegister">
                            新規登録
                        </button>
                        <button type="submit"
                                class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4 flex-1 "
                                data-rounded="rounded-lg" data-primary="gray-900" @click="redirectToLogin">
                            ログイン
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
export default {
    name: "WaterSettingModal",
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
        waterSetting: {
            type: Object,
            default: () => []
        }
    },
    data() {
        return {
            isOpen: false,
        };
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
    }
}
</script>

<style scoped>

</style>
