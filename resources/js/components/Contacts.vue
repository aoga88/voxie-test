<template>
    <div class="container">
        <div class="row justify-content-end mb-3">
            <div class="col-12 text-right">
                <a href="/new" class="btn btn-primary">
                    New Contact
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="contact in contacts">
                            <td>{{ contact.name }}</td>
                            <td>{{ contact.email }}</td>
                            <td class="text-right">
                                <button class="btn btn-sm btn-danger" type="button" v-on:click="removeContact(contact.id)">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                contacts: []
            }
        },
        methods: {
            removeContact: function (id) {
                swal.fire({
                    title: 'Do you want to remove the contact?',
                    showCancelButton: true,
                    confirmButtonText: `Remove`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.delete(`/api/contact/${id}`).then(() => {
                            swal.fire('Removed!', '', 'success').then(() => location.reload());
                        }).catch((error) => {
                            if (error.response) {
                                swal.fire({
                                    icon: 'error',
                                    text: 'An error has occurred'
                                });
                            }
                        })
                    }
                })
            }
        },
        mounted() {
            axios.get('/api/contact').then(({data}) => this.contacts = data);
        }
    }
</script>
