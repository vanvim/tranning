<template>
    <div>
        <Edit></Edit>
        <a-table
                :columns="columns"
                :dataSource="data"
                rowKey='id'
        >

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
            title: 'Tên lớp học',
            dataIndex: 'name',
            key: 'name',
        },
        {
            title: 'Sĩ số',
            dataIndex: 'number',
            key: 'number',
        },
        {
            title: 'Ngày bắt đầu',
            dataIndex: 'start_time',
            key: 'start_time',
        }, {
            title: 'Giảng viên',
            dataIndex: 'teacher',
            key: 'teacher',
        }, {
            title: 'Khóa học',
            dataIndex: 'course',
            key: 'course',
        },
        {
            title: 'Lịch học',
            dataIndex: 'schedule',
            key: 'schedule',
        },

    ];
    export default {
        data() {
            return {
                data: [],
                columns,
            }
        },
        components: {
            Edit
        },
        mounted() {
            this.getCourse()
        },
        methods: {
            getCourse() {
                axios.get('http://127.0.0.1:8000/api/listClass').then(response => {
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
    .list {
        background: #ffffff;
    }
</style>