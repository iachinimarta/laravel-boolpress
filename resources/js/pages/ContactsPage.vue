<template>
    <div class="container">
        <form @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" v-model="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" v-model="email">
            </div>        
            <div class="form-floating mb-5">
                <label for="text">Message</label>
                <textarea class="form-control" placeholder="Leave a message here" id="text" style="height: 100px" v-model="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        name: 'ContactsPage',
        data() {
            return {
                name: '',
                email: '',
                text: ''
            }
        },
        methods: {
            submitForm() {
                axios.post('/api/contacts', {
                    'name': this.name,
                    'email': this.email,
                    'text': this.text
                }).then((response) => {
                    console.log(response);
                });
            }
        }
    }
</script>

<style>

</style>