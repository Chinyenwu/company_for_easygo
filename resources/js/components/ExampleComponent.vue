<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Example Component</div>

                    <div class="card-body">
                         I'm an example component.
                    </div>
                    <div class="card-body">
                         I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                count: 0
            }
        },
        mounted() {
            this.listen();
        },
        methods: {
            listen() {
                Echo.join('counter')
                    .here(users => this.count = users.length)
                    .joining(user => this.count++)
                    .leaving(user => this.count--);
            }
        }
        
        mounted() {
            console.log(' Component mounted.')
        }
    }


</script>
