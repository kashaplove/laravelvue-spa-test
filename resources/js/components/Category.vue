<template>
  <div class="d-flex justify-content-center">
    <div v-for="category in categories" style="margin-right: 30px">
      <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ category.title }}</h5>
          <p class="card-text">{{ category.description }}</p>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'Category',
  data () {
    return {
      categories: null
    }
  },
  mounted () {
    this.getCategories()
  },
  methods: {
    getCategories () {
      axios.get('api/categories')
        .then(res => {
          this.categories = res.data
        })
    }
  }
}
</script>

<style scoped>

</style>
