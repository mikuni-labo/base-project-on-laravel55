<style scoped>
    .action-link {
        cursor: pointer;
    }
</style>

<template>
    <a class="action-link" @click="edit(user)">
        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp;アカウント編集
    </a>

    <!-- Edit Client Modal -->
    <div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button " class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">
                        Edit Client
                    </h4>
                </div>

                <div class="modal-body">
                    <!-- Form Errors -->
                    <div class="alert alert-danger" v-if="editForm.errors.length > 0">
                        <p><strong>Whoops!</strong> Something went wrong!</p>
                        <br>
                        <ul>
                            <li v-for="error in editForm.errors">
                                {{ error }}
                            </li>
                        </ul>
                    </div>

                    <!-- Edit Client Form -->
                    <form class="form-horizontal" role="form">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>

                            <div class="col-md-7">
                                <input id="edit-user-name" type="text" class="form-control"
                                                            @keyup.enter="update" v-model="editForm.name">

                                <span class="help-block">
                                    Something your users will recognize and trust.
                                </span>
                            </div>
                        </div>

                        <!-- Redirect URL -->
                        <div class="form-group">
                            <label class="col-md-3 control-label">Redirect URL</label>

                            <div class="col-md-7">
                                <input type="text" class="form-control" name="redirect"
                                                @keyup.enter="update" v-model="editForm.redirect">

                                <span class="help-block">
                                    Your application's authorization callback URL.
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Modal Actions -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary" @click="update">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                editForm: {
                    errors: [],
                    name: '',
                    redirect: ''
                }
            };
        },

        /**
         * Prepare the component (Vue 1.x).
         */
        ready() {
            this.prepareComponent();
        },

        /**
         * Prepare the component (Vue 2.x).
         */
        mounted() {
            this.prepareComponent();
        },

        methods: {
            /**
             * Prepare the component.
             */
            prepareComponent() {
                this.getUser();

                $('#modal-edit-user').on('shown.bs.modal', () => {
                    $('#edit-user-name').focus();
                });
            },

            /**
             * Get all of the OAuth users for the user.
             */
            getUser() {
                axios.get('/oauth/users')
                        .then(response => {
                            this.users = response.data;
                        });
            },

            /**
             * Edit the given user.
             */
            edit(user) {
                this.editForm.id = user.id;
                this.editForm.name = user.name;

                $('#modal-edit-user').modal('show');
            },

            /**
             * Update the user being edited.
             */
            update() {
                this.persistClient(
                    'put', '/oauth/users/' + this.editForm.id,
                    this.editForm, '#modal-edit-user'
                );
            },

            /**
             * Persist the user to storage using the given form.
             */
            persistClient(method, uri, form, modal) {
                form.errors = [];

                axios[method](uri, form)
                    .then(response => {
                        this.getClients();

                        form.name = '';
                        form.redirect = '';
                        form.errors = [];

                        $(modal).modal('hide');
                    })
                    .catch(error => {
                        if (typeof error.response.data === 'object') {
                            form.errors = _.flatten(_.toArray(error.response.data));
                        } else {
                            form.errors = ['Something went wrong. Please try again.'];
                        }
                    });
            },
        }
    }
</script>
