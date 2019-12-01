<template>
    <el-container>
        <el-container direction="vertical">
            <el-radio-group v-model="isCollapse" style="margin-bottom: 20px;">
                <el-radio-button :label="false">展开</el-radio-button>
                <el-radio-button :label="true">收起</el-radio-button>
            </el-radio-group>
            <el-menu default-active="question" class="el-menu-vertical-demo" :collapse="isCollapse" router>
                <el-menu-item index="question">
                    <i class="el-icon-document"></i>
                    <span slot="title">更改题目</span>
                </el-menu-item>
                <el-menu-item index="result">
                    <i class="el-icon-menu"></i>
                    <span slot="title">查看结果</span>
                </el-menu-item>
                <el-menu-item index="setting">
                    <i class="el-icon-setting"></i>
                    <span slot="title">设置</span>
                </el-menu-item>
            </el-menu>
        </el-container
            <el-container>
                <router-view/>
            </el-container>
    </el-container>

</template>

<script>
    export default {
        data() {
            return {
                isCollapse: false
            };
        }
    }
</script>

<style>
    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 150px;
        min-height: 300px;
    }
</style>
