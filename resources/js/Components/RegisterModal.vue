<template>

    <div id="overlay" @click="closeModal" v-show="isOpen" class="z-20 flex justify-center">

            <div
                class=" p-8 bg-white w-3/4 lg:py-16 lg:px-16 lg:pl-10 lg:w-1/2 tails-selected-element"
                contenteditable="true">
                <div class="flex flex-col items-start w-full lg:max-w-lg mx-auto"> <!-- mx-autoを追加 -->
                    <img src="../../icon/green_leaf.png" alt="" class="mx-auto w-1/2 h-1/2">
                    <p class="inline-block  mx-auto px-2 py-1 mb-5 font-medium tracking-wider text-gray-900 uppercase bg-gray-200 rounded-full text-xxs">
                        植物の管理をするには会員登録が必要です
                    </p>
                    <p class="py-5 mb-5 text-gray-600 lg:text-xl mx-auto text-center">すでにアカウントを持っている方はログインしてください
                    </p>
                    <div class="flex flex-col mx-auto w-2/3">
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
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";

export default {
    name: "RegisterModal",
    components: {AuthenticationCardLogo},
    props: {
        openModal: {
            type: Boolean,
            required: true,
        },
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
        redirectToRegister() {
            window.location.href = route('register');
        },
        redirectToLogin() {
            window.location.href = route('login');
        }
    }
}
</script>

<style scoped>

</style>
