<template>
    <div class="container">

        <div v-if="success" class="elert alert-success" role="alert">
            Messaggio inviato correttamente
        </div>

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

            <button type="submit" class="btn btn-primary" :disabled="sending">Submit</button>
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
                text: '', 
                errors: {},
                success: false, 
                sending: false
            }
        },
        methods: {
            submitForm() {
                this.sending = true;

                axios.post('/api/provaUri', {
                    'name': this.name,
                    'email': this.email,
                    'text': this.text
                }).then((response) => {
                    this.success = response.data.success;
                    this.sending = false;

                    if (this.success) {
                        this.errors = {};
                        this.name = '';
                        this.email = '';
                        this.text = '';
                    } else {
                        this.errors = response.data.errors;
                    }
                });
            }
        }
    }
</script>

<style>

</style>