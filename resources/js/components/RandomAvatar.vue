<template>
    <div class="tooltip">
        <img :id="id" src="" v-bind:alt="alt" v-bind:title="alt" class="circle responsive-img"/>
        <span class="tooltiptext">alt</span>
    </div>
</template>

<script>
    export default {
        name: "RandomAvatar",
        props: [
            "alt"
        ],
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
