const app=new Vue({
    el: "#app",
    name: 'ImageUploder',
    data () {
        return {
            avatar: '',
            message: '',
            error: ''
        }
    },
    methods: {
        setError (error, text) {
            this.error = (error.response && error.response.data && error.response.data.error) || text
        },
        getBase64 (file) {
            return new Promise((resolve, reject) => {
                const reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onload = () => resolve(reader.result)
                reader.onerror = error => reject(error)
            })
        },
        onImageChange (e) {
            const images = e.target.files || e.dataTransfer.files
            this.getBase64(images[0])
                .then(image => this.avatar = image)
                .catch(error => this.setError(error, '画像のアップロードに失敗しました。'))
        },
        upload () {
            if (this.avatar) {
                /* postで画像を送る処理をここに書く */
                this.message = 'アップロードしました'
                this.error = ''
            } else {
                this.error = '画像がありません'
            }
        }
    }
})
