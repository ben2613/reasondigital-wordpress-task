<template>
  <div class="article-container">
    <article v-for="p in posts" :key="p.id">
      <router-link :to="'/post/' + p.id">
        <img class="thumbnail" :trigger="$store.state.media[p.featured_media]" :src="getMediaThumbnail(p.featured_media)" />
      </router-link>
      <router-link :to="'/post/' + p.id">
        <h3 class="article-title" v-html="p.title.rendered"></h3>
      </router-link>
      <!-- <?php the_category(', '); ?> -->
    </article>
  </div>
</template>
<script>
export default {
  mounted() {
    console.log(this.$route.params.id)
  },
  computed: {
    posts() {
      return this.$store.state.posts.filter(
        (p) => {
          return this.$route.params.id === undefined || p.categories.includes(Number(this.$route.params.id))
        }
      )
    },
  },
  methods: {
    getMediaThumbnail(mediaId) {
      let search = null;
      if (this.$store.state.media[mediaId] !== undefined) {
        search = this.$store.state.media[mediaId]
        return search.media_details.sizes.medium_large.source_url
      } else {
        this.axios.get('/wp/v2/media/' + mediaId).then(({data}) => {
          this.$store.state.media[mediaId] = data;
        })
        return '';
      }
    }
  }
}
</script>
<style lang="scss">
.article-container {
  display: flex;
  flex-wrap: wrap;
  margin: 3% 0%;
  article {
    width: 33.3%;
    padding: 5px;
    .thumbnail {
      width: 100%;
      height: unset;
      aspect-ratio: 4 / 3;
      object-fit: cover;
    }
    .article-title {
      margin-bottom: 0;
    }
    a[rel='category'] {
      font-size: small;
    }
  }
}
</style>
