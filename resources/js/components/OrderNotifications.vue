<template>
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="fa fa-bell"></i>
      <span
        class="badge badge-warning navbar-badge"
        v-if="notifications.length > 0"
      >{{ notifications.length }}</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <div class="dropdown-divider"></div>
      <a
        v-for="notification in notifications"
        :key="notification.url"
        :href="notification.url"
        class="dropdown-item"
      >
        <i class="fa fa-file mr-2"></i>
        {{ notification.description }}
        <span class="float-right text-muted text-sm">
          <timeago :since="notification.time" :auto-update="60"></timeago>
        </span>
      </a>
      <div class="dropdown-divider"></div>
      <a
        href="notifications.html"
        class="dropdown-item dropdown-footer"
        v-if="notifications.length > 0"
      >
        <strong>See All Alerts</strong>
        <i class="fa fa-angle-right"></i>
      </a>
      <div v-else>No notifications</div>
    </div>
  </li>
</template>

<script>
import VueTimeago from "vue-timeago";
Vue.use(VueTimeago, {
  name: "Timeago", // Component name, `Timeago` by default
  locale: "en", // Default locale
  // We use `date-fns` under the hood
  // So you can use all locales from it
  locales: {
    en: require("date-fns/locale/en"),
    ja: require("date-fns/locale/en")
  }
});
export default {
  props: ["user_id", "datetime"],
  data() {
    return {
      notifications: []
    };
  },
  filters: {
    timestamp: function(time) {
      return Date.parse(time);
    }
  },
  mounted() {
    console.log("notifications mounted");
    Echo.channel("order-tracker").listen("OrderStatusChanged", order => {
      if (this.user_id == order.user_id) {
        this.notifications.unshift({
          description: "Order ID: " + order.id + " updated",
          url: "/orders/" + order.id,
          time: new Date()
        });
      }
    });
  }
};
</script>
