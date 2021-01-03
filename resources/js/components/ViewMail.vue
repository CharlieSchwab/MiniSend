<template>
    <div>
        <h3 class="text-center">Sent Emails</h3><br/>
        <div class="form-group">
            <label for="search">Search:</label>
            <input type="text" class="form-control" v-model="search" placeholder="Search.." id="search">
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>No</th>
                <th>Sender</th>
                <th>Recipient</th>
                <th>Subject</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(email, index) in filteredEmails" :key="email.id">
                <td>{{ index + 1 }}</td>
                <td>{{ email.sender }}</td>
                <td>{{ email.recipient }}</td>
                <td>{{ email.subject }}</td>
                <td>{{ email.status }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'view', params: { id: email.id }}" class="btn btn-success">View
                        </router-link>
                        <router-link :to="{name: 'edit', params: { id: email.id }}" class="btn btn-primary">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deleteEmail(email.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                search: '',
                emails: [],
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/read_all')
                .then(response => {
                    this.emails = response.data;
                });
        },
        methods: {

            deleteEmail(id) {
                this.axios
                    .delete(`http://localhost:8000/api/delete/${id}`)
                    .then(response => {
                        let i = this.emails.map(item => item.id).indexOf(id);
                        this.emails.splice(i, 1)
                    });
            }
        },
        computed: {
            filteredEmails() {
                return this.emails.filter(mail => {
                    const search_str = this.search.toLowerCase()
                    return mail.sender.toLowerCase().includes(search_str) || 
                           mail.recipient.toLowerCase().includes(search_str) ||
                           mail.subject.toLowerCase().includes(search_str);
                })
            }
        }
    }
</script>
