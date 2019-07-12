<template>
    <div>
        <!-- <div class="progress">
          <progressbar :now="progress" type="warning" striped animated></progressbar>
        </div> -->
          <b-progress :value="progress" :max="max" class="mb-3"></b-progress>

        <div class="order-status">
            <strong>Order Status:</strong> {{ statusNew }}
        </div>

        <div v-if="progress >= 100">listo</div>
    </div>
</template>

<script>
    // import { progressbar } from 'vue-strap'

    export default {
        // components: {
        //      progressbar
        // },
        props: ['status', 'initial', 'order_id'],
        data() {
            return {
                statusNew: this.status,
                progress: parseInt( this.initial),
                max:100
            }
        },
        mounted() {
            Echo.private('order-tracker.' + this.order_id)
            .listen('OrderStatusChanged', (order) => {
            //   this.statusNew = order.status_name
            //   this.progress = order.status_percent
                console.log(order);
            });
        }
    }
</script>
