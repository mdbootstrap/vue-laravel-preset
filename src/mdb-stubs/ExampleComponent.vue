<template>
    <mdb-container class="m-5 p-5 text-center">
        <mdb-row>
            <mdb-col>
                <mdb-card>
                    <mdb-card-body>
                        <mdb-card-image
                            src="https://mdbootstrap.com/img/Marketing/general/logo/medium/mdb-vue.png"
                        ></mdb-card-image>
                        <mdb-card-title class="my-3"
                            >MDB + Vue + Laravel</mdb-card-title
                        >
                        <mdb-card-text
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
                            color="grey"
                            icon="chevron-right"
                            icon-right
                            tag="a"
                            href="https://mdbootstrap.com/docs/vue/getting-started/quick-start/"
                            target="_blank"
                            >Getting started</mdb-btn
                        >
                    </mdb-card-body>
                </mdb-card>
            </mdb-col>
        </mdb-row>
    </mdb-container>
</template>

<script>
import {
    mdbContainer,
    mdbRow,
    mdbCol,
    mdbCard,
    mdbCardBody,
    mdbCardTitle,
    mdbBtn,
    mdbCardText,
    mdbCardImage
} from "mdbvue";
export default {
    components: {
        mdbContainer,
        mdbRow,
        mdbCol,
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
