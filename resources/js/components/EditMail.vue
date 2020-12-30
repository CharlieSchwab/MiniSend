<template>
    <div>
        <h3 class="text-center">Edit Email</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateEmail">
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
                    <button type="submit" class="btn btn-primary">Resend Email</button>
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
        created() {
            this.axios
                .get(`http://localhost:8000/api/read_one/${this.$route.params.id}`)
                .then((response) => {
                    this.email = response.data;
                });
        },
        methods: {
            updateEmail() {
                this.axios
                    .put(`http://localhost:8000/api/update/${this.$route.params.id}`, this.email)
                    .then((response) => {
                        this.$router.push({name: 'home'});
                    });
            }
        }
    }
</script>