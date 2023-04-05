<template>

    <!-- The button to open modal -->
    <label for="my-modal-3" class="btn">open modal</label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my-modal-3" class="modal-toggle" />
    <div class="modal">
        <div class="modal-box relative">
            <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            <h3 class="text-lg font-bold">Congratulations random Internet user!</h3>
            <p class="py-4">You've been selected for a chance to get one year of subscription to use Wikipedia for free!</p>
            <button
                class="btn btn-success bg-gradient-to-br from-green-300 to-green-800 hover:bg-gradient-to-tl text-white rounded px-10 my-4"
                @click="redirectToRegister">
新規登録する
            </button>
        </div>
    </div>

</template>

<script>
export default {
    name: "RegisterModal",
    methods: {
        openModal() {
            // モーダルを開くための処理をここに追加する
            document.getElementById('my-modal').checked = true
        },
        redirectToRegister() {
            window.location.href = route('register');
        }
    }
}
</script>

<style scoped>

</style>
