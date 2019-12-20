<template>
    <el-container>
        <el-aside class="aside">
            <el-radio-group v-model="isCollapse" style="margin-bottom: 20px;">
                <el-radio-button :label="false">展开</el-radio-button>
                <el-radio-button :label="true">收起</el-radio-button>
            </el-radio-group>
            <el-menu :default-active="defaultindex" class="el-menu-vertical-demo" :collapse="isCollapse" router>
                <el-menu-item index="/question">
                    <i class="el-icon-document"></i>
                    <span slot="title">更改题目</span>
                </el-menu-item>
                <el-menu-item index="/result">
                    <i class="el-icon-menu"></i>
                    <span slot="title">查看结果</span>
                </el-menu-item>
                <el-menu-item index="/setting">
                    <i class="el-icon-setting"></i>
                    <span slot="title">设置</span>
                </el-menu-item>
            </el-menu>
        </el-aside>
        <el-main>
            <router-view/>
        </el-main>
        <div class="divider">
            <el-divider>
                <h6>From Bit Studio, 2019</h6>
            </el-divider>
        </div>
    </el-container>
</template>

<script>
    export default {
        data() {
            return {
                defaultindex: this.$route.path,
                isCollapse: true
            };
        },
    }
</script>

<style scoped>
    .el-menu-vertical-demo:not(.el-menu--collapse) {
        width: 70%;
        min-height: 100%;
    }

    .aside {
        width: 230px !important;
    }

    .divider {
        position: absolute;
        width: 100%;
        top: 850px;
    }

    h6 {
        color: #AAA;
    }
</style>
