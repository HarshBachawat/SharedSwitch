<template>
    <div class="container d-flex justify-content-center align-items-center" id="image">
        <form>
            <input type="checkbox" id="switch" data-size="large" checked data-on-text="PM"  data-off-text="AM" data-off-color="warning" data-inverse="true" v-model="message">
        </form>
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
    export default {
        mounted() {
            $("#switch").bootstrapSwitch();
            $('#switch').on('switchChange.bootstrapSwitch', (event, state)=> {
                console.log(state);
                if (state == true) {
                    $("#image").stop().animate({opacity: 0},250,function(){
                    $(this).css({'background-image': "url('/images/night.jpg')"})
                               .animate({opacity: 1},{duration:250});
                     });
                }
                else if (state == false) {
                    $("#image").stop().animate({opacity: 0},250,function(){
                    $(this).css({'background-image': "url('/images/day.jpg')"})
                               .animate({opacity: 1},{duration:250});
                     });
                }
                this.handleSubmit(state);
            });
            var temp = this.$attrs['switch-state'];
            console.log('temp',temp)
            if (temp != null) {
                $("#switch").bootstrapSwitch('state', parseInt(temp.state));
            }
            window.Echo.private('switch')
                .listen('.ToggleSwitch', (event) => {
                    console.log('event',event);
                    $("#switch").bootstrapSwitch('state', event.state);
                });
        },
        data() {
            return {
                message: '',
            }
        },
        methods: {
            handleSubmit: function(state) {
                let postData = {state: state};
                console.log(postData);
                window.axios.post('/admin_switch',postData)
                    .then(response => console.log('response', response));
            }
        }
    }
</script>

<style lang="scss" scoped>
    .container {
        text-align: center;
        height: 100vh;
        background-image: url('/images/day.jpg');
        background-size: cover;
        max-width: 100%;
    }
</style>
