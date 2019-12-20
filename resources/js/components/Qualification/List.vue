<template>
    <div>
        <Edit></Edit>
        <a-table
                :columns="columns"
                :dataSource="data"
                rowKey = 'id'
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
            title: 'Chuyên ngành',
            dataIndex: 'majors',
            key: 'majors',
        },
        {
            title: 'Đơn vị cấp',
            dataIndex: 'competent_units',
            key: 'competent_units',
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
                axios.get('http://127.0.0.1:8000/api/listQualification').then(response => {
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