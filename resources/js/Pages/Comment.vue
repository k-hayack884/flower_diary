<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
<template>

    <h1 class="red">コメント操作をする</h1>
    <div class="flex justify-between">
        <button @click="index()">Index</button>
        <button @click="create()">Create</button>
        <button @click="read()">Read</button>
        <button @click="update()">Update</button>
        <button @click="delete_suru()">Delete</button>
    </div>
</template>
<script>
export default {
    name: "Comment.vue",

    methods: {
        async index() {
            axios.get('http://localhost:51111/api/comment', {}).then(res => {
                console.log('とうろくせいこう')
            }).catch(error => {
                console.log(error);
            });
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
    }
}


</script>

<style scoped>

</style>
