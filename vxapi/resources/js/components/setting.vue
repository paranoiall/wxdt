<template>
    <el-container>
        <el-main>
            <el-row :gutter="20">
                <el-col :span="6">
                    <div class="block">
                        <el-slider v-model="setting.now.choose" :min="0" :max="setting.maxnum.choose" vertical
                                   height="400px" show-input
                                   :show-input-controls='false'></el-slider>
                    </div>
                    <el-tag>选择题数量</el-tag>
                </el-col>
                <el-col :span="6">
                    <div class="block">
                        <el-slider v-model="setting.now.mutichoose" :min="0" :max="setting.maxnum.mutichoose" vertical
                                   height="400px" show-input
                                   :show-input-controls='false'></el-slider>
                    </div>
                    <el-tag>多选题数量</el-tag>
                </el-col>
                <el-col :span="6">
                    <div class="block">
                        <el-slider v-model="setting.now.judge" :min="0" :max="setting.maxnum.judge" vertical
                                   height="400px" show-input
                                   :show-input-controls='false'></el-slider>
                    </div>
                    <el-tag>判断题数量</el-tag>
                </el-col>
                <el-col :span="6">
                    <div class="block;">
                        <el-slider v-model="setting.now.fillBlank" :min="0" :max="setting.maxnum.fillBlank" vertical
                                   height="400px" show-input
                                   :show-input-controls='false'></el-slider>
                    </div>
                    <el-tag>填空题数量</el-tag>
                </el-col>
            </el-row>
        </el-main>
        <el-footer>
            <el-row>
                <el-col :offset="10" :span="3">
                    <el-button type="primary" @click="saveSetting" round>保存</el-button>
                </el-col>
            </el-row>
        </el-footer>
    </el-container>
</template>

<script>
    export default {
        data() {
            return {
                url: 'http://wxdt.dutbit.com/setting/',
                // url: 'http://127.0.0.1:8000/setting',
                setting: {now: {}, maxnum: {}},
                value: 1,
            }
        },
        mounted: function () {
            var self = this;
            axios.get(this.url)
                .then(function (response) {
                    self.setting = response.data;
                    console.log(self.setting);
                })
                .catch(function (error) {
                    alert("网络错误！");
                    console.log(error);
                });
        },
        methods: {
            saveSetting() {
                axios.put(this.url, JSON.stringify(this.setting.now))
                    .then(function (response) {
                        if (response.data == 1)
                            alert("保存成功！");
                    })
                    .catch(function (error) {
                        alert("保存失败！");
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>
    .el-main {
        margin: 0 0 3% 4% !important;
    }

    .el-slider {
        margin: 0 22px !important;
    }
</style>
