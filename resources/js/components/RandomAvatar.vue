<template>
    <img :id="id" src="" alt="" class="circle responsive-img"/>
</template>

<script>
    export default {
        name: "RandomAvatar",
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
