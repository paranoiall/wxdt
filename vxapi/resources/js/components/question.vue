<template>
    <el-container>
        <el-tabs v-model="activeName" stretch=true>
            <el-tab-pane label="选择题" name="choose" class="tab">
                choose
            </el-tab-pane>
            <el-tab-pane label="多选题" name="mutichoose" class="tab">
                muti
            </el-tab-pane>
            <el-tab-pane label="判断题" name="judge" class="tab">
                judge
            </el-tab-pane>
            <el-tab-pane label="填空题" name="fillBlank" class="tab">
                fillblank
            </el-tab-pane>
        </el-tabs>
    </el-container>
</template>

<script>
    export default {
        data() {
            return {
                activeName: 'choose'
            };
        },
    };
</script>

<style>
.tab{
    width: 600px;
}
</style>
