<template>
    <div>
        <Edit></Edit>
        <a-table
                :columns="columns"
                :dataSource="data"
                rowKey = 'id'
        >
            <div slot="gender" slot-scope="text, record, index">
                <p v-if="record.gender == '0'"> Nam</p>
                <p v-if="record.gender == '1'"> Nữ</p>
            </div>
        </a-table>
    </div>
</template>
<script>
    import Edit from './Edit';
    const columns = [
        {
            title: 'ID',
            dataIndex: 'id',
            key: 'id',
        },
        {
            title: 'Tên giảng viên',
            dataIndex: 'name',
            key: 'name',
        },
        {
            title: 'Giới tính',
            dataIndex: 'gender',
            key: 'gender',
            scopedSlots: { customRender: 'gender' },
        },
        {
            title: 'Ngày sinh',
            dataIndex: 'birthday',
            key: 'birthday',
        },{
            title: 'Số điện thoại ',
            dataIndex: 'phone',
            key: 'phone',
        },{
            title: 'Email',
            dataIndex: 'email',
            key: 'email',
        },{
            title: 'Địa chỉ',
            dataIndex: 'address',
            key: 'address',
        },{
            title: 'Chuyên môn',
            dataIndex: 'qualification',
            key: 'qualification',
        },

    ];
    export default {
        data() {
            return {
                data: [],
                columns,
            }
        },
        components:{
          Edit
        },
        mounted() {
            this.getCourse()
        },
        methods: {
            getCourse(){
                axios.get('http://127.0.0.1:8000/api/listTeacher').then(response => {
                    if (response.data && response.data.status === 200) {
                        this.data = response.data.data;
                        console.log(this.data)
                    }
                }).catch(err => {
                    console.log(err, 'co loi xay ra')
                })
            }
        }
    }
</script>
<style lang="scss" scoped>
    .list{
        background: #ffffff;
    }
</style>