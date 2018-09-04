<template>
    <div class="baseline">


        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="form-title">Registrar Usuario</h2>
                </div>
            </div>

            <div id="zoom" class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">

                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Nombre Completo
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" name="transportation" v-model="user['full_name']"
                                       class="form-control" placeholder="full_name">

                                <form-error v-if="errors.full_name">
                                    {{ errors.full_name }}
                                </form-error>
                            </div>
                        </div>

                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Usuario
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" name="transportation" v-model="user['name']"
                                       class="form-control" placeholder="Usuario">

                                <form-error v-if="errors.name">
                                    {{ errors.name }}
                                </form-error>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Tipo de Documento
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">

                                <input type="text" name="type_document" v-model="user['type_document']"
                                       class="form-control" placeholder="type_document">

                                <form-error v-if="errors.type_document">
                                    {{ errors.type_document }}
                                </form-error>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Numero de Documento
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">
                                <input type="text" name="document_number" v-model="user['document_number']"
                                       class="form-control" placeholder="document_number">

                                <form-error v-if="errors.document_number">
                                    {{ errors.document_number }}
                                </form-error>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Email
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">
                                <input type="email" name="email" v-model="user['email']"
                                       class="form-control" placeholder="email">

                                <form-error v-if="errors.email">
                                    {{ errors.email }}
                                </form-error>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Password
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">
                                <input type="password" name="password" v-model="user['password']"
                                       class="form-control" placeholder="password">

                                <form-error v-if="errors.password">
                                    {{ errors.password }}
                                </form-error>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="col-sm-12 control-label">Confirmar password
                                <small class="text-danger">*</small>
                            </label>
                            <div class="col-lg-12">
                                <input type="password" name="password" v-model="user['password_confirmation']"
                                       class="form-control" placeholder="password">

                                <form-error v-if="errors.password_confirmation">
                                    {{ errors.password_confirmation }}
                                </form-error>
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
                            <br>
                            <div class="col-lg-12">
                                <button type="submit"
                                        class="btn btn-success outline el-tooltip item"
                                        @click.prevent="register">Registrar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import FormError from './FormErrors.vue'
    import EventBus from './EventBus.vue'
    import Util from '../utils/utils'


    const props = {}

    export default {
        props: props,

        name: 'register-user',

        components: {
            'form-error': FormError,
        },

        data() {
            return {
                user: {},
                errors: {},
            }
        },

        methods: {
            register() {

                this.$http.post('register/', this.user).then(res => {
                    window.location.href = 'home'
                }).catch(err => {
                    this.errors = err.response.data.errors
                })
            }

        }

    }

</script>
<style>

    @media (min-width: 768px) {
        .form-inline .form-control {
            width: 100%;
        }
    }


</style>
