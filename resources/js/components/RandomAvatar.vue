<template>
    <a v-bind:href="href">
        <div class="tooltip">

            <img :id="id" src="" v-bind:alt="alt" v-bind:title="alt"
                 v-bind:width="w" v-bind:height="h" class="circle responsive-img"/>
            <span class="tooltiptext" v-if="tooltip">{{ tooltip }}</span>

        </div>
    </a>
</template>

<script>
    export default {
        name: "RandomAvatar",
        props: {
            alt: {
            },
            tooltip: {
                type: String
            },
            href: {
                default: "#"
            },
            w: {
                default: 128,
                type: Number
            },
            h: {
                default: 128,
                type: Number
            }
        },
        data() {
            return {
                id: null
            }
        },
        mounted() {

            this.id = this._uid;
            var context = this;

            $.ajax({
                url: 'https://randomuser.me/api/',
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    document.getElementById(context.id).src = data.results[0].picture.large;
                }
            });

        }
    }
</script>

<style scoped>

</style>
