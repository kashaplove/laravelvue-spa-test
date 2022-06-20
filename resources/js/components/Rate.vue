<template>
  <div class="card-body">
    <img :src="rate.image" class="card-img-top" alt="...">
    <h5 class="card-title">{{ rate.title }}</h5>
    <p class="card-text">{{ rate.description }}</p>
    <a href="#" class="btn btn-primary" @click.prevent="subscribe(rate.id)">Подписаться</a>
  </div>
</template>

<script>
export default {
  name: 'Rate',
  props: [
    'rate'
  ],
  methods: {
    subscribe (id) {
      console.log(id)
    }
  }
}
</script>

<style scoped>

</style>
