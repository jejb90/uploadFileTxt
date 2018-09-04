<template>
    <div class="baseline">


        <div>
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="form-title">Documentos</h2>
                </div>
            </div>
            <div id="zoom" class="panel panel-default">
                <div class="panel-heading">
                    <form role="form" id="addDocument">

                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="form-group col-lg-12">
                                    <label for="archivo" class="col-sm-3 control-label">Archivo</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="path" id="documento" class="form-control">
                                        <input hidden type="number" name="currentUser" id="currentUser"
                                               v-model="user_id" class="form-control">
                                        <form-error v-if="errors.path" :errors="errors">
                                            {{ errors.path}}
                                        </form-error>
                                    </div>
                                </div>

                            </div>


                            <div class="form-group col-lg-12">
                                <br>

                                <div class="col-sm-6">
                                    <button type="submit"
                                            class="btn btn-success outline el-tooltip item"
                                            @click.prevent="createDocument">Subir Documento
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <h4>Archivos Subidos</h4>
                    <table v-if="listDocument!=''" id="table-document"
                           class="table table-bordered table-condensed nowrap"
                           cellspacing="0"
                           width="100%">
                        <thead>
                        <thead>
                        <tr>
                            <th>Datos</th>
                            <th>Usuario</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(data) in listDocument">
                            <td> {{ data.value }} </td>
                            <td> {{ data.user.full_name }} </td>
                        </tr>
                        </tbody>

                    </table>

                    <div class="col-sm-6">
                        <button type="submit"
                                class="btn btn-success outline el-tooltip item"
                                @click.prevent="uploadDocument">Cargar Documentos
                        </button>
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


    const props = {
        currentUser: {
            type: Number,
            required: false
        }
    }

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
                listDocument: '',
                user_id: this.currentUser
            }
        },
        mounted() {
            this.uploadDocument();

        },

        methods: {

            createDocument() {
                this.errors = {};
                let form = document.querySelector('#addDocument');
                let formdata = new FormData(form)
                this.$http.post('api/uploadDocumentTxt', formdata).then(res => {
                    this.uploadDocument();
                }).catch(err => {
                    this.errors = err.response.data.errors
                })
            },
            uploadDocument() {

                this.$http.get('api/listDocumentTxt').then(res => {
                    this.listDocument = res.data
                    return
                }).catch(err => {
                    console.log(err)
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
