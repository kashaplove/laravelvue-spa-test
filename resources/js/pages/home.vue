<template>
  <div class="row">
    <div class="col-lg-10 m-auto">
      <card title="Все тарифы">
        <Category></Category>
      </card>
    </div>
  </div>
</template>

<script>
import Category from '../components/Category'
export default {
  name: 'Index',
  middleware: 'auth',
  data () {
    return {
      categories: null
    }
  },
  components: {
    Category
  },
  // async asyncData () {
  //   const { data: projects } = await axios.get('/api/projects')

  //   return {
  //     projects
  //   }
  // },

  metaInfo () {
    return { title: this.$t('home') }
  }
}
</script>
