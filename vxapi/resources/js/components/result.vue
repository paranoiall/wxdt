<template>
    <el-container>
        <el-header class="header">
            <el-tabs v-model="activeName" tab-position='top' stretch @tab-click="handleClick">
                <el-tab-pane label="选择题" name="choose"></el-tab-pane>
                <el-tab-pane label="多选题" name="mutichoose"></el-tab-pane>
                <el-tab-pane label="判断题" name="judge"></el-tab-pane>
                <el-tab-pane label="填空题" name="fillBlank"></el-tab-pane>
            </el-tabs>
        </el-header>
        <el-main>
            <ve-histogram :data="chartData" :settings="chartSettings"></ve-histogram>
            <el-table :data="tableData" style="margin:auto;width: 85%" max-height="300px">
                <el-table-column type="expand">
                    <template slot-scope="props">
                        <el-form label-position="left" inline class="demo-table-expand">
                            <el-form-item label="微信昵称">
                                <span>{{ props.row.name }}</span>
                            </el-form-item>
                            <el-form-item label="手机号">
                                <span>{{ props.row.phone }}</span>
                            </el-form-item>
                            <el-form-item label="选择题">
                                <span>{{ props.row.choose }}</span>
                            </el-form-item>
                            <el-form-item label="多选题">
                                <span>{{ props.row.mutichoose }}</span>
                            </el-form-item>
                            <el-form-item label="判断题">
                                <span>{{ props.row.judge }}</span>
                            </el-form-item>
                            <el-form-item label="填空题">
                                <span>{{ props.row.fillBlank }}</span>
                            </el-form-item>
                            <el-form-item label="总分数">
                                <span>{{ props.row.score }}</span>
                            </el-form-item>
                            <el-form-item label="答题时间">
                                <span>{{ props.row.updated_at }}</span>
                            </el-form-item>
                        </el-form>
                    </template>
                </el-table-column>
                <el-table-column label="微信昵称" prop="name"></el-table-column>
                <el-table-column label="手机号" prop="phone"></el-table-column>
                <el-table-column label="总分数" prop="score"></el-table-column>
            </el-table>
        </el-main>
    </el-container>
</template>

<script>
    export default {
        data() {
            this.chartSettings = {
                labelMap: {
                    'id': '题号',
                    'totalnum': '答题总人数',
                    'rightnum': '正确人数',
                    'rate': '正确率'
                },
                axisSite: {right: ['rate']},
                yAxisType: ['normal', 'percent'],
                yAxisName: ['数量', '比率']
            };
            return {
                url: 'http://wxdt.dutbit.com/result/',
                // url: 'http://127.0.0.1:8000/result/',
                activeName: 'choose',
                chartData: {
                    columns: ['id', 'totalnum', 'rightnum', 'rate'],
                    rows: []
                },
                tableData: []
            };
        },
        mounted: function () {
            this.handleClick();
            this.getScore();
        },
        methods: {
            handleClick() {
                var self = this;
                var url = this.url + this.activeName;
                axios.get(url)
                    .then(function (response) {
                        // console.log(response.data);
                        self.chartData.rows = response.data;
                    })
                    .catch(function (error) {
                        alert("网络错误！");
                        console.log(error);
                    });
            },
            getScore() {
                var self = this;
                var url = this.url;
                axios.get(url)
                    .then(function (response) {
                        console.log(response.data);
                        self.tableData = response.data;
                    })
                    .catch(function (error) {
                        alert("网络错误！");
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>
    .el-header {
        margin: 0px 20% 0px 10% !important;
    }

    .el-main {
        margin: 0px 9% 1% 0% !important;
    }

    .demo-table-expand {
        font-size: 0;
    }

    .demo-table-expand label {
        width: 90px;
        color: #99a9bf;
    }

    .demo-table-expand .el-form-item {
        margin-right: 0;
        margin-bottom: 0;
        width: 50%;
    }

</style>
