<template>
    <div class="container">
        <div class="col-12 text-right">
            <a href="/" class="btn btn-primary">
                Return to contacts
            </a>
        </div>
        <form class="row justify-content-center" v-on:submit.prevent="onSubmit">
            <div class="col-12 col-md-6 form-group">
                <label>Name</label>
                {{ name }}
                <input type="text" class="form-control" name="name" v-model="name" required />
            </div>
            <div class="col-12 col-md-6 form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" v-model="email" required />
            </div>

            <div class="col-12 form-group text-right">
                <button class="btn btn-success">
                    Save
                </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                name: '',
                email: ''
            }
        },
        methods: {
            onSubmit: function(e) {
                const { name, email } = this;
                axios.post('/api/contact', {
                    name, email
                }).then((response) => {
                    location.href = '/';
                }).catch((error) => {
                    if (error.response) {
                        swal.fire({
                            icon: 'error',
                            text: 'An error has occurred'
                        });
                    }
                })
            }
        },
        mounted() {
        }
    }
</script>
