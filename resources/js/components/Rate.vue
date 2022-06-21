<template>
  <div class="card-body" :style="{'background-image': 'url(' + rate.image +')'}">
    <h5 class="card-title">{{ rate.title }}</h5>
    <p class="card-text">{{ rate.description }}</p>
    <a v-if="!rate.is_subscribed" href="#" class="btn btn-primary" @click.prevent="subscribe(rate.id)">Подписаться</a>
    <p v-else class="text-secondary">Вы подписаны</p>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  name: 'Rate',
  props: [
    'rate'
  ],
  methods: {
    subscribe (id) {
      if (confirm('Приобрести подписку?')) {
        axios.post(`api/user/subscribe/${id}`)
          .then(res => {
            this.$parent.getCategories()
          })
      }
    }
  }
}
</script>

<style scoped>

</style>
