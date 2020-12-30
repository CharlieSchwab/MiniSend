<template>
    <div>
        <h3 class="text-center">Send Email</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="createMail">
                    <div class="form-group">
                        <label>From:</label>
                        <input type="text" class="form-control" v-model="email.sender">
                    </div>
                    <div class="form-group">
                        <label>To:</label>
                        <input type="text" class="form-control" v-model="email.recipient">
                    </div>
                    <div class="form-group">
                        <label>Subject:</label>
                        <input type="text" class="form-control" v-model="email.subject">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea rows="10" cols="90" v-model="email.content">
                        </textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label>Attach Files</label>
                        <input type="" class="form-control" v-model="email.attach_url">
                    </div> -->
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
                email: {}
            }
        },
        methods: {
            createEmail() {

                this.axios
                    .post('http://localhost:8000/api/create', this.email)
                    .then(response => (
                        this.$router.push({name: 'home'})
                    ))
                    // .catch(error => console.log(error))
                    // .finally(() => this.loading = false)
            }
        }
    }

   
</script>