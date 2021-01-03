<template>
    <div>
        <h3 class="text-center">Send Email</h3>
        <div class="row">
            <div class="col-md-6">
                <div v-if="errors">
                    <div v-for="error in errors" :key="error" class="alert alert-danger">{{ error }}</div>
                </div>

                <form @submit.prevent="createEmail">
                    <div class="form-group">
                        <label>From:</label>
                        <input type="text" class="form-control" required v-model="email.sender">
                    </div>
                    <div class="form-group">
                        <label>To:</label>
                        <input type="text" class="form-control" required v-model="email.recipient">
                    </div>
                    <div class="form-group">
                        <label>Subject:</label>
                        <input type="text" class="form-control" required v-model="email.subject">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea rows="10" cols="100" required v-model="email.content">
                        </textarea>
                    </div>
                    <div class="custom-file">
                    <label>Attach Files</label>
                    <input type="file" class="custom-file-input" id="customFile" ref="file" @change="handleFileObject()">
                    <label class="custom-file-label text-left" for="customFile">{{ fileN }}</label>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Email</button>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: {},
                fileObj: {},
                fileN: "",
                errors: null,
            }
        },
        methods: {
            createEmail() {

                this.errors = [];

                let formData = new FormData();
                formData.append('attach_file', this.fileObj);

                _.each(this.email, (value, key) => {
                    formData.append(key, value)
                });

                this.axios
                    .post('http://localhost:8000/api/create', formData
                    , {headers: {'Content-Type': "multipart/form-data; charset=utf-8; boundary=" + Math.random().toString().substr(2)}
                    })
                    .then(response => {
                        console.log(response);
                        this.$router.push({name: 'home'});
                    }).catch(err => {
                        if (err.response.status === 422) {
                            this.errors = []
                            _.each(err.response.data.errors, error => {
                            _.each(error, e => {
                                this.errors.push(e)
                            })
                            })
                        }
                    })
            },
            handleFileObject(){
                 this.fileObj = this.$refs.file.files[0];
                 this.fileN = this.fileObj.name;
            }
        }
    }

   
</script>