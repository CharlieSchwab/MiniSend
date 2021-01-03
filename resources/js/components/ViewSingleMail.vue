<template>
    <div>
        <h3 class="text-center">View Email</h3>
        <div class="container">
            <span><b>From:</b></span>
            <span>{{email.sender}}</span>
            <hr>
            <span><b>To:</b></span>
            <span>{{email.recipient}}</span>
            <hr>
            <span><b>Subject:</b></span>
            <span>{{email.subject}}</span>
            <hr>
            <span><b>Content:</b></span>
            <p v-html="email.content">
            </p>
            <!-- <div class="form-group">
                <label>Attach Files</label>
                <input type="" class="form-control" v-model="email.attach_url">
            </div> -->
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
        }
    }
</script>