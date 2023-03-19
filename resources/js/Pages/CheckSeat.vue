Comment.vue<script setup>
import {Head, Link} from '@inertiajs/inertia-vue3';
import AppLayout from '@/Layouts/AppLayout.vue';
</script>
<template>

    <h1 class="red">コメント操作をする</h1>
    <div class="flex justify-between">
        <button @click="create()">Create</button>
        <button @click="read()">Read</button>
        <button @click="update()">Update</button>
        <button @click="delete_suru()">Delete</button>
    </div>
</template>
<script>
export default {
    name: "CheckSeat.vue",

    methods: {
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
    }
}


</script>

<style scoped>

</style>
