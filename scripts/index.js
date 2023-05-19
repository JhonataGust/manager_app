const { createApp } = Vue;

const app = createApp({
  data() {
    return {
      login_active: true,
      loading_page: false,
    };
  },
})
  .use(vuetify)
  .mount("#app");
