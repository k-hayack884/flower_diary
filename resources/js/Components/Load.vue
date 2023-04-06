<template>

    <div id="load">
        <div v-if="show"><img src="../../icon/loading.gif" alt=""></div>
    </div>
</template>

<script>
export default {
    name: "Load",
    props: {
        text: {
            default: "診断中...",
            type: String,
        },
        show: {
            default: false,
            type: Boolean,
        },
    },
    template: '<div v-if="show"><img src="../../icon/loading.gif">&nbsp;<span v-text="text"></span></div>'
}
</script>

<style scoped>

</style>
