<template>
    <div class="wapp">
        <a-button type="primary" @click="showModal"><i class="fa fa-plus"></i> Thêm mới</a-button>
        <div class="table">
            <a-modal
                    :title="'Thêm mới học viên'"
                    :visible="visible"
                    @ok="handleOk"
                    @cancel="handleCancel"
            >
                <a-form :form="form">
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Tên học viên"
                    >
                        <a-input
                                v-decorator="[
              'name',
              {
              rules: [{
                required: true,
                message: 'Bạn phải nhập trường này'
                }],

              },
            ]"
                        />
                    </a-form-item>
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Giới tính">
                        <a-select default-value="Nam" v-model="gender">
                            <a-select-option value="1">
                                Nữ
                            </a-select-option>
                            <a-select-option value="0">
                                Nam
                            </a-select-option>
                        </a-select>

                    </a-form-item>
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Ngày sinh"
                    >
                        <a-date-picker
                                v-decorator="[
              'birthday',
              {
              rules: [{
                required: true,
                message: 'Bạn phải nhập trường này'
                }],

              },
            ]"
                        />
                    </a-form-item>
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Số điện thoại"
                    >
                        <a-input
                                v-decorator="[
              'phone',
              {
              rules: [{
                required: true,
                message: 'Bạn phải nhập trường này'
                }],

              },
            ]"
                        />
                    </a-form-item>
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Email"
                    >
                        <a-input
                                v-decorator="[
          'email',
          {
            rules: [
              {
                type: 'email',
                message: 'The input is not valid E-mail!',
              },
              {
                required: true,
                message: 'Please input your E-mail!',
              },
            ],
          },
        ]"
                        />
                    </a-form-item>
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Địa chỉ"
                    >
                        <a-input
                                v-decorator="[
              'address',
              {
              rules: [{
                required: true,
                message: 'Bạn phải nhập trường này'
                }],

              },
            ]"
                        />
                    </a-form-item>
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Chuyên ngành"
                            v-decorator="[
              'class',
              {
              rules: [{
                required: true,
                message: 'Bạn phải nhập trường này'
                }]
              },
            ]"
                    >
                        <a-select
                                showSearch
                                placeholder="Chọn chuyên ngành"
                                style="width: 200px"
                                @change="selectedQualification"
                        >
                            <a-select-option v-for="qualification in qualifications" :value="qualification.id" :key="qualification.id">
                                {{ qualification.majors}}
                            </a-select-option>

                        </a-select>
                    </a-form-item>
                    <div>
                        <label>Ảnh đại diện:</label>
                        <div>
                            <input type="file" v-on:change="onImageChange" class="form-control" name ="img">
                        </div>
                    </div>
                </a-form>

            </a-modal>
        </div>
    </div>
</template>
<script>
    import {Button, form, Modal} from 'ant-design-vue'

    const formItemLayout = {
        labelCol: {span: 3},
        wrapperCol: {span: 20},
    };
    export default {
        data() {
            return {
                visible: false,
                formItemLayout,
                qualifications: [],
                img: '',
                gender: 1,
                qualificationId:1,
                form: this.$form.createForm(this, {name: 'dynamic_rule'}),
            }
        },
        mounted(){
            this.getQualification();
        },
        methods: {
            showModal() {
                console.log('sdfghjkl')
                this.visible = true
            },selectedQualification(value){
                this.qualificationId = value;
            },
            onImageChange(e){
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.img = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            handleOk(e) {
                this.form.validateFields((err, values) => {
                    if (!err) {
                        let data = {
                            "name": values.name,
                            "gender" : this.gender,
                            "birthday": values.birthday.format('YYYY-MM-DD'),
                            "phone": values.phone,
                            "email": values.email,
                            "address": values.address,
                            "qualifiction_id": this.qualificationId,
                            "img" : this.img,
                        }
                        // console.log(data)
                        // console.log()
                        axios.post('http://127.0.0.1:8000/api/addStudent', data).then(response => {
                            if (response.data.status === 200) {
                                this.visible = false
                            }
                        }).catch(err => {
                            console.log(err, 'co loi xay ra')
                        })
                    }
                })
            },
            handleCancel() {
                this.visible = false
            },
            getQualification() {
                axios.get('http://127.0.0.1:8000/api/listQualification').then(response => {
                    if (response.data && response.data.status === 200) {
                        this.qualifications = response.data.data;
                        console.log(this.classRoms)
                    }
                }).catch(err => {
                    console.log(err, 'co loi xay ra')
                })
            }
        }
    }
</script>
<style lang="scss">
    .table {
        margin: 20px;
    }

    .wapp {
        padding: 20px;
    }
</style>