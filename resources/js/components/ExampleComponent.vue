<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form v-on:submit.prevent="handleSubmit">
                            <input type="text" class="form-control" v-model="message">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            window.Echo.private('switch')
                .listen('.ToggleSwitch', (event) => {console.log('event',event); alert(event.message)})
        },
        data() {
            return {
                message: '',
            }
        },
        methods: {
            handleSubmit() {
                let postData = {message: this.message};
                window.axios.post('/admin_switch',postData)
                    .then(response => console.log('response', response));
            }
        }
    }
</script>
