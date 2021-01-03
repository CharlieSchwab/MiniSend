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
            <hr>
            <div v-if="this.email.attach_url">
                <b>Attached File:</b>
                <a v-bind:href="fileUrl" download>Download</a>
                <p>{{fileUrl}}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                email: {},
                fileUrl: "#"
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/read_one/${this.$route.params.id}`)
                .then((response) => {
                    this.email = response.data;
                    this.fileUrl = this.email.file_url;
                });
        },
        func(){
            alert("hello");
        }
    }
</script>