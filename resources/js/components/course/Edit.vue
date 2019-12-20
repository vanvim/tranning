<template>
    <div class="wapp">
        <a-button type="primary" @click="showModal"><i class="fa fa-plus"></i> Thêm mới</a-button>
        <div class="table">
            <a-modal
                    :title="'Thêm mới khóa học'"
                    :visible="visible"
                    @ok="handleOk"
                    @cancel="handleCancel"
            >
                <a-form :form="form">
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Tên khóa học"
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
                            label="Thời gian học"
                    >
                        <a-input-number
                                v-decorator="[
              'date_training',
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
                            label="Học phí"
                    >
                        <a-input
                                v-decorator="[
              'tuition',
              {
              rules: [{
                required: true,
                message: 'Bạn phải nhập trường này'
                }],

              },
            ]"
                        />
                    </a-form-item>

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
                form: this.$form.createForm(this, {name: 'dynamic_rule'}),
            }
        },
        methods: {
            showModal() {
                console.log('sdfghjkl')
                this.visible = true
            },
            handleOk() {
                this.form.validateFields((err, values) => {
                    if (!err) {
                        let data = {
                            "name": values.name,
                            "date_training": values.date_training,
                            "tuition": values.tuition
                        }
                        console.log(data)
                        axios.post('http://127.0.0.1:8000/api/addCourse',data).then(response => {
                            if (response.data.status === 200) {
                                console.log("Thêm mới thành công")
                                this.visible = false
                                location.reload();
                                this.$message.success('Thêm mới thành công');
                            }
                        }).catch(err => {
                            console.log(err, 'co loi xay ra')
                        })
                    }
                })
            },
            handleCancel() {
                this.visible = false
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