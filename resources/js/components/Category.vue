<template>
  <div class="row">
    <div v-if="errored" class="alert alert-danger" role="alert">
      Ошибка загрузки данных!
    </div>
    <div v-for="category in categories" class="col-lg-4 mb-3">
      <div class="card w-100" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">
            {{ category.title }}
          </h5>
          <div v-for="rate in category.rates" class="card">
            <rate :rate="rate"></rate>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Rate from './Rate'

export default {
  name: 'Category',
  components: {
    Rate
  },

  data () {
    return {
      categories: null,
      errored: false
    }
  },
  mounted () {
    this.getCategories()
  },
  methods: {
    getCategories () {
      axios.get('api/categories')
        .then(res => {
          this.categories = res.data.data
        })
        .catch(err => {
          this.errored = true
        })
    }
  }
}
</script>

<style scoped>

</style>
