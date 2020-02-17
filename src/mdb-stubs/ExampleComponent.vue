<template>
    <div class="mdb-background">
        <div class="text-center mask">
            <mdb-card class="p-5">
                <mdb-card-body>
                    <mdb-card-image
                        src="https://mdbootstrap.com/img/Marketing/general/logo/medium/mdb-vue.png"
                    ></mdb-card-image>
                    <mdb-card-title class="my-3"
                        >MDB + Vue + Laravel</mdb-card-title
                    >
                    <mdb-card-text class="my-4"
                        >Visit our
                        <a
                            href="https://mdbootstrap.com/docs/vue"
                            target="_blank"
                        >
                            website</a
                        >
                        to learn more about MDB components.</mdb-card-text
                    >
                    <mdb-btn
                        outline="grey"
                        icon="chevron-right"
                        icon-right
                        tag="a"
                        type="anchor"
                        href="https://mdbootstrap.com/docs/vue/getting-started/quick-start/"
                        target="_blank"
                        >Getting started</mdb-btn
                    >
                </mdb-card-body>
            </mdb-card>
        </div>
    </div>
</template>

<script>
import {
    mdbCard,
    mdbCardBody,
    mdbCardTitle,
    mdbBtn,
    mdbCardText,
    mdbCardImage
} from "mdbvue";
export default {
    components: {
        mdbCard,
        mdbCardBody,
        mdbCardTitle,
        mdbBtn,
        mdbCardText,
        mdbCardImage
    },
    mounted() {
        console.log("Component mounted.");
    }
};
</script>
<style scoped>
.mdb-background {
    background-image: url("https://mdbootstrap.com/img/Mockups/Lightbox/Original/img%20(64).jpg");
    background-size: cover;
}

.mdb-background .mask {
    background-color: rgba(47, 127, 115, 0.9);
    width: 100vw;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>
