<template>
  <card title="My Rates">
    <div v-if="errored" class="alert alert-danger" role="alert">
      Ошибка загрузки данных!
    </div>
    <div v-for="category in catFiltered" class="card mb-5">
      <div class="card-header mb-3">
        <label class="text-secondary">Категория: </label>
        <h3 class="mb-3">{{ category.title }}</h3>
      </div>
      <div class="card-body">
      <div class="text-secondary mb-1">Тарифы: </div>
        <div v-for="rate in ratesFiltered">
          <div v-if="rate.category_id === category.id" class="p-1 d-flex justify-content-between align-items-center border-top border-bottom">
            <div class="">{{ rate.title }}</div>
            <button @click.prevent="unSubscribe(rate.id)" class="btn btn-danger">Отписаться</button>
          </div>
        </div>
      </div>
    </div>
  </card>
</template>

<script>
import axios from 'axios'
export default {
  name: 'MyRates',
  metaInfo () {
    return { title: this.$t('settings') }
  },
  data () {
    return {
      categories: null,
      catFiltered: [],
      ratesFiltered: [],
      errored: false
    }
  },
  mounted () {
    this.getCategories()
  },
  methods: {
    getCategories () {
      axios.get('http://127.0.0.1:8000/api/categories')
        .then(res => {
          this.catFiltered = []
          this.ratesFiltered = []
          this.categories = res.data.data
          this.categories.forEach(cat => {
            cat.rates.forEach(rate => {
              if (rate.is_subscribed) {
                if (!this.catFiltered.includes(cat)) {
                  this.catFiltered.push(cat)
                }
                this.ratesFiltered.push(rate)
              }
            })
          })
        })
        .catch(err => {
          this.errored = true
        })
    },
    unSubscribe (id) {
      axios.post(`http://127.0.0.1:8000/api/user/unsubscribe/${id}`)
        .then(res => {
          this.getCategories()
        })
        .catch(err => {
          console.log(err.response)
        })
    }
  }
}
</script>

<style scoped>

</style>
