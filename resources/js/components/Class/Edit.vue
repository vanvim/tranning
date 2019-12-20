<template>
    <div class="wapp">
        <a-button type="primary" @click="showModal">Tạo mới</a-button>
        <div class ="table">
            <a-modal
                    :title="'Tạo mới'"
                    :visible="visible"
                    @ok="handleOk"
                    @cancel="handleCancel"
            >
                <a-form :form="form">
                    <a-form-item
                            :label-col="formItemLayout.labelCol"
                            :wrapper-col="formItemLayout.wrapperCol"
                            label="Tên lớp"
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
                            label="Sĩ số"
                    >
                        <a-input-number
                                v-decorator="[
              'number',
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
                            label="Ngày bắt đầu"
                    >
                        <a-date-picker
                                v-decorator="[
              'start_time',
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
                            label="Lịch học"
                    >
                        <a-input
                                v-decorator="[
              'schedule',
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
                        label="Giáo viên"
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
                            placeholder="Chọn Giáo viên"
                            style="width: 200px"
                            @change="selectedTeacher"
                    >
                        <a-select-option v-for="Teacher in Teachers" :value="Teacher.id" :key="Teacher.id">
                            {{ Teacher.name}}
                        </a-select-option>

                    </a-select>
                </a-form-item>
                    <a-form-item
                        :label-col="formItemLayout.labelCol"
                        :wrapper-col="formItemLayout.wrapperCol"
                        label="Khóa học"
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
                            placeholder="Chọn khóa học"
                            style="width: 200px"
                            @change="selectedCourse"
                    >
                        <a-select-option v-for="Course in Courses" :value="Course.id" :key="Course.id">
                            {{ Course.name}}
                        </a-select-option>

                    </a-select>
                </a-form-item>
                </a-form>

            </a-modal>
        </div>
    </div>
</template>
<script>
    import { Button,form,Modal } from 'ant-design-vue'
    const formItemLayout = {
        labelCol: {span: 4},
        wrapperCol: {span: 20},
    };
    export default {
        data() {
            return {
                visible : false,
                formItemLayout,
                Teachers : [],
                Courses : [],
                CourseId :1,
                TeacherId :1,
                form: this.$form.createForm(this, {name: 'dynamic_rule'}),
            }
        },
        created (){
          this.getTeacher();
          this.getCourse();
        },
        methods:{
            showModal(){
                this.visible = true
            },
            selectedTeacher(value){
              this.TeacherId = value;
              console.log(this.TeacherId)
            },selectedCourse(value){
              this.CourseId = value;
              console.log(this.CourseId)
            },
            handleOk(){
                this.form.validateFields((err, values) => {
                    if (!err) {
                        let data = {
                            "name": values.name,
                            "number": values.number,
                            "start_time": values.start_time.format('YYYY-MM-DD'),
                            "teacher_id": this.TeacherId,
                            "course_id": this.CourseId,
                            "schedule": values.schedule,
                        }
                        console.log(data)
                        axios.post('http://127.0.0.1:8000/api/addClass',data).then(response => {
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
            handleCancel(){
                this.visible = false
            },
            getTeacher(){
                axios.get('http://127.0.0.1:8000/api/listTeacher').then(response => {
                    if (response.data && response.data.status === 200) {
                        this.Teachers = response.data.data;
                        console.log(this.Teachers)
                    }
                }).catch(err => {
                    console.log(err, 'co loi xay ra')
                })
            },getCourse(){
                axios.get('http://127.0.0.1:8000/api/listCourse').then(response => {
                    if (response.data && response.data.status === 200) {
                        this.Courses = response.data.data;
                        console.log(this.Courses)
                    }
                }).catch(err => {
                    console.log(err, 'co loi xay ra')
                })
            },
        }
    }
</script>
<style lang="scss">
    .table{
        margin: 20px;
    }
    .wapp{
        padding :20px;
    }
</style>