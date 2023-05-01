<template>
    <label class="btn btn-success px-6 my-4">
        <p>画像をアップロードする</p>
        <div>
            <input
                type="file"
                id="avatar_name"
                accept="image/jpeg, image/png"
                @change="onImageChange"
                style="display: none;"
            />
        </div>
        <span style="display: none;">ファイルを選択</span>
    </label>
</template>

<script>
export default {
    name: "ImageMaker",
    methods:{
        getBase64(file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = () => resolve(reader.result)
                reader.onerror = error => reject(error)
            })
        },
        onImageChange(e) {
            const images = e.target.files || e.dataTransfer.files
            this.getBase64(images[0])
                .then(image => {

                    const originalImg = new Image()
                    originalImg.src = image
                    originalImg.onload = () => {
                        const resizedCanvas = this.createResizedCanvasElement(originalImg)
                        const resizedBase64 = resizedCanvas.toDataURL(images[0].type)
                        this.avatar = resizedBase64
                        this.$emit("image-selected", resizedBase64)
                    }
                    // this.avatar = image
                })
                .catch(error => this.setError(error, '画像のアップロードに失敗しました。'))
        },
        createResizedCanvasElement(originalImg) {
            const originalImgWidth = originalImg.width
            const originalImgHeight = originalImg.height

            // resizeWidthAndHeight関数については下記参照
            const [resizedWidth, resizedHeight] = this.resizeWidthAndHeight(originalImgWidth, originalImgHeight)
            const canvas = document.createElement('canvas')
            const ctx = canvas.getContext('2d')
            canvas.width = resizedWidth
            canvas.height = resizedHeight
            // drawImage関数の仕様はcanvasAPIのドキュメントを参照下さい
            ctx.drawImage(originalImg, 0, 0, resizedWidth, resizedHeight)
            return canvas
        },
        resizeWidthAndHeight(width, height) {

            // 今回は400x400のサイズにしましたが、ここはプロジェクトによって柔軟に変更してよいと思います
            const MAX_WIDTH = 400
            const MAX_HEIGHT = 400

            // 縦と横の比率を保つ
            if (width > height) {
                if (width > MAX_WIDTH) {
                    height *= MAX_WIDTH / width
                    width = MAX_WIDTH
                }
            } else {
                if (height > MAX_HEIGHT) {
                    width *= MAX_HEIGHT / height
                    height = MAX_HEIGHT
                }
            }
            return [width, height]
        },
    }
}
</script>

<style scoped>

</style>
